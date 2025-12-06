<?php

namespace App\Http\Controllers\Client;

use App\Models\Admin\AdminSetting;
use App\Http\Controllers\Controller;
use App\Models\Client\Order;
use App\Models\Client\OrderProduct;
use App\Models\Client\PaymentGatewayRequestResponse;
use App\Models\Client\Product;
use App\Models\Client\User_cart;
use App\Models\Client\Users_detail;
use App\User;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
// use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use App\Models\Admin\Category; //ragini

class PaymentGatewayController extends Controller
{
    public $data = array();
    // protected $key_id = 'rzp_test_avuqtrFO7dn3k2';
    // protected $keySecret = '2Gk9mGd1Le8NE5h0RvpsdNyu';

    protected $key_id;
    protected $keySecret;

    public function __construct()
    {
    }

    function select_address()
    {
        $user_id = Auth::user()->id;
        $data['user_detail_data'] = Users_detail::where('users_id', $user_id)->get();


        $cart_data = CartController::get_cart_details();


        $total_cart_amount = isset($cart_data['cart_total_price']) && !empty($cart_data['cart_total_price']) ? $cart_data['cart_total_price'] : "";;
        if ($total_cart_amount == "" || $total_cart_amount == 0) {
            return redirect()->route('home.index');
        }

        return $this->_display('client.user.select-address', $data);
    }

    public function checkout_form(){
        $data=array();
        $data['categories'] = Category::select('id', 'name')->where('status', 1)->get(); //ragini
        $cart_data = CartController::get_cart_details();
        $data['cart_data']=$cart_data;
        // dd($cart_data);
        $data['country']=DB::table('as_countries')->select('*')->get();
        if(Auth::check()){
            $data['shipping_details'] = DB::table('users_shipping_detail')->where(['users_id'=>Auth::user()->id,'status'=>1])->get();
            // dd($data['shipping_details']);
            $data['billing_details'] = DB::table('users_billing_detail')->where(['users_id'=>Auth::user()->id,'status'=>1])->get();
        }
        if(!empty($cart_data['cart_product_list'])){
            return view('client2.checkout',$data);
        }else{
            return redirect(route('product.show-cart'));
        }
    }
    
    public function save_address_and_deliver()
    {
        $cart_data = CartController::get_cart_details();


        $total_cart_amount = isset($cart_data['cart_total_price']) && !empty($cart_data['cart_total_price']) ? $cart_data['cart_total_price'] : "";
        if ($total_cart_amount == "" || $total_cart_amount == 0) {
            return redirect()->route('home.index');
        }

        $validator = request()->validate([
            'name'      => 'required',
            'email_id'     => 'required',
            'mobile_number' => 'required',
            'alt_mobile_number' => 'required',
            'address' => 'required|string',
            'landmark' => 'string|max:255',
            'city' => 'required',
            'state' => 'required',
            'floor' => 'required|integer',
            'pincode' => 'required|integer',
        ]);

        $user_id  =  Auth::user()->id;
        $user_detail = new Users_detail;
        $user_detail->name = $validator['name'];
        $user_detail->email_id = $validator['email_id'];
        $user_detail->mobile_number = $validator['mobile_number'];
        $user_detail->alt_mobile_number = $validator['alt_mobile_number'];
        $user_detail->address = $validator['address'];
        $user_detail->floor = $validator['floor'];
        $user_detail->pincode = $validator['pincode'];
        $user_detail->landmark = $validator['landmark'];
        $user_detail->state_id = $validator['state'];
        $user_detail->city = $validator['city'];
        $user_detail->created_at = date('Y-m-d H:i:s');
        $user_detail->users_id =  $user_id;
        $user_detail->status = 1;
        $user_detail->save();
        $user_detail_id = $user_detail->id;

        $postdata  = array(
            'delivered_address' => self::security_encrypt($user_detail_id)
        );
        return $this->checkout($postdata);
    }

