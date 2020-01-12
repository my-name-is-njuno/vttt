<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Session;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.new');
    }

    public function store(PostRequest $request)
    {
        $p = Post::where('name','=',$request->name)->where('country_id','=',$request->country_id)->first();
        if(!$p) {
            $post = $request->user()->posts()->create($request->only('name', 'description', 'country_id'));
            $request->session()->flash('success', "Post Added Successfully");
            return redirect()->route('posts.show', $post->slug);
        } else {
            Session::flash('info', "Post you are adding is already added");
            return redirect()->route('posts.show', $p->slug);
        }


    }

    public function show($slug)
    {
        // dd($post);
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if (\Gate::allows('update-post', $post)) {
            return view('posts.edit', compact('post'));
        }
        abort(403, "Access Denied");
    }


    public function update(PostRequest $request, Post $post)
    {
        if (\Gate::allows('update-post', $post)) {
            $post->update($request->only('name','description'));
            Session::flash('success', "Post updated successfully");
            return redirect()->route('posts.index');
        }
        abort(403,"Access Denied");
    }

    public function destroy(Post $post)
    {
        if (\Gate::allows('delete-post', $post)) {
            $post->delete();
            Session::flash('success', "Post deleted successfully");
            return redirect()->route('posts.index');
        }
        abort(403,"Access Denied");
    }
}
