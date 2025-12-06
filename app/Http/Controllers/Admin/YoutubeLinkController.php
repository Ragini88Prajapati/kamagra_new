<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\YoutubeLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YoutubeLinkController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        $data  =  array();
        $data['youtube_link_list']  =  YoutubeLink::where('status', 1)->get();
        return view('admin.youtube_link.youtube_link-list', $data);
    }

    public function add()
    {
        $data  =  array();
        return view('admin.youtube_link.youtube_link-form', $data);
    }

    public  function insert()
    {
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:youtube_link,name',
            'youtube_link' => 'required|string|max:255|unique:youtube_link,youtube_link',
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $youtube_link = new YoutubeLink;
        $youtube_link->name  = $validated_request['name'];
        $youtube_link->youtube_link  = $validated_request['youtube_link'];
        $youtube_link->description  = request()->input('description');
        $youtube_link->created_at = date('Y-m-d H:i:s');
        $youtube_link->created_by = $user_id;
        $youtube_link->status = 1;
        $youtube_link->save();
        return redirect()->route('admin.youtube_link.list')->with('success_msg', 'Youtube Link Added successfully');
    }

    public function edit()
    {
        $id = request()->input('id');
        $data  =  array();
        $data['action'] = 'update';
        $data['youtube_link_data'] = YoutubeLink::where('id', $id)->where('status', 1)->get()->first();
        return view('admin.youtube_link.youtube_link-form', $data);
    }

    public  function update()
    {
        $youtube_link_id  = request()->input('youtube_link_id', 0);
        $validated_request = request()->validate([
            'name' => 'required|string|max:255|unique:youtube_link,name,' . $youtube_link_id . ',id',
            'youtube_link' => 'required|string|max:255|unique:youtube_link,youtube_link,' . $youtube_link_id,
        ]);
        $user_id = Auth::guard('admin')->user()->id;
        $youtube_link = YoutubeLink::where('status', 1)->where('id', $youtube_link_id)->get()->first();
        $youtube_link->name  = $validated_request['name'];
        $youtube_link->youtube_link  = $validated_request['youtube_link'];
        $youtube_link->description  = request()->input('description');
        $youtube_link->updated_at = date('Y-m-d H:i:s');
        $youtube_link->updated_by = $user_id;
        $youtube_link->status = 1;
        $youtube_link->save();
        return redirect()->route('admin.youtube_link.list')->with('success_msg', 'Youtube link Updated successfully');
    }

    public  function delete()
    {
        $id = request()->input('youtube_link_id', 0);
        $youtube_link = YoutubeLink::where('id', $id)->get()->first();
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
