<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonials;

class TestimonialController extends Controller
{
    public function lists(){
        $data=[];
        $data['blogs']=Testimonials::get();
        return view('admin.testimonial-list',$data);
    }
    public function add(){
        return view('admin.testimonial-form');
    }

    public function insert(Request $request){
        $validated_request = request()->validate([
            'image' => 'mimes:jpeg,jpg,png|required',
            'short_description' => 'required|string|max:190',
            'name' => 'required|string|max:190',
        ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/blogs', $imagename);
        }else{
            $imagename = '';
        }
        $short_description= !empty(request()->input('short_description'))?request()->input('short_description'):'';
        $name= !empty(request()->input('name'))?request()->input('name'):'';

        $saveData=  Testimonials::insert([
            // 'profile_pic'=>$validator['profile_pic'],
            'image_name'=>$imagename,
            'short_description'=>$short_description,
            'name'=>$name,
            'created_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.testimonial.list')->with('success_msg', 'Blog Added successfully');
    }

    public function edit(){
        $data['blogs']=Testimonials::where('id',request()->input('id'))->first();
        $data['action']  ='update';
        return view('admin.testimonial-form', $data);
    }
    public function update(Request $request){
        $validated_request = request()->validate([
            'short_description' => 'required|string|max:190',
            'name' => 'required|string|max:190',
        ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/blogs', $imagename);
            $saveData=  Testimonials::where('id',request()->input('product_id'))->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image_name'=>$imagename,
            ]);
        }else{
            $imagename = '';
        }
        
        $short_description= !empty(request()->input('short_description'))?request()->input('short_description'):'';
        $name= !empty(request()->input('name'))?request()->input('name'):'';

        $saveData=  Testimonials::where('id',request()->input('product_id'))->update([
            // 'profile_pic'=>$validator['profile_pic'],
            'short_description'=>$short_description,
            'name'=>$name,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.testimonial.list')->with('success_msg', 'Blog Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('product_id', 0);
        $product = Testimonials::where('id', $id)->delete();
        http_response_code(200);
        exit;
    }
}
