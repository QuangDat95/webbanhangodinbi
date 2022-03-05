<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('dashboards.customers.index',compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $items = $customer->list;
        $amount = 0;
        $sum_price = 0;
        for ($i = 0; $i < count($items); $i++) {
            $amount += $items[$i]->amount;
            $sum_price += $items[$i]->product->price * $items[$i]->amount;
        }
        return view('dashboards.customers.show', compact('customer', 'items','amount','sum_price'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('dashboards.customers.edit',compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $data = $request->all();
        Customer::find($id)->update($data);
        return redirect()->route('customer.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $items = Customer::find($id)->list;
        if(count($items)>0){
            return redirect()->route('customer.index')->with('flash_message','Khách vẫn còn đơn hàng');
        }else if(count($items) == 0){
            Customer::find($id)->delete();
            return back()->with('flash_message','Xóa thành công');
        }
    }
}
