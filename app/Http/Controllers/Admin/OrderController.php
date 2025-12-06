<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use App\Models\Admin\DeliveryStatus;
use App\Models\Admin\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Config;

class OrderController extends Controller
{
    public function index()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public  function lists()
    {
        $data  =  array();
        $data['order_list']  =  Order::with(['user'])->where('status', 1)->orderBy('id', 'DESC')->get();
        $data['order_status_list'] = Config::get('constants.order_status');
        return view('admin.order.order-list', $data);
    }

    public  function add()
    {
        $data  =  array();
        return view('admin.gender.gender-form', $data);
    }

    public  function insert()
    {
    }

    public  function edit()
    {
    }

    public  function update()
    {
    }

    public  function delete()
    {
        $data  =  array();
        return view('admin.dashboard', $data);
    }

    public function preview()
    {
        $data  =  array();
        $id = request()->input('id', '');
        if ($id == '') {
            return redirect()->route('admin.order.list');
        }

        $user_id = Auth::user()->id;
        $data['order_data'] = Order::where('id', $id)->with(['order_product.product', 'user', 'state'])->get()->first();
        $data['delivery_data'] = DeliveryStatus::where('status', 1)->get();
        // dd($data);
        return view('admin.order.order-preview', $data);
    }

    public function save_order_status()
    {
        $delivery_status = request()->input('delivery_status', '');
        $order_product = request()->input('order_product', '');
        if ($delivery_status == '' && $order_product == '') {
            http_response_code(400);
            exit;
        }

        $order_product = OrderProduct::where('id', $order_product)->where('status', 1)->get()->first();;
        $order_product->delivery_status_id = $delivery_status;
        $order_product->delivery_status_update_at = date('Y-m-d H:i:s');
        $order_product->save();

        http_response_code(200);
        exit;
    }

    public function order_invoice()
    {
        $data  =  array();
        $id = request()->input('id', '');
        if ($id == '') {
            return redirect()->route('admin.order.list');
        }

        $user_id = Auth::user()->id;
        $data['order_data'] = Order::where('id', $id)->with(['order_product.product', 'user', 'state'])->get()->first();
        $delivery_data = DeliveryStatus::where('status', 1)->get()->toArray();
        if (isset($delivery_data) && is_array($delivery_data) && count($delivery_data) > 0) {
            foreach ($delivery_data as $key => $value) {
                $data['delivery_data'][$value['id']]   = $value['name'];
            }
        };
        return view('admin.order.order-invoice', $data);
    }
}
