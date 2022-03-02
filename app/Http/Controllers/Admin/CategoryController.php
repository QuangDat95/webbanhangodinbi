<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
        public function index()
        {
            $categories = Category::paginate(10);
            return view('dashboards.categories.index',compact('categories'));
        }

        public function store(CategoryRequest $request)
        {
            $data = $request->all();
            $category = new Category($data);
            $category->save();
            return redirect()->route('category.index')->with('flash_message','Thêm mới thành công!');
        }

        public function edit($id)
        {
            $category = Category::find($id);
            return view('dashboards.categories.edit',compact('category'));
        }

        public function update(Request $request, $id)
        {
            $data = $request->all();
            $category = Category::find($id);
            $category->update($data);
            return redirect()->route('category.index')->with('flash_message','Cập nhật thành công!');
        }

        public function destroy($id)
        {
            $category = Category::find($id);
            $category->delete();
            return back()->with('flash_message','Xóa thành công!');
        }
}