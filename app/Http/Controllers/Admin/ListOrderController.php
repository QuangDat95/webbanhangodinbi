<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListOrderModel;
use App\Models\OrderModel;
use App\Models\ProductModel;

class ListOrderController extends Controller
{
    public function index()
    {
        $lists = ListOrderModel::paginate(10);
        return view('backend.listorders.index',compact('lists'));
    }

    public function edit($id)
    {
        $list = ListOrderModel::find($id);
        return view('backend.listorders.edit',compact('list'));
    }

    public function update(Request $req, $id)
    {
        $list = ListOrderModel::find($id);
        $list->amount = $request->amount;
        $list->save();
        return redirect()->route('listorder.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $list = ListOrderModel::find($id);
        $list->delete();
        return redirect()->route('listorder.index')->with('flash_message','Xóa thành công');
    }
}