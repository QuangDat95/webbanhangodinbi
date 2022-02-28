<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feature;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(8);
        return view('dashboards.products.index',compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $features = Feature::all();
        return view('dashboards.products.create',compact('categories','features'));
    }

    public function store(ProductRequest $req)
    {
        // $data = $req->only('name','category_id');
        // ProductModel::create($data);
        $product = new Product();
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        if ($req->hasFile('image')) {
            $file = $req->image;
            $path = $file->store('image','public');
            $product->image = $path;
        }
        $product->description = $req->description;
        $product->save();
        $product->features()->attach( $req->features );
        return redirect()->route('product.index')->with('flash_message','Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $features = Feature::all();
        return view('dashboards.products.edit',compact('product','categories','features'));
    }

    public function update(Request $req, $id)
    {
        $product = Product::find($id);
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        if ($req->hasFile('image')) {
            $currentFile = $product->image;
            if ($currentFile) {
                Storage::delete('/public/' . $currentFile);
            }
            $file = $req->image;
            $path = $file->store('image', 'public');
            $product->image = $path;
        }
        $product->description = $req->description;
        $product->save();
        //xóa toàn bộ kết quả của sản phẩm đó ở bảng trung gian
        $product->features()->detach();
        //lưu dữ liệu vào bảng trung gian
        $product->features()->attach( $req->features );
        return redirect()->route('product.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('flash_message','Xóa thành công!');
    }
}
