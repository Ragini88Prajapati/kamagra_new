<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\Gender;
use App\Models\Client\Product;
use App\Models\Client\ProductType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class ProductController extends Controller
{

    public $data = array();

    public function __construct()
    {
    }

    public function index()
    {
        $getdata = request()->input();
        $getdata_gender  =  array();
        $getdata_product_type = array();
        $data = $this->data;

        if (isset($getdata['gender']) && !empty($getdata['gender'])) {
            $getdata_gender =  explode(',', $getdata['gender']);
            $data['getdata']['gender'] = $getdata_gender;
        }

        if (isset($getdata['product_type']) && !empty($getdata['product_type'])) {
            $getdata_product_type =  explode(',', $getdata['product_type']);
            $data['getdata']['product_type'] = $getdata_product_type;
        }


        // $product_list = Product::with([
        //     'gender' => function ($query)  use ($getdata_gender) {
        //         if (isset($getdata_gender) && is_array($getdata_gender) && count($getdata_gender) > 0) {
        //             $query->whereIn('name', $getdata_gender);
        //         }
        //     },
        //     'product_type' => function ($query)  use ($getdata_product_type) {
        //         if (isset($getdata_product_type) && is_array($getdata_product_type) && count($getdata_product_type) > 0) {
        //             $query->whereIn('name', $getdata_product_type);
        //         }
        //     }
        // ])->select('name', 'id', 'mrp', 'price', 'subtitle', 'discount', 'slug', 'image', 'image_path', 'gender_id')
        //     ->where('status', 1);

        // $product_list = Product::whereHas(
        //     'gender',
        //     function ($query)  use ($getdata_gender) {
        //         // if (isset($getdata_gender) && is_array($getdata_gender) && count($getdata_gender) > 0) {
        //         //     return $query->whereIn('name', $getdata_gender);
        //         // }
        //         return $query->whereIn('id', [1]);
        //     }
        // )
        //     ->whereHas('product_type', function ($query)  use ($getdata_product_type) {
        //         if (isset($getdata_product_type) && is_array($getdata_product_type) && count($getdata_product_type) > 0) {
        //             return $query->whereIn('name', $getdata_product_type);
        //         } else {
        //             return $query;
        //         }
        //     })->select('name', 'id', 'mrp', 'price', 'subtitle', 'discount', 'slug', 'image', 'image_path', 'gender_id')
        //     ->where('status', 1);
        $product_list = Product::where('status', 1);
        if (isset($getdata['search']) && !empty($getdata['search'])) {
            $search = '%' . $getdata['search'] . '%';
            $product_list->where('name', 'like', $search);
        }

        $product_list = $product_list->get();
        $data['product_list'] = $product_list;


        $data['gender_list'] = Gender::select('id', 'name')->where('status', 1)->get();
        $data['product_type_list'] = ProductType::select('id', 'name')->where('status', 1)->get();
        // return $this->_display('client.product.product-list', $data);
        // dd($data);
        return $this->_display('client2.product-list', $data);
    }

    // ragini
    public function productsByCategory($category_id)
    {
        // dd("ragini");
        $category = Category::findOrFail($category_id);
        $products = $category->products()->where('status', 1)->get();

        $cart_data = CartController::get_cart_details();

        $data = [
            'products' => $products,
            'categories' => Category::select('id', 'name')->where('status', 1)->get(),
            'cart_data' => $cart_data,
        ];

        return view('client2.category-product', $data);
    }

    

    public function product_list_filter()
    {
        $getdata = request()->input();
        $get_parameter_array  = array();
        if (isset($getdata['gender']) && is_array($getdata['gender']) && count($getdata['gender']) > 0) {
            $gender_imploded = implode(',', $getdata['gender']);
            $get_parameter_array['gender'] = $gender_imploded;
        }

        if (isset($getdata['product_type']) && is_array($getdata['product_type']) && count($getdata['product_type']) > 0) {
            $product_type_imploded = implode(',', $getdata['product_type']);
            $get_parameter_array['product_type'] = $product_type_imploded;
        }

        if (isset($getdata['search']) && !empty($getdata['search'])) {
            $get_parameter_array['search'] = $getdata['search'];
        }

        return redirect()->route('product.product-list', $get_parameter_array);
    }

    public function product_preview($product_slug  = '')
    {
        // dd('ragini');
        $data = $this->data;
        $data['product_list'] = Product::where('status',1)->select('name', 'slug', 'id', 'mrp', 'price', 'subtitle', 'discount', 'image', 'image_path', 'gender_id')->get();
        $data['product_data'] = Product::with('brand', 'product_image')->select("*")->where('slug', $product_slug)->get()->first();
        // ragini
        $data['categories'] = Category::select('id', 'name')->where('status', 1)->get();
        // dd($data);exit;
        return $this->_display('client2.product-detail', $data);
    }

    public function add_to_cart()
    {
        $postdata = request()->input();
        $product = isset($postdata['product']) && !empty($postdata['product']) ? $postdata['product'] : "";
        $quantity = isset($postdata['quantity']) && !empty($postdata['quantity']) && is_numeric($postdata['quantity']) ? $postdata['quantity'] : "";
        if ($quantity  == '' || $product  == '') {
            http_response_code(400);
            exit;
        }
        
        $cart_controller_response = CartController::add($product, $quantity);
        // print_r($cart_controller_response);exit;
        if ($cart_controller_response) {
            $cart_data = CartController::get_cart_details();
            $total_cart_quantity = isset($cart_data['cart_total_quantity']) && !empty($cart_data['cart_total_quantity']) ? $cart_data['cart_total_quantity'] : 0;;
            $response_array = array(
                'cart_total_quantity' => $total_cart_quantity,
                'msg' => 'success'
            );

            echo json_encode($response_array);
            http_response_code(200);
            exit;
        } else {
            http_response_code(400);
            exit;
        }
    }

    public function delete_from_cart()
    {
        $postdata = request()->input();
        $product = isset($postdata['product']) && !empty($postdata['product']) ? $postdata['product'] : "";

        if ($product  == '') {
            http_response_code(400);
            exit;
        }

        $delete_response = CartController::delete($product);
        if ($delete_response) {
            http_response_code(200);
            exit;
        } else {
            http_response_code(400);
            exit;
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
