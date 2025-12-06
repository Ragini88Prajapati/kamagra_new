<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Product;
use App\Models\Client\User_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\ProductVariant;

class CartController extends Controller
{
    public static function add($product, $quantity = 1)
    {
        $quantity =  is_numeric($quantity) ? $quantity : 1;
        $product_data = ProductVariant::where('id', $product)->get()->first();
        
        // print_r($product_data);exit;
        if ($product_data) {
            if (!isset($product_data->id)) {
                return false;
            }
        } else {
            return false;
        }
        if (Auth::check()) {
            return self::add_to_database($product, $quantity, $product_data);
        } else {
            return self::add_to_cookie($product, $quantity, $product_data);
        }

        return true;
    }

    public static function add_to_database($product, $quantity, $product_data)
    {
        $user_id = Auth::user()->id;
        $product_id = $product_data->id;
        $user_cart  = User_cart::where('status', 1)
            ->where('users_id', $user_id)
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->get()->first();



        if ($user_cart) {
            $user_cart->updated_at  = date('Y-m-d H:i:s');
            $user_cart->quantity = isset($user_cart->quantity) && !empty($user_cart->quantity) ? $user_cart->quantity + $quantity : $quantity;;
        } else {
            $user_cart = new User_cart;
            $user_cart->created_at  = date('Y-m-d H:i:s');
            $user_cart->users_id  = $user_id;
            $user_cart->product_id  = $product_id;
            $user_cart->quantity =  $quantity;
        }
        $user_cart->status = 1; //active
        $user_cart->save();
        return true;
    }

    public static function add_to_cookie($product, $quantity, $product_data)
    {
        $cookie_data = $_COOKIE;
        $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();
        if (json_last_error() != JSON_ERROR_NONE) {
            $cookie_product_cart = array();
        }

        $product_encrypted_id  =  PaymentGatewayController::security_encrypt($product_data->id);
        if (isset($cookie_product_cart[$product_encrypted_id]) && !empty($cookie_product_cart[$product_encrypted_id]) && is_numeric($cookie_product_cart[$product_encrypted_id])) {
            $cookie_product_cart[$product_encrypted_id] = $cookie_product_cart[$product_encrypted_id] + $quantity;
        } else {
            $cookie_product_cart[$product_encrypted_id] = $quantity;
        }

        $cookie_product_cart = json_encode($cookie_product_cart, JSON_FORCE_OBJECT);
        // print_r($cookie_product_cart);exit;
        setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");
        return true;
    }

    public function show_cart()
    {
        $cookie_data = $_COOKIE;
        $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();
        $data = array();

        $data = self::get_cart_details();
        $data['cart_data']=$data;
        // dd($data);exit;
        return view('client2.cart', $data);
        // return view('client.product.product-cart', $data);
    }

    public static function get_cart_details()
    {
        $data = array();

        if (Auth::check()) {
            $data = self::get_cart_from_database();
        } else {
            $data = self::get_cart_from_cookies();
        }

        return $data;
    }

    // public static function get_cart_details()
    // {
    //     $cookie_data = $_COOKIE;
    //     $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();
    //     $data = array();
    //     if (isset($cookie_product_cart) && is_array($cookie_product_cart) && count($cookie_product_cart) > 0) {
    //         foreach ($cookie_product_cart as $key => $value) {
    //             $decrypted_key = PaymentGatewayController::security_encrypt($key, 'd');
    //             $product_slug_array[] = $decrypted_key;
    //             $cookie_product_cart_data[$decrypted_key] = $value;
    //         }

    //         $product_slug_list = "'" . implode("','", $product_slug_array) . "'";

    //         $product_list_db = Product::where('status', 1)->whereIn('id', $product_slug_array)->get()->toArray();
    //         if (isset($product_list_db) && is_array($product_list_db) && count($product_list_db) > 0) {
    //             foreach ($product_list_db as $key => $value) {
    //                 $data['product_list'][$value['id']] =  $value;
    //             }
    //         }

