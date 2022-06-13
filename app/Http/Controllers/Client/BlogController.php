<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        // $product = Product::all();
        // $category = Category::all();
        $post = Post::paginate(2);
        $recentPost = Post::all();
        return view('clients.blog',compact('post','recentPost'));
    }
    public function detail_blog($id, Request $request)
    {
        $post = Post::where('slug', $id)->with('comment')->first();
        $recentPost = Post::all();
        return view('clients.detail_blog', compact('post','recentPost'));
    }


    public function addPostComment(Request $request){
        $user_id = null;
        if(Auth::check()){
            $user_id = Auth::user()->id;
        }
        $model = new Post_Comment();
        $model->post_id = $request->id;
        $model->user_id = $user_id;
        // $model->fill($request->all());
        $model->content = $request->content;
        $model->save();
        return redirect()->back();
    }

}
