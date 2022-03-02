<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('dashboards.orders.index',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $items = $order->list;
        $amount = 0;
        $sum_price = 0;
        for ($i = 0; $i < count($items); $i++) {
            $amount += $items[$i]->amount;
            $sum_price += $items[$i]->price * $items[$i]->amount;
        }
        return view('dashboards.orders.show', compact('order', 'items','amount','sum_price'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('dashboards.orders.edit',compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        $data = $request->all();
        Order::find($id)->update($data);
        return redirect()->route('order.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $items = $order->list;
        if(count($items)>0){
            return redirect()->route('order.index')->with('flash_message','Khách vẫn còn đơn hàng');
        }else if(count($items) == 0){
            Order::find($id)->delete();
            return back()->with('flash_message','Xóa thành công');
        }
    }
}