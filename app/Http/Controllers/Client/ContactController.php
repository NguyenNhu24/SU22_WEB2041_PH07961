<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // $product = Product::all();
        // $category = Category::all();
        // $post = Post::all();
        return view('clients.contact');
    }
}
