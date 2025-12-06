<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenderController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        $data  =  array();
        $data['gender_list']  =  Gender::where('status', 1)->get();

        return view('admin.gender.gender-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        return view('admin.gender.gender-form', $data);
    }

    public  function insert()
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:gender,name'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $gender = new Gender;
        $gender->name  = $validated_request['name'];
        $gender->description  = request()->input('description');
        $gender->created_at = date('Y-m-d H:i:s');
        $gender->created_by = $user_id;
        $gender->status = 1;
        $gender->save();
        return redirect()->route('admin.gender.list')->with('success_msg', 'Gender Added successfully');
    }

    public  function edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['gender_data'] = Gender::where('id', $id)->where('status', 1)->get()->first();
        return view('admin.gender.gender-form', $data);
    }

    public  function update()
    {
        $gender_id  = request()->input('gender_id', 0);
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:gender,name,' . $gender_id . ',id'
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $gender = Gender::where('status', 1)->where('id', $gender_id)->get()->first();
        $gender->name  = $validated_request['name'];
        $gender->description  = request()->input('description');
        $gender->updated_at = date('Y-m-d H:i:s');
        $gender->updated_by = $user_id;
        $gender->status = 1;
        $gender->save();
        return redirect()->route('admin.gender.list')->with('success_msg', 'Gender Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('gender_id', 0);
        $youtube_link = Gender::where('id', $id)->get()->first();
        $youtube_link->status = 2;
        $youtube_link->updated_at = date('Y-m-d H:i:s');
        $youtube_link->updated_by = Auth::user()->id;
        $youtube_link->save();

        http_response_code(200);
        exit;
    }

    public  function preview()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }
}
