<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\DiscussionRequest;
use Illuminate\Http\Request;
use Session;

class DiscussionController extends Controller
{

    public function index()
    {
        $discussions = Discussion::with('user')->latest()->paginate(5);
        return view('discussions.index', compact('discussions'));
    }


    public function create()
    {
        return view('discussions.new');
    }


    public function store(DiscussionRequest $request)
    {
        $request->user()->discussions()->create($request->all());
        $request->user()->discussions()->create($request->only('title', 'content'));
        Session::flash('success', "Discussion added successfully");
        return redirect()->route('discussions.index');
    }


    public function show(Discussion $discussion)
    {
        //
    }


    public function edit(Discussion $discussion)
    {
        //
    }


    public function update(Request $request, Discussion $discussion)
    {
        //
    }


    public function destroy(Discussion $discussion)
    {
        //
    }
}
