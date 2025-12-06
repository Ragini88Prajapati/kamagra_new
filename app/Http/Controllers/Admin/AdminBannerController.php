<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminBannerModel;

class AdminBannerController extends Controller
{
    public function bannerList(){
        $data['banners']  =  AdminBannerModel::get();
        return view('admin.banner.banner-list', $data);
    }
    public function bannerAdd(){
        $data  =  array();
        return view('admin.banner.banner-form', $data);
    }
    public function store(Request $request){
        $validated_request = request()->validate([
            'image' => 'mimes:jpeg,jpg,png|required',
        ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/banner', $imagename);
        }else{
            $imagename = '';
        }
        $title= !empty(request()->input('title'))?request()->input('title'):'';
        $short_title=  !empty(request()->input('short_title'))?request()->input('short_title'):'';
        $url= !empty(request()->input('url'))?request()->input('url'):'';

        $saveData=  AdminBannerModel::insert([
            // 'profile_pic'=>$validator['profile_pic'],
            'image_name'=>$imagename,
            'title'=>$title,
            'short_title'=>$short_title,
            'url'=>$url,
            'created_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.banner.list')->with('success_msg', 'Product Added successfully');
    }
    public function bannerEdit(Request $request){
        $data['product_data']  =  AdminBannerModel::where('id',request()->input('id'))->first();
        $data['action']  ='update';
        return view('admin.banner.banner-form', $data);
    }
    public function update(Request $request){
        // $validated_request = request()->validate([
        //     'image' => 'mimes:jpeg,jpg,png|required',
        // ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/banner', $imagename);
            $saveData=  AdminBannerModel::where('id',request()->input('product_id'))->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image_name'=>$imagename,
            ]);
        }
        $title= !empty(request()->input('title'))?request()->input('title'):'';
        $short_title=  !empty(request()->input('short_title'))?request()->input('short_title'):'';
        $url= !empty(request()->input('url'))?request()->input('url'):'';

        $saveData=  AdminBannerModel::where('id',request()->input('product_id'))->update([
            // 'profile_pic'=>$validator['profile_pic'],
            // 'image_name'=>$imagename,
            'title'=>$title,
            'short_title'=>$short_title,
            'url'=>$url,
            'created_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.banner.list')->with('success_msg', 'Product Added successfully');
    }
    public  function delete()
    {
        $id = request()->input('product_id', 0);
        $product = AdminBannerModel::where('id', $id)->delete();
        // $product->status = 2;
        // $product->updated_at = date('Y-m-d H:i:s');
        // $product->updated_by = Auth::user()->id;
        // $product->save();

        http_response_code(200);
        exit;
    }
}
