<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::latest()->paginate(20);
        return view('candidates.index', compact('candidates'));
    }

    public function create()
    {
        return view('candidates.new');
    }

   
    public function store(CandidateRequest $request)
    {
        $candidate = $request->user()->candidates()->create($request->all());
        $request->session()->flash('success', "Candidate Added Successfully");
        return redirect()->route('candidates.show', $candidate);
    }

    public function show(Candidate $candidate)
    {
        return view('candidates.show', compact('candidate'));
    }

    
    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    
    public function update(CandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->all());
        $request->session()->flash('success', "Candidate updated Successfully");
        return redirect()->route('candidates.show', $candidate);
    }

    
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        $request->session()->flash('success', "Candidate deleted Successfully");
        return redirect()->route('candidates.index');
    }
}
