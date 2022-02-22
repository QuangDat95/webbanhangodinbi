<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::paginate(10);
        return view('backend.product.index',compact('products'));
    }
    public function create()
    {
        $categories = CategoryModel::all();
        return view('backend.product.create',compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = new ProductModel();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = $file->store('image','public');
            $product->image = $path;
        }
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.index')->with('flash_message','Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        return view('backend.product.edit',compact('product','categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = ProductModel::find($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        if ($request->hasFile('image')) {
            $currentFile = $product->image;
            if ($currentFile) {
                Storage::delete('/public/' . $currentFile);
            }
            $file = $request->image;
            $path = $file->store('image', 'public');
            $product->image = $path;
        }
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('product.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = ProductModel::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('flash_message','Xóa thành công!');
    }
}
