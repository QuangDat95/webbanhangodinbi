<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\OrderModel;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderModel::paginate(10);
        return view('backend.orders.index',compact('orders'));
    }

    public function store(OrderRequest $req)
    {
        $order = new OrderModel();
        $order->name = $req->name;
        $order->buy_date = $req->buy_date;
        $order->phone = $req->phone;
        $order->address = $req->address;
        $order->save();
        return redirect()->route('order.index')->with('flash_message','Lưu thành công!');
    }

    public function show($id)
    {
        $order = OrderModel::find($id);
        $items = DB::table('listorders')
            ->join('orders', 'listorders.order_id', '=', 'orders.id')
            ->join('products', 'listorders.product_id', '=', 'products.id')
            ->where('order_id', '=', $id)
            ->get();
        $amount = 0;
        $sum_price = 0;
        for ($i = 0; $i < count($items); $i++) {
            $amount += $items[$i]->amount;
            $sum_price += $items[$i]->price * $items[$i]->amount;
        }
        return view('backend.orders.show', compact('order', 'items','amount','sum_price'));
    }

    public function edit($id)
    {
        $order = OrderModel::find($id);
        return view('backend.orders.edit',compact('order'));
    }

    public function update(OrderRequest $req, $id)
    {
        $order = OrderModel::find($id);
        $order->name = $req->name;
        $order->buy_date = $req->buy_date;
        $order->address = $req->address;
        $order->phone = $req->phone;
        $order->save();
        return redirect()->route('order.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $order = OrderModel::find($id);
        $items = DB::table('listorders')
            ->join('orders', 'listorders.order_id', '=', 'orders.id')
            ->join('products', 'listorders.product_id', '=', 'products.id')
            ->where('order_id', '=', $id)
            ->get();
        if(count($items)>0){
            return redirect()->route('order.index')->with('flash_message','Khách vẫn còn đơn hàng');
        }else if(count($items) == 0){
        $order->delete();
            return redirect()->route('order.index')->with('flash_message','Xóa thành công');
        }
    }
}