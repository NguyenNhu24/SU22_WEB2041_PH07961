<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\Redirect;
use RealRashid\SweetAlert\Facades\Aler;

class ShopController extends Controller
{
    public function index(Request $request)
    {   
        $keyword = $request->has('keyword') ? $request->keyword : "";
        $brand = $request->has('brand') ? $request->brand : "";
        $category = $request->has('category') ? $request->category : "";
        $query = Product::where('name', 'like', "%$keyword%");

        $query->where('brand_id', $brand)->orWhere('cate_id', $category);
        $product = $query->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('clients.shop' , compact('product', 'category', 'brand','query'));
    }
    
    public function detail_product(Request $request, $id){
        $product = Product::where('slug', $id)->with('brand','category','comment')->first();
        return view('clients.detail_product', compact('product'));
    }

    public function addComment(Request $request){
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        $model = new Comment();
        $model->product_id = $request->id;
        $model->user_id = $user_id;
        // $model->fill($request->all());
        $model->content = $request->content;
        $model->save();
        return redirect()->back();
    }

        public function addCart(Request $request){
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $model = new Cart();
        $model->product_id = $product_id;
        $model->quantity = $quantity;
        $model->user_id = $user_id;
        // $model->fill($request->all());
        $model->total_price = $request->price;
        $model->status = $request->status;
        $model->save();
        if ($model) {
        alert()->success('Post Created', 'Successfully'); // hoặc có thể dùng alert('Post Created','Successfully', 'success');
        }
        return redirect()->back();
    }
}