    //         $data['cookie_product_cart'] = $cookie_product_cart;
    //     }

    //     return false;
    // }

    public static function get_cart_from_cookies()
    {
        $cookie_data = $_COOKIE;
        $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();
        $data = array();
        $data['cart_total_price'] = 0;
        $data['cart_total_quantity'] = 0;
        if (isset($cookie_product_cart) && is_array($cookie_product_cart) && count($cookie_product_cart) > 0) {
            foreach ($cookie_product_cart as $key => $value) {
                $decrypted_key = PaymentGatewayController::security_encrypt($key, 'd');
                $product_slug_array[] = $decrypted_key;
                $cookie_product_cart_data[$decrypted_key] = $value;
            }
            
            $product_slug_list = "'" . implode("','", $product_slug_array) . "'";
            
            $product_list_db = ProductVariant::whereIn('id', $product_slug_array)->get()->toArray();
            
            if (isset($product_list_db) && is_array($product_list_db) && count($product_list_db) > 0) {
                foreach ($product_list_db as $key => $value) {
                    if (isset($cookie_product_cart_data[$value['id']]) && !empty($cookie_product_cart_data[$value['id']]) && is_numeric($cookie_product_cart_data[$value['id']])) {
                        $data['cart_product_list'][$value['id']] =  $value;
                        $data['cart_product_list'][$value['id']]['quantity'] = $cookie_product_cart_data[$value['id']];
                        $data['cart_product_list'][$value['id']]['price'] = $value['price'];
                        $total_price = $value['price'] * $cookie_product_cart_data[$value['id']];
                        $data['cart_product_list'][$value['id']]['total_price'] = $total_price;
                        $data['cart_total_price']  += $total_price;
                        $data['cart_total_quantity'] += $data['cart_product_list'][$value['id']]['quantity'];
                    }
                }
            }
            
            $data['cookie_product_cart_data'] = $cookie_product_cart_data;
        }
        // print_r($data);exit;
        return $data;
    }

    public static  function get_cart_from_database()
    {
        $user_id = Auth::user()->id;
        $user_cart_list = User_cart::with(['variant'])
            ->where('users_id', $user_id)
            ->where('status', 1)->get()->toArray();
        $data = array();
        $data['cart_total_price'] = 0;
        $data['cart_total_quantity'] = 0;

        if (isset($user_cart_list) && is_array($user_cart_list) && count($user_cart_list) > 0) {
            foreach ($user_cart_list as $key => $value) {
                if (isset($value['variant']['id']) && !empty($value['variant']['id'])) {
                    $data['cart_product_list'][$value['variant']['id']] = $value['variant'];
                    $data['cart_product_list'][$value['variant']['id']]['quantity']  = $value['quantity'];
                    $data['cart_product_list'][$value['variant']['id']]['price'] = $value['variant']['price'];
                    $total_price = $value['quantity'] * $value['variant']['price'];
                    $data['cart_product_list'][$value['variant']['id']]['total_price'] = $total_price;
                    $data['cart_total_price']  += $total_price;
                    $data['cart_total_quantity'] += $value['quantity'];
                }
            }
        }
        return $data;
    }

