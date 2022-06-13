<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_Comment;

class PostCommentController extends Controller
{
    public function index(Request $request)
    {
        $comment = Post_Comment::all();
        return view('admin.comment.blog_comment', compact('comment'));
    }

    public function remove($id)
    {
        Post_Comment::destroy($id);
        return redirect(route('commentblog.index'));
    }
}
