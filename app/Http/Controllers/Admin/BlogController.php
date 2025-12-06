<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogModel;
use App\BlogReview;

class BlogController extends Controller
{
    public function getValidatedPermalink($permalink){ // v2
        $permalink = trim($permalink, '()');
        $replace_keywords = array("-:-", "-:", ":-", " : ", " :", ": ", ":",
            "-@-", "-@", "@-", " @ ", " @", "@ ", "@", 
            "-.-", "-.", ".-", " . ", " .", ". ", ".", 
            "-\\-", "-\\", "\\-", " \\ ", " \\", "\\ ", "\\",
            "-/-", "-/", "/-", " / ", " /", "/ ", "/", 
            "-&-", "-&", "&-", " & ", " &", "& ", "&", 
            "-,-", "-,", ",-", " , ", " ,", ", ", ",", 
            " ",
            "---", "--", " - ", " -", "- ",
            "-#-", "-#", "#-", " # ", " #", "# ", "#",
            "-$-", "-$", "$-", " $ ", " $", "$ ", "$",
            "-%-", "-%", "%-", " % ", " %", "% ", "%",
            "-^-", "-^", "^-", " ^ ", " ^", "^ ", "^",
            "-*-", "-*", "*-", " * ", " *", "* ", "*",
            "-(-", "-(", "(-", " ( ", " (", "( ", "(",
            "-)-", "-)", ")-", " ) ", " )", ") ", ")",
            "-;-", "-;", ";-", " ; ", " ;", "; ", ";",
            "-'-", "-'", "'-", " ' ", " '", "' ", "'",
            "-?-", "-?", "?-", " ? ", " ?", "? ", "?",
            "-+-", "-+", "+-", " + ", " +", "+ ", "+",
            "-!-", "-!", "!-", " ! ", " !", "! ", "!");
        $escapedPermalink = str_replace($replace_keywords, '-', $permalink); 
        return strtolower($escapedPermalink);
    }

    public function lists(){
        $data=[];
        $data['blogs']=BlogModel::get();
        return view('admin.blog-list',$data);
    }
    public function add(){
        return view('admin.blog-form');
    }

    public function insert(Request $request){
        $validated_request = request()->validate([
            'image' => 'mimes:jpeg,jpg,png|required',
            'title' => 'required',
            'date' => 'required',
            'short_description' => 'required|string|max:190',
            'description' => 'required',
        ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/blogs', $imagename);
        }else{
            $imagename = '';
        }
        $title= !empty(request()->input('title'))?request()->input('title'):'';
        $date=  !empty(request()->input('date'))?request()->input('date'):'';
        $short_description= !empty(request()->input('short_description'))?request()->input('short_description'):'';
        $description= !empty(request()->input('description'))?request()->input('description'):'';

        $saveData=  BlogModel::insert([
            // 'profile_pic'=>$validator['profile_pic'],
            'image_name'=>$imagename,
            'title'=>$title,
            'date'=>$date,
            'short_description'=>$short_description,
            'description'=>$description,
            'url'=>$this->getValidatedPermalink($title),
            'created_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.blog.list')->with('success_msg', 'Blog Added successfully');
    }

    public function edit(){
        $data['blogs']=BlogModel::where('id',request()->input('id'))->first();
        $data['action']  ='update';
        return view('admin.blog-form', $data);
    }
    public function update(Request $request){
        $validated_request = request()->validate([
            'title' => 'required',
            'date' => 'required',
            'short_description' => 'required|string|max:190',
            'description' => 'required',
        ]);

        
        // echo public_path().'/assets/images/banner';exit;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $imagename = rand(100000000,999999999).time().$file->getClientOriginalName();
            $file->move(public_path().'/assets/images/blogs', $imagename);
            $saveData=  BlogModel::where('id',request()->input('product_id'))->update([
                // 'profile_pic'=>$validator['profile_pic'],
                'image_name'=>$imagename,
            ]);
        }else{
            $imagename = '';
        }
        $title= !empty(request()->input('title'))?request()->input('title'):'';
        $date=  !empty(request()->input('date'))?request()->input('date'):'';
        $short_description= !empty(request()->input('short_description'))?request()->input('short_description'):'';
        $description= !empty(request()->input('description'))?request()->input('description'):'';

        $saveData=  BlogModel::where('id',request()->input('product_id'))->update([
            // 'profile_pic'=>$validator['profile_pic'],
            'title'=>$title,
            'date'=>$date,
            'short_description'=>$short_description,
            'description'=>$description,
            'url'=>$this->getValidatedPermalink($title),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);


        return redirect()->route('admin.blog.list')->with('success_msg', 'Blog Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('product_id', 0);
        $product = BlogModel::where('id', $id)->delete();
        http_response_code(200);
        exit;
    }

    public function reviewList(){
        $data['reviews']=BlogReview::get();
        return view('admin.blog-review',$data);
    }

    public  function reviewDelete()
    {
        $id = request()->input('product_id', 0);
        $product = BlogReview::where('id', $id)->delete();
        http_response_code(200);
        exit;
    }
}
