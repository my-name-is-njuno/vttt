<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

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


    public function store(Request $request)
    {
        //
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
