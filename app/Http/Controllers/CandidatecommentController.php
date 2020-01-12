<?php

namespace App\Http\Controllers;

use App\Candidatecomment;
use App\Candidate;
use Illuminate\Http\Request;
use App\Http\Requests\CandidateCommentRequest;

class CandidatecommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }



    public function index($candidate_id)
    {
        $candidate_comments = Candidatecomment::latest()->paginate(5);
        return view('candidatecomments.index');
    }



    public function store(CandidateCommentRequest $request)
    {
        $request->user()->create($request->all());
        Session::flash('success', 'Comment Added successfully');
        return back();
    }


    public function show(Candidatecomment $candidatecomment)
    {
        return view('candidatecomments.show', compact('candidatecomment'));
    }


    public function edit(Candidatecomment $candidatecomment)
    {
        if (\Gate::allows('update-comment', $candidatecomment)) {
            return view('candidatecomments.edit', compact('candidatecomment'));
        }
        abort(403,'Access denied');
    }


    public function update(CandidateCommentRequest $request, Candidatecomment $candidatecomment)
    {
        if (\Gate::allows('delete-comment', $candidatecomment)) {
            $candidatecomment->update($request->all());
            Session::flash('success', 'Comment Added successfully');
            return back();
        }
        abort(403,'Access Denied');
    }


    public function destroy(Candidatecomment $candidatecomment)
    {
        if (\Gate::allows('delete-comment', $candidatecomment)) {
            $candidatecomment->delete();
            Session::flash('success', 'Comment Added successfully');
            return back();
        }
        abort(403, 'Access denied');
    }
}
