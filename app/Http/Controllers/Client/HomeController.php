<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::with('product')->paginate(8);
        $product = Product::paginate(6);
        $post = Post::paginate(3);
        return view('clients.index', compact('product','category','post'));
    }
}
