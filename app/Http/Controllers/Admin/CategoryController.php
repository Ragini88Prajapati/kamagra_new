<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        
        $data  =  array();
        $data['category_list']  =  Category::get();

        return view('admin.categories.category-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        return view('admin.categories.category-form', $data);
    }

    public function insert(Request $request)
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:product,name',
            // 'price' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png|required',
            // 'product_image.*' => 'mimes:jpeg,jpg,png',
        ]);
    
        $category = new Category();
        $category->name = $validated_request['name'];
        // $category->price = $validated_request['price'];
        $category->created_at = date('Y-m-d H:i:s');
        $category->status = 1;
        $category->save();
    
        // $image_file = request()->file('image');
        // $image_name = $image_file->hashName();
        // $image_file->move(public_path('/assets/images/category'), $image_name);
    
        // $category_new = Category::where('status', 1)->where('id', $category->id)->first();
        // if ($category_new) {
        //     $category_new->image = $image_name;
        //     $category_new->save();
        // }
    
        return redirect()->route('admin.category.list')->with('success_msg', 'Category Added successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $data = ['category_data' => $category, 'action' => 'update'];
        return view('admin.categories.category-form', $data);
    }

    public function update(Request $request, $id)
    {
        $category_id  = request()->input('category_id', 0);
        $validated_request = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category_id . ',id',
            // 'price' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png',
            // 'product_image.*' => 'mimes:jpeg,jpg,png',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $validated_request['name'];
        // $category->price = $validated_request['price'];
        $category->updated_at = date('Y-m-d H:i:s');

        // if ($request->hasFile('image')) {
        //     $image_file = $request->file('image');
        //     $image_name = $image_file->hashName();
        //     $image_file->move(public_path('/assets/images/category'), $image_name);
        //     $category->image = $image_name;
        // }

        $category->save();

        return redirect()->route('admin.category.list')->with('success_msg', 'Category Updated successfully');
    }

    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->category_id);
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully']);
    }

    public  function preview()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public function showProducts($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->where('status', 1)->get();
        return view('category.products', compact('category', 'products'));
    }
}
