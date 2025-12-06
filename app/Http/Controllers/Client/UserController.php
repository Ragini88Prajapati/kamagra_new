<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\OrderProduct;
use App\Models\Client\Order;
use App\Models\Client\User_cart;
use App\Models\Client\Users_detail;
use App\User;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public $data = array();
    function test()
    {
        // return view('client.user.select-address');
        return view('client.user.signup');
    }

    function order_history()
    {
        $data  = array();
        $user_id = Auth::user()->id;
        $data['order_data'] = Order::where('users_id', $user_id)
            ->with([
                'order_product.product.brand', 'order_product.delivery_status',
                'user', 'state'
            ])
            ->get();
        // dd($data);
        // return $this->_display('client.user.order-history', $data);
        return $this->_display('client2.order-history', $data);
    }

    public function addressList(){
        $data=[];
        $data['add_list']=Users_detail::where('users_id',Auth::user()->id)->get();
        return $this->_display('client2.address-list', $data);
    }

    public function deleteAddress(Request $request){
        $res=Users_detail::where('users_id',Auth::user()->id)->where('id',request()->input('ad_id'))->delete();
        if($res){
            return redirect()->back()->with('msg', 'Address Deleted successfully');
        }else{
            return redirect()->back()->with('msg', 'Something went wrong');
        }
    }

    public function add_address()
    {
        $data  = array();
        $data['country']=DB::table('as_countries')->select('*')->get();
        // dd($data);
        $user_id = Auth::user()->id;

        return $this->_display('client2.address', $data);
    }

    public function add_address_post()
    {
        $validator = request()->validate([
            'company'      => 'required',
            'address_1'     => 'required',
            'address_2' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'country_id' => 'required',
            'zone_id' => 'required',
            
        ]);

        $user_id  =  Auth::user()->id;
        $user_detail = new Users_detail;
        $user_detail->shipping_company = $validator['company'];
        // $user_detail->email_id = $validator['email_id'];
        // $user_detail->mobile_number = $validator['mobile_number'];
        // $user_detail->alt_mobile_number = $validator['alt_mobile_number'];
        $user_detail->shipping_address = $validator['address_1'];
        $user_detail->shipping_address2 = $validator['address_2'];
        $user_detail->shipping_pincode = $validator['postcode'];
        // $user_detail->landmark = $validator['landmark'];
        $user_detail->shipping_country = $validator['country_id'];
        $user_detail->shipping_state_id  = $validator['zone_id'];
        $user_detail->shipping_city = $validator['city'];
        $user_detail->created_at = date('Y-m-d H:i:s');
        $user_detail->users_id =  $user_id;
        $user_detail->status = 1;
        $user_detail->save();

        // return redirect()->route('home.index')->with('success_msg', 'Address Added successfully');
        return redirect()->back()->with('msg', 'Address Added successfully');
    }

    public function getState(Request $request){
        // echo request()->input('country_id');exit;
        $state=DB::table('as_states')->select('*')
                ->where('country_id',request()->input('country_id'))
                ->get();
        // print_r($state);exit;
        $select='<option value=""> --- Please State --- </option>';
        foreach($state as $value){
            $select.='<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        echo $select;exit;
    }

    public function forgetPassPage(){
        $data=array();
        return $this->_display('client2.forgotten', $data);
    }

    public function forgot(Request $request) {
        $credentials = request()->validate(['email' => 'required|email']);
        $data=User::where('email',$credentials['email'])->first();
        if($data){
            User::where('email',$credentials['email'])->update(['reset_link'=>Hash::make(time()),'reset_used'=>'0']);
            $userData=json_decode(User::where('email',$credentials['email'])->first(),true);
            // print_R($userData);exit;
            $validator['forget']='true';
            Mail::send('client2.email.user_reset_email', $userData, function($message) use ($userData) {
                $message->to($userData['email'], 'Online Kamagra Store')->subject
                   ('Online Kamagra Store Password Reset Request');
             //    $message->from('testemailvikas@gmail.com','BlueCollar');
                $message->from('support@onlinekamagrastore.com','Online Kamagra Store');
            });
            return redirect()->back()->with('msg','Reset link send to your email');
        }else{
            return redirect()->back()->with('msg','Invalid Id');
        }
        
    }

    public function resetPassword(Request $request){
        
        $data = [];
        // dd(request()->input('v'));
        $link=request()->input('v');
        $userData=User::where('reset_link',$link)->where('reset_used','0')->first();
        if(!empty($userData)){
            $data['userData']=$userData;
            $data['expired']='No';
            User::where('email',$userData->email)->update(['reset_used'=>'1']);
        }else{
            $data['expired']='Yes';
        }
        
        return $this->_display('client2.change-password', $data);
        // return view('client.change-password', $data);
    }

    public function reset(Request $request) {
        $link=request()->input('reset_link');
        $pass=request()->input('password');
        $user=User::where('reset_link',$link)->first();
        // dd($user);
        if(!empty($user)){
            User::where('reset_link',$link)->update(['password'=>Hash::make($pass)]);
            return redirect(route('login'))->with('msg','Password Changed');
        }else{
            return redirect(route('login'))->with('msg','User not found');
        }

    }

    public function viewWishlist(Request $request){
        $data=[];
        $data['wishlist']=Wishlist::where('user_id',Auth::user()->id)->get();
        return $this->_display('client2.wishlist',$data);
    }

    public function addToWishlist(Request $request){
        $check=Wishlist::where('product_id',request()->input('id'))->where('user_id',Auth::user()->id)->first();
        if($check){
            echo '1';exit;
        }else{
            $res=Wishlist::insert([
                'user_id'=>Auth::user()->id,
                'product_id'=>request()->input('id'),
                'created_at'=>date('Y-m-d H:i:s')
            ]);
            if($res){
                echo '1';exit;
            }else{
                echo '2';exit;
            }
        }
    }

    public function removeFromWishlist(Request $request){
        $check=Wishlist::where('product_id',request()->input('id'))->where('user_id',Auth::user()->id)->delete();
        if($check){
            echo '1';exit;
        }else{
            echo '2';exit;
        }
    }

    public function profileEdit(){
        $data=[];
        $data['user_data']=User::where('id',Auth::user()->id)->get();
        return $this->_display('client2.user-profile',$data);
    }
    public function profileUpdate(Request $request){
        // dd(request()->input());
        $validator = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email'     => 'required',
            'telephone' =>  'required|min:10|max:12',
            'fax' =>  'required',
        ]);

        $user = User::where('id',Auth::user()->id)->update([
            'name' => request()->input('firstname'),
            'last_name' => request()->input('lastname'),
            'email' => request()->input('email'),
            'fax' => request()->input('fax'),
            'mobile_number' => request()->input('telephone'),
        ]);
        

        if ($user) {
            return back()->with('msg', 'Profile Updated');
        } else {
            return back()->withInput(request()->only('email', 'name', 'mobile_number'))->with('msg', 'Something  went wrong');
        }
    }

    public function _display($view, $data)
    {
        $cart_data = CartController::get_cart_details();
        $this->data['cart_total_quantity']  = isset($cart_data['cart_total_quantity']) && !empty($cart_data['cart_total_quantity']) ? $cart_data['cart_total_quantity'] : 0;
        $data  = array_merge($this->data, $data);
        $data['cart_data']=$cart_data;
        // dd($data);
        return view($view, $data);
    }
}
