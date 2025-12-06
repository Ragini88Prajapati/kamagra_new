<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        $data  =  array();
        $data['product_type_list']  =  ProductType::where('status', 1)->get();

        return view('admin.product_type.product_type-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        return view('admin.product_type.product_type-form', $data);
    }

    public  function insert()
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:product_type,name'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $product_type = new ProductType;
        $product_type->name  = $validated_request['name'];
        $product_type->description  = request()->input('description');
        $product_type->created_at = date('Y-m-d H:i:s');
        $product_type->created_by = $user_id;
        $product_type->status = 1;
        $product_type->save();
        return redirect()->route('admin.product_type.list')->with('success_msg', 'Product Type Added successfully');
    }

    public  function edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['product_type_data'] = ProductType::where('id', $id)->where('status', 1)->get()->first();
        return view('admin.product_type.product_type-form', $data);
    }

    public  function update()
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:product_type,name'
        ]);
        $product_type_id  = request()->input('product_type_id', 0);
        $user_id = Auth::guard('admin')->user()->id;
        $product_type = ProductType::where('status', 1)->where('id', $product_type_id)->get()->first();
        $product_type->name  = $validated_request['name'];
        $product_type->description  = request()->input('description');
        $product_type->updated_at = date('Y-m-d H:i:s');
        $product_type->updated_by = $user_id;
        $product_type->status = 1;
        $product_type->save();
        return redirect()->route('admin.product_type.list')->with('success_msg', 'Gender Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('product_type_id', 0);
        $product_type = ProductType::where('id', $id)->get()->first();
        $product_type->status = 2;
        $product_type->updated_at = date('Y-m-d H:i:s');
        $product_type->updated_by = Auth::user()->id;
        $product_type->save();

        http_response_code(200);
        exit;
    }

    public  function preview()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }
}
