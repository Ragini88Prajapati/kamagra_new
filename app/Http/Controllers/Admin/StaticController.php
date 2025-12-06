<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StaticModel;
use App\StaticContent;

class StaticController extends Controller
{
    public function staticView(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticModel::where('id',1)->first();
        return view('admin.static-form',$data);
    }

    public function update(Request $request){
        if($request->hasFile('image1')) {
            $file = $request->file('image1');
            $image1 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $image1);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image1'=>$image1,
            ]);
        }else{
            $image1 = '';
        }

        if($request->hasFile('image2')) {
            $file = $request->file('image2');
            $image2 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $image2);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image2'=>$image2,
            ]);
        }else{
            $image2 = '';
        }

        if($request->hasFile('image3')) {
            $file = $request->file('image3');
            $image3 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $image3);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image3'=>$image3,
            ]);
        }else{
            $image3 = '';
        }

        if($request->hasFile('ad_image1')) {
            $file = $request->file('ad_image1');
            $ad_image1 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $ad_image1);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'ad_image1'=>$ad_image1,
            ]);
        }else{
            $ad_image1 = '';
        }

        if($request->hasFile('ad_image2')) {
            $file = $request->file('ad_image2');
            $ad_image2 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $ad_image2);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'ad_image2'=>$ad_image2,
            ]);
        }else{
            $ad_image2 = '';
        }

        if($request->hasFile('ad_image3')) {
            $file = $request->file('ad_image3');
            $ad_image3 = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/static', $ad_image3);
            $saveData=  StaticModel::where('id',1)->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'ad_image3'=>$ad_image3,
            ]);
        }else{
            $ad_image3 = '';
        }
        
        $staticData=StaticModel::where('id',1)->first();
        if($staticData){
            $staticData->title1=request()->input('title1');
            $staticData->title2=request()->input('title2');
            $staticData->title3=request()->input('title3');
            $staticData->short_description1=request()->input('short_description1');
            $staticData->short_description2=request()->input('short_description2');
            $staticData->short_description3=request()->input('short_description3');
        }else{
            $staticData=new StaticModel();
            $staticData->image1=$image1;
            $staticData->image2=$image2;
            $staticData->image3=$image3;
            $staticData->ad_image1=$ad_image1;
            $staticData->ad_image2=$ad_image2;
            $staticData->ad_image3=$ad_image3;
            $staticData->title1=request()->input('title1');
            $staticData->title2=request()->input('title2');
            $staticData->title3=request()->input('title3');
            $staticData->short_description1=request()->input('short_description1');
            $staticData->short_description2=request()->input('short_description2');
            $staticData->short_description3=request()->input('short_description3');
        }
        $staticData->save();

        return redirect(route('admin.static.view'))->with('success_msg', 'Blog Updated successfully');
    }
    
    public function aboutUs(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','about_us')->first();
        // dd($data);
        return view('admin.aboutus',$data);
    }
    public function updateaboutUs(Request $request){
        // dd($request -> all());
        $res=StaticContent::where('title','about_us')->update([
            'description'=>request()->input('description'),
            'meta_title'=>request()->input('meta_title'),
            'meta_description'=>request()->input('meta_description'),
            'meta_keyword'=>request()->input('meta_keyword'),
            'meta_robot'=>request()->input('meta_robot'),
            'canonical_url'=>request()->input('canonical_url'),
            'og_type'=>request()->input('og_type'),
            'og_title'=>request()->input('og_title'),
            'og_description'=>request()->input('og_description'),
            'og_url'=>request()->input('og_url'),
            'og_site_name'=>request()->input('og_site_name'),
            'twitter_title'=>request()->input('twitter_title'),
            'twitter_description'=>request()->input('twitter_description'),
            'twitter_card'=>request()->input('twitter_card'),
            'twitter_site'=>request()->input('twitter_site')
        ]);
        if($res){
            return redirect(route('admin.static.about-us'))->with('success_msg', 'About us Updated successfully');
        }else{
            return redirect(route('admin.static.about-us'))->with('error_msg', 'About us not Updated');
        }
    }
    
    public function homeSEO(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','home')->first();
        // dd($data);
        return view('admin.home_seo',$data);
    }
    public function updatehomeSEO(Request $request){
        // dd($request -> all());
        $res=StaticContent::where('title','home')->update([ 
            'meta_title'=>request()->input('meta_title'),
            'meta_description'=>request()->input('meta_description'),
            'meta_keyword'=>request()->input('meta_keyword'),
            'meta_robot'=>request()->input('meta_robot'),
            'canonical_url'=>request()->input('canonical_url'),
            'og_type'=>request()->input('og_type'),
            'og_title'=>request()->input('og_title'),
            'og_description'=>request()->input('og_description'),
            'og_url'=>request()->input('og_url'),
            'og_site_name'=>request()->input('og_site_name'),
            'twitter_title'=>request()->input('twitter_title'),
            'twitter_description'=>request()->input('twitter_description'),
            'twitter_card'=>request()->input('twitter_card'),
            'twitter_site'=>request()->input('twitter_site')
        ]);
        if($res){
            return redirect(route('admin.static.home-seo'))->with('success_msg', 'Home Page SEO Updated successfully');
        }else{
            return redirect(route('admin.static.home-seo'))->with('error_msg', 'Home Page SEO not Updated');
        }
    }

    public function service1(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','service_1')->first();
        // dd($data);
        return view('admin.service_1',$data);
    }
    public function updateservice1(Request $request){
        $res=StaticContent::where('title','service_1')->update([
            'description'=>request()->input('description')
        ]);
        if($res){
            return redirect(route('admin.static.free-shipping'))->with('success_msg', 'Free Shipping Updated successfully');
        }else{
            return redirect(route('admin.static.free-shipping'))->with('error_msg', 'Free Shipping not Updated');
        }
    }

    public function satisfaction(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','service_2')->first();
        // dd($data);
        return view('admin.service_2',$data);
    }
    public function updatesatisfaction(Request $request){
        $res=StaticContent::where('title','service_2')->update([
            'description'=>request()->input('description')
        ]);
        if($res){
            return redirect(route('admin.static.satisfaction'))->with('success_msg', 'Free Shipping Updated successfully');
        }else{
            return redirect(route('admin.static.satisfaction'))->with('error_msg', 'Free Shipping not Updated');
        }
    }

    public function shipping(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','service_3')->first();
        // dd($data);
        return view('admin.service_3',$data);
    }
    public function updateshipping(Request $request){
        $res=StaticContent::where('title','service_3')->update([
            'description'=>request()->input('description')
        ]);
        if($res){
            return redirect(route('admin.static.shipping'))->with('success_msg', 'Shipping Information Updated successfully');
        }else{
            return redirect(route('admin.static.shipping'))->with('error_msg', 'Shipping Information not Updated');
        }
    }

    public function glossary(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','kamagra_glossary')->first();
        // dd($data);
        return view('admin.kamagra_glossary',$data);
    }
    public function updateglossary(Request $request){
        $res=StaticContent::where('title','kamagra_glossary')->update([
            'description'=>request()->input('description')
        ]);
        if($res){
            return redirect(route('admin.static.glossary'))->with('success_msg', 'Kamagra Glossary Updated successfully');
        }else{
            return redirect(route('admin.static.glossary'))->with('error_msg', 'Kamagra Glossary not Updated');
        }
    }
    
    public function sexual(){
        $data=[];
        $data['action']  ='update';
        $data['static']=StaticContent::where('title','sexual_enhancer')->first();
        // dd($data);
        return view('admin.sexual_enhancer',$data);
    }
    public function updatesexual(Request $request){
        $res=StaticContent::where('title','sexual_enhancer')->update([
            'description'=>request()->input('description')
        ]);
        if($res){
            return redirect(route('admin.static.sexual'))->with('success_msg', 'Sexual Enhancer Updated successfully');
        }else{
            return redirect(route('admin.static.sexual'))->with('error_msg', 'Sexual Enhancer not Updated');
        }
    }
}
