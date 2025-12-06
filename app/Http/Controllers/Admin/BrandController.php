<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        $data  =  array();
        $data['brand_list']  =  Brand::where('status', 1)->get();

        return view('admin.brand.brand-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        return view('admin.brand.brand-form', $data);
    }

    public  function insert()
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:brand,name'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $gender = new Brand;
        $gender->name  = $validated_request['name'];
        $gender->description  = request()->input('description');
        $gender->created_at = date('Y-m-d H:i:s');
        $gender->created_by = $user_id;
        $gender->status = 1;
        $gender->save();
        return redirect()->route('admin.brand.list')->with('success_msg', 'Brand Added successfully');
    }

    public  function edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['brand_data'] = Brand::where('id', $id)->where('status', 1)->get()->first();
        return view('admin.brand.brand-form', $data);
    }

    public  function update()
    {
        $brand_id  = request()->input('brand_id', 0);
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:brand,name,' . $brand_id . ',id'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $brand = Brand::where('status', 1)->where('id', $brand_id)->get()->first();
        $brand->name  = $validated_request['name'];
        $brand->description  = request()->input('description');
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = $user_id;
        $brand->status = 1;
        $brand->save();
        return redirect()->route('admin.brand.list')->with('success_msg', 'Brand Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('brand_id', 0);
        $brand = Brand::where('id', $id)->get()->first();
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::user()->id;
        $brand->save();

        http_response_code(200);
        exit;
    }

    public  function preview()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }
}