    public function checkout($postdata = array())
    {
        if (isset($postdata) && is_array($postdata) && count($postdata) > 0 && isset($postdata['delivered_address'])) {
            $delivered_address  = $postdata['delivered_address'];
        } else {
            $delivered_address = request()->input('delivered_address', '');
        }
        $user_id = Auth::user()->id;
        // $keyId = env('RAZORPAY_API_KEY_ID');
        // $keySecret = env('RAZORPAY_API_SECRET_KEY');

        $paymen_gateway_data = AdminSetting::whereIn('id', array('1', '2'))->get();
        if (isset($paymen_gateway_data) && is_object($paymen_gateway_data)) {
            foreach ($paymen_gateway_data as  $value) {
                $pg_data_sorted[$value->title] = $value->value;
            }
        }

        $this->key_id = $pg_data_sorted['razorpay_keyid'];
        $this->keySecret = $pg_data_sorted['razorpay_secretkey'];
        $keyId = $this->key_id;
        $keySecret = $this->keySecret;
        $displayCurrency = 'INR';
        $company_name = env('APP_COMPANY_NAME');



        if ($delivered_address  == '') {
            return  redirect()->route('home.index');
        }

        $user_detail_id = self::security_encrypt($delivered_address, 'd');


        $user_detail_data = Users_detail::where('status', 1)->where('id', $user_detail_id)->where('users_id', $user_id)->get()->first();

        if ($user_detail_data) {
            $pgrr_count  = PaymentGatewayRequestResponse::where('status', 1)->get()->count();
            $pgrr_count  = $pgrr_count + 1;
            $auto_order_id = $user_id . '-' . $pgrr_count  . '-' . date('YmdHis');

            $cart_data = CartController::get_cart_details();


            $total_cart_amount = isset($cart_data['cart_total_price']) && !empty($cart_data['cart_total_price']) ? $cart_data['cart_total_price'] : "";;
            if ($total_cart_amount == "" || $total_cart_amount == 0) {
                return redirect()->route('home.index');
            }
            $data['user_detail_data'] = $user_detail_data;
            $data['totalprice'] = $total_cart_amount;
            $orderData = [
                'receipt'         => $auto_order_id,
                'amount'          => $total_cart_amount * 100, // 2000 rupees in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];
            $api = new Api($keyId, $keySecret);
            $razorpay_order = $api->order->create($orderData);

            if (isset($razorpay_order) && is_object($razorpay_order)) {
                $razorpay_order_id = isset($razorpay_order->id) && !empty($razorpay_order->id) ? $razorpay_order->id : "";;
                request()->session()->put('razorpay_payment_id', $razorpay_order_id);

                $razorpay_order_array = $razorpay_order->toArray();
                $razorpay_response_json = json_encode($razorpay_order_array, JSON_FORCE_OBJECT);
                $razorpay_request_json = json_encode($orderData);

                $data['displayCurrency'] = "INR";

                $request_json['display_amount']  =  $total_cart_amount;
                $request_json['display_currency']  =  "INR";
                $request_json['amount'] = $total_cart_amount;
                $request_json['key_id']  = $keyId;
                $request_json['order_id']  = $razorpay_order_id;
                $request_json['shopping_order_id']  = $auto_order_id;
                $request_json['name']  = "Always Healthy Pharma";
                $request_json['description'] = 'Purchased order medicine of ' . $user_detail_data->name;
                $request_json['image'] = 'assets/client/images/logo-new.PNG';
                $request_json['prefill']['name'] = isset($user_detail_data->name) && !empty($user_detail_data->name) ? $user_detail_data->name : "";;
                $request_json['prefill']['contact'] = isset($user_detail_data->mobile_number) && !empty($user_detail_data->mobile_number) ? $user_detail_data->mobile_number : "";;
                $request_json['prefill']['email'] = isset($user_detail_data->email_id) && !empty($user_detail_data->email_id) ? $user_detail_data->email_id : "";;
                $request_json['notes']['shipping address'] = isset($user_detail_data->address) && !empty($user_detail_data->address) ? $user_detail_data->address : "";;
                $request_json['callback_url'] = route('process-payment');

                $data['request_json'] = $request_json;

                $pgrr  = new PaymentGatewayRequestResponse;
                $pgrr->users_id  =  $user_id;
                $pgrr->auto_order_id  =  $auto_order_id;
                $pgrr->total_cart_amount = $total_cart_amount;
                $pgrr->total_amount_paid = $total_cart_amount;
                $pgrr->razorpay_request_json  = $razorpay_request_json;
                $pgrr->razorpay_response_json  = $razorpay_response_json;
                $pgrr->razorpay_order_id  = $razorpay_order_id;
                $pgrr->request_json = json_encode($request_json);
                $pgrr->users_detail_id = isset($user_detail_data->id) && !empty($user_detail_data->id) ? $user_detail_data->id : "";;
                $pgrr->name = isset($user_detail_data->name) && !empty($user_detail_data->name) ? $user_detail_data->name : "";;
                $pgrr->email_id = isset($user_detail_data->email_id) && !empty($user_detail_data->email_id) ? $user_detail_data->email_id : "";;
                $pgrr->mobile_number = isset($user_detail_data->mobile_number) && !empty($user_detail_data->mobile_number) ? $user_detail_data->mobile_number : "";;
                $pgrr->alt_mobile_number = isset($user_detail_data->alt_mobile_number) && !empty($user_detail_data->alt_mobile_number) ? $user_detail_data->alt_mobile_number : "";;
                $pgrr->address = isset($user_detail_data->address) && !empty($user_detail_data->address) ? $user_detail_data->address : "";
                $pgrr->floor = isset($user_detail_data->floor) && !empty($user_detail_data->floor) ? $user_detail_data->floor : 0;
                $pgrr->landmark = isset($user_detail_data->landmark) && !empty($user_detail_data->landmark) ? $user_detail_data->landmark : "";
                $pgrr->pincode = isset($user_detail_data->pincode) && !empty($user_detail_data->pincode) ? $user_detail_data->pincode : "";
                $pgrr->city = isset($user_detail_data->city) && !empty($user_detail_data->city) ? $user_detail_data->city : "";
                $pgrr->state_id = isset($user_detail_data->state_id) && !empty($user_detail_data->state_id) ? $user_detail_data->state_id : "";
                $pgrr->created_at = date('Y-m-d H:i:s');
                $pgrr->status  =  2;
                $pgrr->save();

                return $this->_display('client.redirecting-to-payment-gateway', $data);
            } else {
            }
        } else {
            return  redirect()->route('home.index');
        }
    }

    public function process_payment(Request $request)
    {
        $request = request()->input();
        $msg_type = 'error_msg';
        $msg = 'Payment Failed If amount is deducted from your account please contact us';

        $transaction_status = 'Failed';

        if (isset($request) && is_array($request) && count($request) > 0) {
            $paymen_gateway_data = AdminSetting::whereIn('id', array('1', '2'))->get();
            if (isset($paymen_gateway_data) && is_object($paymen_gateway_data)) {
                foreach ($paymen_gateway_data as  $value) {
                    $pg_data_sorted[$value->title] = $value->value;
                }
            }

            $this->key_id = $pg_data_sorted['razorpay_keyid'];
            $this->keySecret = $pg_data_sorted['razorpay_secretkey'];

            $keyId = $this->key_id;
            $keySecret = $this->keySecret;
            $api = new Api($keyId, $keySecret);

            $response = $request;

            // $razor_payorder_id = request()->session()->pull('razorpay_order_id', '');
            $razor_payorder_id = isset($request['razorpay_order_id']) && !empty($request['razorpay_order_id']) ? $request['razorpay_order_id'] : "";

            try {
                $attributes = array(
                    'razorpay_order_id' => $razor_payorder_id,
                    'razorpay_payment_id' => isset($request['razorpay_payment_id']) && !empty($request['razorpay_payment_id']) ? $request['razorpay_payment_id'] : "",
                    'razorpay_signature' => isset($request['razorpay_signature']) && !empty($request['razorpay_signature']) ? $request['razorpay_signature'] : ""
                );

                $api->utility->verifyPaymentSignature($attributes);
                $transaction_status  = 'Success';
            } catch (SignatureVerificationError $e) {

                $razorpay_error = 'Razorpay Error : ' . $e->getMessage();
                $transaction_status  = 'Failed';
            }

            $user_id  = Auth::user()->id;
            $pgrr = PaymentGatewayRequestResponse::where('status', 2)
                ->where('razorpay_order_id', $razor_payorder_id)
                ->where('users_id', $user_id)
                ->get();

            if ($pgrr) {
                $pgrr = $pgrr->first();


                $pgrr_data = $pgrr;

                $response_json = json_encode($response);
                $pgrr->transaction_status = $transaction_status;

                if ($transaction_status == 'Failed') {
                    $response['razorpay_error'] =  isset($razorpay_error) && !empty($razorpay_error) ? $razorpay_error : "";;
                    $response_json = json_encode($response);
                    $pgrr->response_json = $response_json;
                } else {
                    $response_json = json_encode($response);
                    $pgrr->response_json = $response_json;
                    $pgrr->status = 1;
                }

                $pgrr->updated_at = date('Y-m-d H:i:s');
                $pgrr->save();

                $pgrr_id = $pgrr_data->id;

                $pgrr = PaymentGatewayRequestResponse::where('id', $pgrr_id)
                    ->get()->first();


                $order = new Order;
                $order->name = isset($pgrr->name) && !empty($pgrr->name) ? $pgrr->name : "";;
                $order->users_detail_id = isset($pgrr->users_detail_id) && !empty($pgrr->users_detail_id) ? $pgrr->users_detail_id : "";;
                $order->users_id = isset($pgrr->users_id) && !empty($pgrr->users_id) ? $pgrr->users_id   : "";
                $order->auto_order_id = isset($pgrr->auto_order_id) && !empty($pgrr->auto_order_id) ? $pgrr->auto_order_id : "";
                $order->total_cart_amount = isset($pgrr->total_cart_amount) && !empty($pgrr->total_cart_amount) ? $pgrr->total_cart_amount : "";
                $order->total_amount_paid = isset($pgrr->total_amount_paid) && !empty($pgrr->total_amount_paid) ? $pgrr->total_amount_paid : "";
                $order->payment_gateway_request_response_id = isset($pgrr_id) && !empty($pgrr_id) ? $pgrr_id : "";
                $order->email_id = isset($pgrr->email_id) && !empty($pgrr->email_id) ? $pgrr->email_id : "";
                $order->mobile_number = isset($pgrr->mobile_number) && !empty($pgrr->mobile_number) ? $pgrr->mobile_number : "";
                $order->alt_mobile_number = isset($pgrr->alt_mobile_number) && !empty($pgrr->alt_mobile_number) ? $pgrr->alt_mobile_number : "";
                $order->address = isset($pgrr->address) && !empty($pgrr->address) ? $pgrr->address : "";
                $order->floor = isset($pgrr->floor) && !empty($pgrr->floor) ? $pgrr->floor : "";
                $order->landmark = isset($pgrr->landmark) && !empty($pgrr->landmark) ? $pgrr->landmark : "";
                $order->pincode = isset($pgrr->pincode) && !empty($pgrr->pincode) ? $pgrr->pincode  : "";
                $order->city = isset($pgrr->city) && !empty($pgrr->city) ? $pgrr->city  : "";
                $order->state_id = isset($pgrr->state_id) && !empty($pgrr->state_id) ? $pgrr->state_id : "";
                $order->created_at = date('Y-m-d H:i:s');
                $order->status = 1;
                $order->save();

                $order_id = $order->id;
                $order_users_id =  $order->users_id;



                $user_cart_data = User_cart::with(['product'])->where('status', 1)
                    ->where('users_id', $order_users_id)->get();


                if (isset($user_cart_data) && is_object($user_cart_data) && $user_cart_data->count() > 0) {
                    foreach ($user_cart_data as $key => $value) {
                        $order_product = new OrderProduct;
                        $order_product->order_id = $order_id;
                        $order_product->product_id = isset($value->product->id) && !empty($value->product->id) ? $value->product->id : 0;
                        $order_product->quantity = $value->quantity;
                        $order_product->price = isset($value->product->price) && !empty($value->product->price) ? $value->product->price : 0;
                        $order_product->user_cart_id = $value->id;
                        $order_product->total_price = $value->quantity * $order_product->price;
                        $order_product->created_at = date('Y-m-d H:i:s');
                        $order_product->delivery_status_id = 3; // order recieved
                        $order_product->delivery_status_update_at = date('Y-m-d H:i:s');
                        $order_product->status = 1;
                        $order_product->save();

                        $user_cart_update = User_cart::with(['product'])->where('status', 1)
                            ->where('users_id', $order_users_id)
                            ->where('id', $value->id)
                            ->get()->first();
                        $user_cart_update->updated_at = date('Y-m-d H:i:s');
                        $user_cart_update->status = 3;
                        $user_cart_update->save();
                    }
                }


                if ($transaction_status == 'Failed') {
                } else {
                    $auth_user_data = Auth::user()->toArray();
                    $data['order_data'] = Order::where('users_id', $user_id)
                        ->where('id', $order_id)
                        ->with([
                            'order_product.product.brand', 'order_product.delivery_status',
                            'user_detail',
                            'user', 'state'
                        ])
                        ->get()->first();

                    try {
                        Mail::send('client.email.order-placed', $data, function ($m) use ($auth_user_data) {
                            $user_email = isset($auth_user_data['email']) && !empty($auth_user_data['email']) ? $auth_user_data['email'] : "";
                            $user_name = isset($auth_user_data['name']) && !empty($auth_user_data['name']) ? $auth_user_data['name'] : "";
                            $m->to($user_email, $user_name)->subject('Your Order is placed on always healthy pharma');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    $msg_type = 'success_msg';
                    $msg = "Transaction successfull";
                }
            }
        }
        request()->session()->forget('razorpay_payment_id');
        return  redirect()->route('home.index', [$msg_type  => $msg]);
        exit;
    }

    public static function security_encrypt($string, $action = 'e')
    {
        $secret_key = 'my_simple_secret_key';
        $secret_iv = 'my_simple_secret_iv';

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'e') {
            $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        } else if ($action == 'd') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    public function processTransaction(Request $request)
    {
        
        $shipping_firstname = $request->shipping_firstname ?? '';
        $shipping_lastname = $request->shipping_lastname ?? '';
        $shipping_email_id = $request->shipping_email_id ?? '';
        $shipping_mobile_number = $request->shipping_mobile_number ?? '';
        $shipping_fax = $request->shipping_fax ?? '';
        $shipping_company = $request->shipping_company ?? '';
        $shipping_company_number = $request->shipping_company_number ?? '';
        $shipping_address = $request->shipping_address ?? '';
        $shipping_address2 = $request->shipping_address2 ?? '';
        $shipping_city = $request->shipping_city ?? '';
        $shipping_pincode = $request->shipping_pincode ?? '';
        $shipping_country = $request->shipping_country ?? '';
        $shipping_state_id = $request->shipping_state_id ?? '';
        $shipping_password = $request->password ?? '';
        $confirm_password = $request->confirm_password ?? '';
        $same_billing_address = $request->same_billing_address ?? '0';
        $billing_firstname = $request->billing_firstname ?? '';
        $billing_lastname = $request->billing_lastname ?? '';
        $billing_company = $request->billing_company ?? '';
        $billing_address = $request->billing_address ?? '';
        $billing_address2 = $request->billing_address2 ?? '';
        $billing_city = $request->billing_city ?? '';
        $billing_zip_code = $request->billing_zip_code ?? '';
        $billing_country = $request->billing_country ?? '';
        $billing_state = $request->billing_state ?? '';
        // $shipping_rate = $request->shipping_rate ?? '';
        $shipping_comment = $request->shipping_comment ?? '';
        $payment_method = $request->payment_method ?? '';
        $payment_method = $request->payment_method ?? '';
        $payment_comment = $request->payment_comment ?? '';
        $agree_terms = $request->agree_terms ?? '0';
        $sub_total = $request->sub_total ?? '';
        $total = $request->total ?? '';
        // $shipping_rate = $request->shipping_rate ?? '';
            // dd('fhgfhg');
        if(Auth::check()){
            $users_id = Auth::user()->id;
        }else{
            if($request->account_type == 'register'){
                $olduser = User::where('email',$shipping_email_id)->first();
                if($olduser){
                    $users_id = $olduser->id;
                }else{
                    $users_id = User::insertGetId([
                        'name' => $shipping_firstname,
                        'last_name' => $shipping_lastname,
                        'email' => $shipping_email_id,
                        'fax' => $shipping_fax,
                        'mobile_number' => $shipping_mobile_number,
                        'email_verified_at' => date('Y-m-d H:i:s'),
                        'password' => Hash::make($shipping_password),
                    ]);
                }
            }else if($request->account_type == 'guest'){
                $olduser = User::where('email',$shipping_email_id)->first();
                if($olduser){
                    $users_id = $olduser->id;
                }else{
                    $users_id = User::insertGetId([
                        'name' => $shipping_firstname,
                        'last_name' => $shipping_lastname,
                        'email' => $shipping_email_id,
                        'fax' => $shipping_fax,
                        'mobile_number' => $shipping_mobile_number,
                        'is_guest' => 1,
                        'email_verified_at' => date('Y-m-d H:i:s'),
                        'password' => Hash::make('oks123345'),
                    ]);
                }
            }
        }
        if($request->shipping_address_type == 'existing'){
            $shipping_details = DB::table('users_shipping_detail')->where('id',$request->shipping_address_id)->first();
            // dd($shipping_details);
            $shipping_firstname = $shipping_details->shipping_firstname ?? '';
            $shipping_lastname = $shipping_details->shipping_lastname ?? '';
            $shipping_email_id = $shipping_details->shipping_email_id ?? '';
            $shipping_mobile_number = $shipping_details->shipping_mobile_number ?? '';
            $shipping_fax = $shipping_details->shipping_fax ?? '';
            $shipping_company = $shipping_details->shipping_company ?? '';
            $shipping_company_number = $shipping_details->shipping_company_number ?? '';
            $shipping_address = $shipping_details->shipping_address ?? '';
            $shipping_address2 = $shipping_details->shipping_address2 ?? '';
            $shipping_city = $shipping_details->shipping_city ?? '';
            $shipping_pincode = $shipping_details->shipping_pincode ?? '';
            $shipping_country = $shipping_details->shipping_country ?? '';
            $shipping_state_id = $shipping_details->shipping_state_id ?? '';

            
        }else if($request->shipping_address_type == 'new'){
     
            $res = DB::table('users_shipping_detail')->insert([
                'shipping_firstname' => $shipping_firstname,
                'shipping_lastname' => $shipping_lastname,
                'shipping_email_id' => $shipping_email_id,
                'shipping_mobile_number' => $shipping_mobile_number,
                'shipping_fax' => $shipping_fax,
                'shipping_company' => $shipping_company,
                'shipping_company_number' => $shipping_company_number,
                'shipping_address' => $shipping_address,
                'shipping_address2' => $shipping_address2,
                'shipping_pincode' => $shipping_pincode,
                'shipping_city' => $shipping_city,
                'shipping_state_id' => $shipping_state_id,
                'shipping_country' => $shipping_country,
                'users_id' => $users_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

        }

        if($request->billing_address_type == 'existing'){
            $billing_details = DB::table('users_billing_detail')->where('id',$request->billing_address_id)->first();
            
                $billing_firstname = $billing_details->billing_firstname ?? '';
                $billing_lastname = $billing_details->billing_lastname ?? '';
                $billing_company = $billing_details->billing_company ?? '';
                $billing_address = $billing_details->billing_address ?? '';
                $billing_address2 = $billing_details->billing_address2 ?? '';
                $billing_city = $billing_details->billing_city ?? '';
                $billing_zip_code = $billing_details->billing_zip_code ?? '';
                $billing_country = $billing_details->billing_country ?? '';
                $billing_state = $billing_details->billing_state ?? '';
            
            
        }else if($request->billing_address_type == 'new'){
     
            $res = DB::table('users_billing_detail')->insert([
                'billing_firstname' => $billing_firstname,
                'billing_lastname' => $billing_lastname,
                'billing_company' => $billing_company,
                'billing_address' => $billing_address,
                'billing_address2' => $billing_address2,
                'billing_city' => $billing_city,
                'billing_pincode' => $billing_zip_code,
                'billing_country' => $billing_country,
                'billing_state_id' => $billing_state,
                'users_id' => $users_id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

        }

        if($same_billing_address == 1){
            $billing_firstname = $shipping_firstname;
            $billing_lastname = $shipping_lastname;
            $billing_company = $shipping_company;
            $billing_address = $shipping_address;
            $billing_address2 = $shipping_address2;
            $billing_city = $shipping_city;
            $billing_zip_code = $shipping_pincode;
            $billing_country = $shipping_country;
            $billing_state = $shipping_state_id;
        }
        
        
        $cart_data = CartController::get_cart_details();

        // Define the starting number
        $starting_number = 235680;

        // Get the last order
        $last_order = Order::orderBy('id', 'desc')->first();

        // Determine the next auto_order_id
        if ($last_order) {
            // Extract the numeric part of the last auto_order_id
            $last_order_id = $last_order->auto_order_id;
            
            // Check if the last order ID starts with 'KKS'
            if (strpos($last_order_id, 'KKS') === 0) {
                // Extract numeric part after 'KKS'
                $last_order_id_number = intval(substr($last_order_id, 3));
                $next_order_id_number = $last_order_id_number + 1;
            } else {
                // Handle unexpected format, initialize with starting number
                $next_order_id_number = $starting_number;
            }
        } else {
            // Initialize if no previous orders exist
            $next_order_id_number = $starting_number;
        }

        // Format the new auto_order_id
        $auto_order_id = 'KKS' . str_pad($next_order_id_number, 6, '0', STR_PAD_LEFT);


        $order_id = Order::insertGetId([
            'auto_order_id' => $auto_order_id,
            'shipping_firstname' => $shipping_firstname,
            'shipping_lastname' => $shipping_lastname,
            'shipping_email_id' => $shipping_email_id,
            'shipping_mobile_number' => $shipping_mobile_number,
            'shipping_fax' => $shipping_fax,
            'shipping_company' => $shipping_company,
            'shipping_company_number' => $shipping_company_number,
            'shipping_address' => $shipping_address,
            'shipping_address2' => $shipping_address2,
            'shipping_pincode' => $shipping_pincode,
            'shipping_city' => $shipping_city,
            'shipping_state_id' => $shipping_state_id,
            'shipping_country' => $shipping_country,
            'same_billing_address' => $same_billing_address,
            'billing_firstname' => $billing_firstname,
            'billing_lastname' => $billing_lastname,
            'billing_company' => $billing_company,
            'billing_address' => $billing_address,
            'billing_address2' => $billing_address2,
            'billing_city' => $billing_city,
            'billing_zip_code' => $billing_zip_code,
            'billing_country' => $billing_country,
            'billing_state' => $billing_state,
            'shipping_comment' => $shipping_comment,
            'payment_method' => $payment_method,
            'payment_comment' => $payment_comment,
            'agree_terms' => $agree_terms,
            'total_cart_amount' => $sub_total,
            'total_amount_paid' => $total,
            'users_id' => $users_id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        // comment by me ragini
        
        // foreach($cart_data['cart_product_list'] as $item){
        //     $res = OrderProduct::insert([
        //         'order_id'=>$order_id,
        //         'product_id'=>$item['product_id'],
        //         'variant_id'=>$item['id'],
        //         // 'user_cart_id'=>$item['id'],
        //         'price'=>$item['price'],
        //         'total_price'=>$item['total_price'],
        //         'quantity'=>$item['quantity'],
        //         'created_at'=>date('Y-m-d H:i:s'),
        //     ]);

        //     if($res == 1){
        //         $updatecart = User_cart::where(['product_id'=>$item['product_id'],'users_id'=>$users_id])->update(['status'=>3]);
        //     }
        // }

        if($payment_method == 'paypal'){
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "EUR",
                            "value" => $total,
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('home.checkout_form')
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->route('home.checkout_form')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }else if($payment_method == 'bitcoin'){
            $bitcoin_transaction_id = $request->bitcoin_transaction_id ?? '';
            $res = Order::where('id',$order_id)->update([
                'bitcoin_transaction_id'=>$bitcoin_transaction_id
            ]);
            $cookie_product_cart=[];
            $cookie_product_cart = json_encode($cookie_product_cart, JSON_FORCE_OBJECT);
            $userData=json_decode(Order::where('id',$order_id)->first(),true);
            $order_data = json_decode(OrderProduct::where('order_id',$order_id)->get(),true);
            $getVariant=[];
            foreach($order_data as $value){
                $value['variant']=json_decode(ProductVariant::with(['product'])->where('id',$value['product_id'])->first(),true);
                $getVariant[]=$value;
            }
            $userData['orders']=$getVariant;
            if($res == 1){
                Mail::send('client2.email.order_mail', $userData, function($message) use ($userData) {
                    $message->to($userData['shipping_email_id'], 'Online Kamagra Store')->subject
                    ('Online Kamagra Store Order Confirmation');
                    //    $message->from('testemailvikas@gmail.com','BlueCollar');
                    $message->from('support@onlinekamagrastore.com','Online Kamagra Store');
                });
                setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");
                return redirect(route('home.thank-you',['order_id'=>$userData['auto_order_id']]));
            }
        }else if($payment_method == 'bank'){
            $bitcoin_transaction_id = $request->bitcoin_transaction_id ?? '';
            $res = Order::where('id',$order_id)->update([
                'bitcoin_transaction_id'=>$bitcoin_transaction_id
            ]);
            $cookie_product_cart=[];
            $cookie_product_cart = json_encode($cookie_product_cart, JSON_FORCE_OBJECT);
            $userData=json_decode(Order::where('id',$order_id)->first(),true);
            $order_data = json_decode(OrderProduct::where('order_id',$order_id)->get(),true);
            $getVariant=[];
            foreach($order_data as $value){
                $value['variant']=json_decode(ProductVariant::with(['product'])->where('id',$value['variant_id'])->first(),true);
                $getVariant[]=$value;
            }
            $userData['orders']=$getVariant;
            // dd('ragini');
            if($res == 1){
                // Mail::send('client2.email.invoice_confirm', $userData, function($message) use ($userData) {
                //     $message->to($userData['shipping_email_id'], 'Online Kamagra Store')->subject
                //     ('Online Kamagra Store Order Confirmation');
                //     //    $message->from('testemailvikas@gmail.com','BlueCollar');
                //     $message->from('support@onlinekamagrastore.com','Online Kamagra Store');
                // });
                // dd($userData);

                // comment by ragini
                // Mail::send('client2.email.invoice_confirm', $userData, function($message) use ($userData) {
                //     $message->to($userData['shipping_email_id'],'Online Kamagra Store')->subject
                //     ('Onlne Kamagra Store Order Confirmation');
                //     $message->from('support@onlinekamagrastore.com','Online Kamagra Store');
                // });
                // dd('prajapati');
                setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");
                
                // Store user_id and shipping_firstname in the session
                session()->put('user_id', $users_id);
                session()->put('shipping_firstname', $shipping_firstname);
                // dd(session()->all());
                // dd('arvind');
                return redirect(route('home.thank-you',['order_id'=>$userData['auto_order_id']])); 
                
                //this is ragini code
                // return redirect()->route('home.thank-you', [
                //     'order_id' => $auto_order_id,
                //     'user_id' => $users_id,
                //     'shipping_firstname' => $shipping_firstname
                // ]); if you want to show user_name ans shipping_information in url

                // return redirect()->route('home.thank-you');
            }
        }
    }

     public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('home.checkout_form')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('home.checkout_form')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('home.checkout_form')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function _display($view, $data)
    {
        $cart_data = CartController::get_cart_details();
        $this->data['cart_total_quantity']  = isset($cart_data['cart_total_quantity']) && !empty($cart_data['cart_total_quantity']) ? $cart_data['cart_total_quantity'] : 0;
        $data  = array_merge($this->data, $data);
        $data['cart_data']=$cart_data;
        return view($view, $data);
    }
}
