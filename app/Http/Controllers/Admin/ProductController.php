<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add()
    {
        $product = Product::with('brand')->get();
        $brand = Brand::all();
        $product = Product::with('category')->get();
        $category = Category::all();
        return view('admin.product.add-product', ['brand' => $brand, 'category' => $category, 'product' => $product]);
    }

    public function saveAdd(Request $request)
    {
        $model = new Product();
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect(route('product.index'));
    }

    public function edit($id)
    {
        $Product = Product::find($id);
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.edit-product', ['Product' => $Product ,'category' => $category, 'brand' => $brand]);
    }

    public function update($id, Request $request){
        $model = Product::find($id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect(route('product.index'));
    }

    public function remove($id)
    {
        Product::destroy($id);
        return redirect(route('product.index'));
    }
}