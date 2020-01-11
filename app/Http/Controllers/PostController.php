<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Request\PostRequest;
use Session;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('poats'));
    }

    public function create()
    {
        return view('posts.new');
    }

    public function store(PostRequest $request)
    {
        $request->user()->posts()->create($request->only('name', 'description', 'country_id'));
        $request->session()->flash('success', "Post Added Successfully");
        return redirect()->route('posts.show', $post);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->only('name','description'));
        Session::flash('success', "Post updated successfully");
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        Session::flash('success', "Post deleted successfully");
        return redirect()->route('posts.index');
    }
}
