<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests\CommentRequest;
use Session;
class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function store(CommentRequest $request)
    {
        $request->user()->comments()->create($request->only('content','discussion_id'));
        Session::flash('success', "Comment added successfully");
        return back();
    }


    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        if (\Gate::allows('comment-update', $comment)) {
            return view('comments.show', compact('comment'));
        }
        abort(403, "Access Denied");
    }

    public function update(Request $request, Comment $comment)
    {
        if (\Gate::allows('comment-update', $comment)) {

        }
        abort(403, "Access Denied");
    }

    public function destroy(Comment $comment)
    {
        if (\Gate::allows('comment-update', $comment)) {

        }
        abort(403, "Access Denied");
    }
}
