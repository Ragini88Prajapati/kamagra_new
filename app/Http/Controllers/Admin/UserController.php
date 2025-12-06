<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use App\ContactUs;
use App\NewsLetter;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $user_list = User::where('status', 1);
        if (request()->input('search', '') != '') {
            $search = request()->input('search', '');
            $user_list->where('name', 'like', '%' . $search . '%');
        }

        $data['user_list'] = $user_list->latest()->paginate(15);
        // dd($data);
        return $this->_display('admin.user.user-list',$data);
    }

    public function delete(){
        $reqdata = request()->input();
        $get_id = $reqdata['id'];
        $user_data = User::where('id', $get_id)->where('status', 1)->first();
        // $thumbnail = $user_data->thumbnail;
        // if($thumbnail != ''){
        //     $destinationPath = public_path('/assets/client/img/category');
        //     @unlink($destinationPath.'/'.$thumbnail);
        // }
        User::where('id',$get_id)->delete();
    }
    public function loginReset(){
        $reqdata = request()->input();
        $get_id = $reqdata['id'];
        $user_data = UserLogin::where('user_id',$get_id)->update(['status'=> 2]);
        // $thumbnail = $user_data->thumbnail;
        // if($thumbnail != ''){
        //     $destinationPath = public_path('/assets/client/img/category');
        //     @unlink($destinationPath.'/'.$thumbnail);
        // }
        // User::where('id',$get_id)->delete();
    }

    public function adminContactUs(){
        $user_list = ContactUs::orderBy('id', 'desc');

        $data['user_list'] = $user_list->latest()->paginate(15);
        // dd($data);
        return $this->_display('admin.user.contact',$data);
    }

    public function adminNewsletter(){
        $user_list = NewsLetter::orderBy('id', 'desc');
        

        $data['user_list'] = $user_list->latest()->paginate(15);
        // dd($data);
        return $this->_display('admin.user.newsletter',$data);
    }

    public function _display($view, $data  = [])
    {
        return view($view, $data);
    }
}
