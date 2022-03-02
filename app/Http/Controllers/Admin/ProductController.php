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
        $products = Product::orderBy('id','desc')->paginate(5);
        return view('dashboards.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $features = Feature::all();
        return view('dashboards.products.create',compact('categories','features'));
    }
    
    public function store(ProductRequest $request)
    {
        $data = $request->only('name','category_id','price','description');
        $product = new Product($data);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $path = saveImage($file);
            $product->image = $path;
        }
        $product->save();
        $product->features()->attach( $request->features );
        return redirect()->route('product.index')->with('flash_message','Thêm mới thành công!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $features = Feature::all();
        return view('dashboards.products.edit',compact('product','categories','features'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only('name','category_id','price','description');
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $currentFile = $product->image;
            deleteImage($currentFile);
            $file = $request->image;
            $path = $file->store('image', 'public');
            $product->image = $path;
        }
        $product->update($data);
        $product->features()->detach();
        $product->features()->attach( $request->features );
        return redirect()->route('product.index')->with('flash_message','Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('flash_message','Xóa thành công!');
    }
}
