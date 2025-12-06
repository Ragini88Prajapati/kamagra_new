<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Gender;
use App\Models\Admin\ProductType;
use App\Models\Admin\Product;
use App\Models\Admin\Product_images;
use App\Models\Admin\Category;
use App\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        // $img_url = Storage::url('public/HiwlV1w6y8VEPQgoNaawfzhXPgZ9boFOfEPyxeou.jpeg');
        // echo "<img src='$img_url'>";
        // exit;
        // // 
        $data  =  array();
        $data['product_list']  =  Product::with(['brand', 'gender'])->where('status', 1)->get();

        return view('admin.product.product-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        $data['brand_list'] = Brand::select('id', 'name')->where('status', 1)->get();
        $data['gender_list'] = Gender::select('id', 'name')->where('status', 1)->get();
        $data['product_type_list'] = ProductType::select('id', 'name')->where('status', 1)->get();
        // ragini
        $data['categories'] = Category::select('id', 'name')->where('status', 1)->get(); 
        return view('admin.product.product-form', $data);
    }

    public function insert(Request $request)
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:product,name',
            'subtitle' => 'required|string|max:255',
            'highlights'  =>  'required',
            'description'  =>  'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            // 'brand' => 'required|exists:brand,id',
            // 'product_type' => 'required|exists:product_type,id',
            // 'mrp'  => 'required',
            // 'discount'  => 'required',
            'price'  => 'required',
            'category_id'  => 'required',
            // 'gender' => 'required|exists:gender,id',
            'image' => 'mimes:jpeg,jpg,png|required',
            'product_image.*'  => 'mimes:jpeg,jpg,png',
            'number_text' => 'nullable'
        ]);

        $slug =  str_replace(' ', '-', trim($validated_request['name']));
        $user_id = Auth::guard('admin')->user()->id;
        $product = new Product;
        $product->name  = $validated_request['name'];
        $product->slug  = $slug;
        $product->subtitle  = $validated_request['subtitle'];
        $product->highlights  = $validated_request['highlights'];
        $product->description  = $validated_request['description'];
        // $product->mrp  = $validated_request['mrp'];
        // $product->discount  = $validated_request['discount'];
        $product->meta_title = $validated_request['meta_title'];
        $product->meta_keyword = $validated_request['meta_keyword'];
        $product->meta_description = $validated_request['meta_description'];
        
        $product->meta_robot = $request -> meta_robot;
        $product->canonical_url = $request -> canonical_url;
        $product->og_type = $request -> og_type;
        $product->og_title = $request -> og_title;
        $product->og_description = $request -> og_description;
        $product->og_url = $request -> og_url;
        $product->og_site_name = $request -> og_site_name;
        $product->twitter_card = $request -> twitter_card;
        $product->twitter_site = $request -> twitter_site;
        $product->twitter_title = $request -> twitter_title;
        $product->twitter_description = $request -> twitter_description;
        
        $product->price  = $validated_request['price'];
        $product->category_id  = $validated_request['category_id'];
        // $product->gender_id  = $validated_request['gender'];
        // $product->product_type_id  = $validated_request['product_type'];
        $product->number_text = $validated_request['number_text'];
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = $user_id;
        $product->status = 1;
        $product->save();

        $product_id = $product->id;

        $image_file = request()->file('image');
        $image_name  = $image_file->hashName();
        // $image_path  = 'public/assets/resources/product/' . $product_id . '/images/';
        // $image_file->store($image_path);
        // $image_name = time().$file->getClientOriginalName();
            $image_file->move(public_path().'/assets/images/product', $image_name);

        $product_new = Product::where('status', 1)->where('id', $product_id)->first();
        $product_new->image  =  $image_name;
        // $product_new->image_path  =  $image_path;
        $product_new->save();

        // if (request()->file('product_image') != null && !empty(request()->file('product_image'))) {
        //     foreach (request()->file('product_image') as $value) {
        //         $product_images = new Product_images;
        //         $filename  = $value->hashName();
        //         // $product_path = 'public/assets/resources/product/' . $product_id . '/images/';
        //         // if ($value->store($product_path)) {
        //         if ($value->move(public_path().'/assets/images/product', $filename)) {
        //             $product_images->created_at = date('Y-m-d H:i:s');
        //             $product_images->image  = $filename;
        //             $product_images->image_path   = $product_path;
        //             $product_images->created_by  = $user_id;
        //             $product_images->status  = 1;
        //             $product_images->product_id  = $product_id;
        //             $product_images->save();
        //         }
        //     }
        // }

        return redirect()->route('admin.product.list')->with('success_msg', 'Product Added successfully');
    }

    public  function edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['product_data'] = Product::where('id', $id)->where('status', 1)->get()->first();
        $data['brand_list'] = Brand::select('id', 'name')->where('status', 1)->get();
        $data['gender_list'] = Gender::select('id', 'name')->where('status', 1)->get();
        $data['product_type_list'] = ProductType::select('id', 'name')->where('status', 1)->get();
        // ragini
        $data['categories'] = Category::select('id', 'name')->where('status', 1)->get();
        return view('admin.product.product-form', $data);
    }

    public  function update(Request $request)
    {
        $product_id  = request()->input('product_id', 0);
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:product,name,' . $product_id . ',id',
            'subtitle' => 'required|string|max:255',
            'highlights'  =>  'required',
            'description'  =>  'required',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            // 'brand' => 'required|exists:brand,id',
            // 'product_type' => 'required|exists:product_type,id',
            // 'mrp'  => 'required',
            // 'discount'  => 'required',
            'price'  => 'required',
            'category_id'  => 'required',
            // 'gender' => 'required|exists:gender,id',
            'image' => 'mimes:jpeg,jpg,png',
            'product_image.*'  => 'mimes:jpeg,jpg,png',
            'number_text' => 'nullable'
        ]);

        $slug =  str_replace(' ', '-', trim($validated_request['name']));
        $user_id = Auth::guard('admin')->user()->id;
        $product = Product::where('id', $product_id)->get()->first();
        $product->name  = $validated_request['name'];
        $product->slug  = $slug;
        $product->subtitle  = $validated_request['subtitle'];
        $product->highlights  = $validated_request['highlights'];
        $product->description  = $validated_request['description'];
        // $product->mrp  = $validated_request['mrp'];
        // $product->discount  = $validated_request['discount'];
        $product->price  = $validated_request['price'];
        $product->category_id  = $validated_request['category_id'];
        // $product->brand_id  = $validated_request['brand'];
        // $product->gender_id  = $validated_request['gender'];
        // $product->product_type_id  = $validated_request['product_type'];
        $product->meta_title = $validated_request['meta_title'];
        $product->meta_keyword = $validated_request['meta_keyword'];
        $product->meta_description = $validated_request['meta_description'];
        
        $product->meta_robot = $request -> meta_robot;
        $product->canonical_url = $request -> canonical_url;
        $product->og_type = $request -> og_type;
        $product->og_title = $request -> og_title;
        $product->og_description = $request -> og_description;
        $product->og_url = $request -> og_url;
        $product->og_site_name = $request -> og_site_name;
        $product->twitter_card = $request -> twitter_card;
        $product->twitter_site = $request -> twitter_site;
        $product->twitter_title = $request -> twitter_title;
        $product->twitter_description = $request -> twitter_description;
        
        $product->number_text = $validated_request['number_text'];
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = $user_id;
        $product->status = 1;
        $product->save();

        $product_id = $product->id;

        if (request()->file('image') != null && !empty(request()->file('image'))) {
            // echo 'hi';exit;
            // $image_file = request()->file('image');
            // $image_name  = $image_file->hashName();
            // $image_path  = 'public/assets/resources/product/' . $product_id . '/images/';
            // $image_file->store($image_path);
            $file = request()->file('image');
            $image_name = time().$file->getClientOriginalName();

            $file->move(public_path().'/assets/images/product', $image_name);

            $product_new = Product::where('status', 1)->where('id', $product_id)->first();
            $product_new->image  =  $image_name;
            // $product_new->image_path  =  $image_path;
            $product_new->image_path  =  '';
            $product_new->save();
        }

        // if (request()->file('product_image') != null && !empty(request()->file('product_image'))) {
        //     foreach (request()->file('product_image') as $value) {
        //         $product_images = new Product_images;
        //         $filename  = $value->hashName();
        //         // $product_path = 'public/assets/resources/product/' . $product_id . '/images/';
        //         // $value->move(public_path().'/assets/images/product', $filename);
        //         // if ($value->store($product_path)) {
        //         if ($value->move(public_path().'/assets/images/product', $filename)) {
        //             $product_images->created_at = date('Y-m-d H:i:s');
        //             $product_images->image  = $filename;
        //             // $product_images->image_path   = $product_path;
        //             $product_images->image_path   = '';
        //             $product_images->created_by  = $user_id;
        //             $product_images->status  = 1;
        //             $product_images->product_id  = $product_id;
        //             $product_images->save();
        //         }
        //     }
        // }

        return redirect()->route('admin.product.list')->with('success_msg', 'Product Added successfully');
    }

    public  function delete()
    {
        $id = request()->input('product_id', 0);
        $product = Product::where('id', $id)->get()->first();
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::user()->id;
        $product->save();

        http_response_code(200);
        exit;
    }

    public  function preview()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function variant_lists()
    {
        // $img_url = Storage::url('public/HiwlV1w6y8VEPQgoNaawfzhXPgZ9boFOfEPyxeou.jpeg');
        // echo "<img src='$img_url'>";
        // exit;
        // // 
        $data  =  array();
        $data['product_list']  =  ProductVariant::with(['product'])->get();
        // dd($data);exit;
        return view('admin.product.product-variant-list', $data);
    }

    public  function variant_add()
    {
        $data  =  array();
        $data['product_list']  =  Product::where('status', 1)->get();
        return view('admin.product.product-variant-form', $data);
    }

    public function variant_insert()
    {
        $validated_request = request()->validate([
            'product_data' => 'required',
            'count' => 'required',
            'unit_type' => 'required',
            'price_per_pills' => 'required',
            'price'  =>  'required',
            'offer'  =>  'required',
            
        ]);

        $product = new ProductVariant;
        $product->product_id  = $validated_request['product_data'];
        $product->count  = $validated_request['count'];
        $product->unit_type  = $validated_request['unit_type'];
        $product->price_per_pills  = $validated_request['price_per_pills'];
        $product->price = $validated_request['price'];
        $product->offer = $validated_request['offer'];
        $product->created_at = date('Y-m-d H:i:s');
        $product->save();

        
        return redirect()->route('admin.product-variant.list')->with('success_msg', 'Product Added successfully');
    }

    public  function variant_edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['product_data'] = ProductVariant::where('id', $id)->get()->first();
        $data['product_list']  =  Product::where('status', 1)->get();
        return view('admin.product.product-variant-form', $data);
    }

    public  function variant_update()
    {
        $product_id  = request()->input('product_id', 0);
        $validated_request = request()->validate([
            'product_data' => 'required',
            'count' => 'required',
            'unit_type' => 'required',
            'price_per_pills' => 'required',
            'price'  =>  'required',
            'offer'  =>  'required',
            
        ]);

        $product = ProductVariant::where('id', $product_id)->get()->first();
       
        $product->product_id  = $validated_request['product_data'];
        $product->count  = $validated_request['count'];
        $product->unit_type  = $validated_request['unit_type'];
        $product->price_per_pills  = $validated_request['price_per_pills'];
        $product->price = $validated_request['price'];
        $product->offer = $validated_request['offer'];
        $product->created_at = date('Y-m-d H:i:s');
        $product->save();

        
        return redirect()->route('admin.product-variant.list')->with('success_msg', 'Product Variant Updated successfully');
    }

    public  function variant_delete()
    {
        $id = request()->input('product_id', 0);
        $product = ProductVariant::where('id', $id)->delete();

        http_response_code(200);
        exit;
    }
}
