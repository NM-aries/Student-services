<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('admin.post.index' , compact('post'));
    }

    public function view($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.post.view', compact('post'));
    }

    public function create()
    {
        return view('admin.post.create' , compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $category = new Post();
        $category->category_id = $data['category_id'];
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];

        // $category->image = $data['image'];

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->save();

        return redirect('admin/post')->with('status', 'Post Created Successfully');
    }

    public function edit($post_id)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();
        $category = Post::find($post_id);

        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];

        $category->update();
        return redirect('admin/post')->with('status', 'Post Updated Successfully');
    }
}
