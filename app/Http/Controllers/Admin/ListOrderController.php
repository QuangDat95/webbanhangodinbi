<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListOrder;

class ListOrderController extends Controller
{
    public function index()
    {
        $lists = ListOrder::paginate(10);
        return view('dashboards.listorders.index',compact('lists'));
    }

    public function edit($id)
    {
        $list = ListOrder::find($id);
        return view('dashboards.listorders.edit',compact('list'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('amount');
        ListOrder::find($id)->update($data);
        return redirect()->route('listorder.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $list = ListOrder::find($id)->delete();
        return back()->with('flash_message','Xóa thành công');
    }
}