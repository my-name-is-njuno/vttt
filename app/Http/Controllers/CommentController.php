<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest; 
use Session; 
class CommentController extends Controller
{
    public function store(CommentRequest $request)
    { 
        $request->user()->comments()->create($request->only('content','discussion_id'));
        Session::flash('success', "Comment added successfully");
        return back();
    }


    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
