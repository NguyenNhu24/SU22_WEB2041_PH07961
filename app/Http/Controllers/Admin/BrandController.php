<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function add()
    {
        return view('admin.brand.add');
    }

    public function saveAdd(Request $request)
    {
        $model = new Brand();
        $model->name = $request->name;
        $model->slug = $request->slug;
        $model->save();
        return redirect(route('brand.index'));
    }

    public function remove($id)
    {
        Brand::destroy($id);
        return redirect(route('brand.index'));
    }

      public function edit(brand $brand)
    {
        return view('admin.brand.edit', ['brand' => $brand]);
    }
    public function update(Request $request, brand $brand)
    {
        $data = $request->except('_token');
        $brand->update($data);
        session()->flash('message', 'Sửa thành công !');
        return redirect(route('brand.index'));
    }
}
