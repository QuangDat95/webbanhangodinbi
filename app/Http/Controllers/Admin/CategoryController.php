<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
        // public function __construct() {
        //     $this->middleware('auth');
        // }
    
        public function index()
        {
            $categories = CategoryModel::paginate(10);
            return view('backend.category.index',compact('categories'));
        }
    
        public function store(CategoryRequest $request)
        {
            $category = new CategoryModel();
            $category->name = $request->name;
            $category->save();
            return redirect()->route('category.index')->with('flash_message','Thêm mới thành công!');
        }
    
        public function edit($id)
        {
            $category = CategoryModel::find($id);
            return view('backend.category.edit',compact('category'));
        }
    
        public function update(Request $request, $id)
        {
            $category = CategoryModel::find($id);
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('category.index')->with('flash_message','Cập nhật thành công!');
        }
        
        public function destroy($id)
        {
            $category = CategoryModel::find($id);
            $category->delete();
            return redirect()->route('category.index')->with('flash_message','Xóa thành công!');
        }
    
}