<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\DiscussionRequest;
use Illuminate\Http\Request;
use Session;

class DiscussionController extends Controller
{

    public function __construct()
    {
        # code...
    }

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
        // $request->user()->discussions()->create($request->all());
        $request->user()->discussions()->create($request->only('title', 'content'));
        Session::flash('success', "Discussion added successfully");
        return redirect()->route('discussions.index');
    }


    public function show(Discussion $discussion)
    {
        $discussion->increment('views');
        return view('discussions.show', compact('discussion'));
    }


    public function edit(Discussion $discussion)
    {   
        if (\Gate::allows('update-discussion', $discussion)) {
            return view('discussions.edit', compact('discussion'));
        }
        abort(403, "Access Denied");
        
    }


    public function update(DiscussionRequest $request, Discussion $discussion)
    {
        if (\Gate::allows('update-discussion', $discussion)) {
            $discussion->update($request->only('title', 'content'));
            Session::flash('success', "Discussion updated successfully");
            return redirect()->route('discussions.index');
        }
        abort (403, "Access Denied");
    }


    public function destroy(Discussion $discussion)
    {
        if (\Gate::allows('delete-discussion', $discussion)) {
            $discussion->delete();
            Session::flash('success', "Discussion deleted successfully");
            return redirect()->route('discussions.index');
        }
        abort(403, "Access denied");
        
    }
}
