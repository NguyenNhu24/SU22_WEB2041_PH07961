<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\Admin\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.category.add-cate');
    }

    public function saveAdd(CategoryRequest $request)
    {
        $data =  $request->except('_token');
        $result = Category::create($data);
        session()->flash('message', 'Thêm thành công !');
        return redirect(route('category.index'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', ['Category' => $category]);
    }
    public function update(Request $request, Category $Category)
    {
        $data = $request->except('_token');
        $Category->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect(route('category.index'));
    }
    public function remove($id)
    {
        If(!isset($_POST['categories']));
        Category::destroy($id);
        session()->flash('message', 'Xóa thành công !');
        $categories = Product::query()->where('cate_id', $id)->delete();
        return redirect(route('category.index'));

    }
}
