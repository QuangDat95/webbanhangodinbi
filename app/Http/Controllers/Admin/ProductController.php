<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\FeatureModel;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::orderBy('id','desc')->paginate(8);
        return view('backend.product.index',compact('products'));
    }
    public function create()
    {
        $categories = CategoryModel::all();
        $features = FeatureModel::all();
        return view('backend.product.create',compact('categories','features'));
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
        $product->features()->attach( $request->features );
        return redirect()->route('product.index')->with('flash_message','Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = ProductModel::find($id);
        $categories = CategoryModel::all();
        $features = FeatureModel::all();
        return view('backend.product.edit',compact('product','categories','features'));
    }

    public function update(Request $request, $id)
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
        //xóa toàn bộ kết quả của sản phẩm đó ở bảng trung gian
        $product->features()->detach();
        //lưu dữ liệu vào bảng trung gian
        $product->features()->attach( $request->features );
        return redirect()->route('product.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = ProductModel::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('flash_message','Xóa thành công!');
    }
}
