<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $post = Post::all();
        return view('admin.post.index', compact('post'));
    }
    public function add()
    {
        return view('admin.post.add-post');
    }
    public function saveAdd(Request $request)
    {
        $model = new Post();
        $model->name = $request->name;
        $model->content = $request->content;
        $model->date = $request->date;
        $model->slug = $request->slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect(route('post.index'));
    }

 public function edit($id)
    {
        $Post = Post::find($id);
        return view('admin.post.edit', ['Post' => $Post]);
    }

    public function update($id, Request $request){
        $model = Post::find($id);
        $model->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect(route('post.index'));
    }

    public function remove($id)
    {
        Post::destroy($id);
        return redirect(route('post.index'));
    }
}