    public static function cookies_to_database()
    {
        $cookie_data = self::get_cart_from_cookies();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if (isset($cookie_data['cart_product_list']) && is_array($cookie_data['cart_product_list']) && count($cookie_data['cart_product_list']) > 0) {
                foreach ($cookie_data['cart_product_list'] as $key => $value) {
                    $quantity = isset($value['quantity']) && !empty($value['quantity']) ? $value['quantity'] : 1;;
                    $user_cart  = User_cart::where('status', 1)
                        ->where('users_id', $user_id)
                        ->where('product_id', $value['id'])
                        ->where('status', 1)
                        ->get()->first();


                    if ($user_cart) {
                        $user_cart->updated_at  = date('Y-m-d H:i:s');
                        $user_cart->quantity = isset($user_cart->quantity) && !empty($user_cart->quantity) ? $user_cart->quantity + $quantity : $quantity;;
                    } else {
                        $user_cart = new User_cart;
                        $user_cart->created_at  = date('Y-m-d H:i:s');
                        $user_cart->users_id  = $user_id;
                        $user_cart->product_id  = $value['id'];
                        $user_cart->quantity =  $quantity;
                    }
                    $user_cart->status = 1; //active
                    $user_cart->save();
                }
            }
            $cookie_product_cart = json_encode(array(), JSON_FORCE_OBJECT);
            setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");
            return true;
        } else {
            return false;
        }
    }

    public static function delete($product = '')
    {
        $postdata = request()->input();
        $product = isset($postdata['product']) && !empty($postdata['product']) ? $postdata['product'] : "";

        // $product_data = Product::where('status', 1)->where('slug', $product)->get()->first();
        $product_data = ProductVariant::where('id', $product)->get()->first();

        if ($product_data) {
            if (!isset($product_data->id)) {
                return false;
            }
        } else {
            return false;
        }

        if (Auth::check()) {
            return self::delete_from_database($product, $product_data);
        } else {
            return self::delete_from_cookie($product, $product_data);
        }

        return true;
    }

    public static function delete_from_database($product, $product_data)
    {
        $user_id = Auth::user()->id;
        $product_id = $product_data->id;
        $user_cart  = User_cart::where('status', 1)
            ->where('users_id', $user_id)
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->get()->first();


        if ($user_cart) {
            $user_cart->updated_at  = date('Y-m-d H:i:s');
            $user_cart->status = 2; //active
            $user_cart->save();
        }

        return true;
    }

    public static function delete_from_cookie($product, $product_data)
    {
        $cookie_data = $_COOKIE;
        $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();

        if (json_last_error() != JSON_ERROR_NONE) {
            $cookie_product_cart = array();
        }

        $product_encrypted_id = PaymentGatewayController::security_encrypt($product_data->id, 'e');

        if (isset($cookie_product_cart[$product_encrypted_id]) && !empty($cookie_product_cart[$product_encrypted_id])) {
            unset($cookie_product_cart[$product_encrypted_id]);
        }

        $cookie_product_cart = json_encode($cookie_product_cart, JSON_FORCE_OBJECT);
        setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");

        return true;
    }

    public function update_cart(Request $request){
        $quantity =  is_numeric(request()->input('quantity')) ? request()->input('quantity') : 1;
        $product_data = ProductVariant::where('id', request()->input('product'))->get()->first();
        // print_r(request()->input());exit;
        
        if ($product_data) {
            if (!isset($product_data->id)) {
                return false;
            }
        } else {
            return false;
        }
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $product_id = $product_data->id;
            $user_cart  = User_cart::where('status', 1)
                ->where('users_id', $user_id)
                ->where('product_id', $product_id)
                ->where('status', 1)
                ->get()->first();

            if ($user_cart) {
                $user_cart->updated_at  = date('Y-m-d H:i:s');
                $user_cart->quantity = $quantity;
            } 
            $user_cart->status = 1; //active
            $user_cart->save();
            return true;
        } else {
            $cookie_data = $_COOKIE;
            $cookie_product_cart = isset($cookie_data['product_cart']) && !empty($cookie_data['product_cart']) ? json_decode($cookie_data['product_cart'], true) : array();
            if (json_last_error() != JSON_ERROR_NONE) {
                $cookie_product_cart = array();
            }

            $product_encrypted_id  =  PaymentGatewayController::security_encrypt($product_data->id);
            if (isset($cookie_product_cart[$product_encrypted_id]) && !empty($cookie_product_cart[$product_encrypted_id]) && is_numeric($cookie_product_cart[$product_encrypted_id])) {
                $cookie_product_cart[$product_encrypted_id] = $quantity;
            } 

            $cookie_product_cart = json_encode($cookie_product_cart, JSON_FORCE_OBJECT);
            // print_r($cookie_product_cart);exit;
            setcookie('product_cart', $cookie_product_cart, time() + (86400 * 30), "/");
            return true;
        }

        return true;
    }
}
