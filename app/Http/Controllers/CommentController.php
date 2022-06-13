<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
  public function index(Request $request)
    {
        $comment = Comment::all();
        return view('admin.comment.porduct_comment', compact('comment'));
    }

    public function remove($id)
    {
        Comment::destroy($id);
        return redirect(route('comment.index'));
    }

}
