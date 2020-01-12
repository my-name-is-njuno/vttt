<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Post;
use App\Promise;
use App\Agenda;
use App\About;
use Illuminate\Http\Request;
use App\Http\Requests\CandidateRequest;
use Session;
use Auth;


class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $candidates = Candidate::latest()->paginate(20);
        return view('candidates.index', compact('candidates'));
    }

    public function create($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('candidates.new', compact('post'));
    }


    public function store(CandidateRequest $request)
    {
        $candidate = $request->user()->candidates()->create($request->only('full_name', 'country_id', 'dob', 'political_party', 'running_as', 'post_id', 'place_name'));

        $promise = new Promise();
        $promise->promises = $request->promises;
        $promise->country_id = $request->country_id;
        $promise->post_id = $request->post_id;
        $promise->candidate_id = $candidate->id;
        $promise->user_id = Auth::user()->id;
        $promise->save();

        $agenda = new Agenda();
        $agenda->agendas = $request->agendas;
        $agenda->country_id = $request->country_id;
        $agenda->post_id = $request->post_id;
        $agenda->candidate_id = $candidate->id;
        $agenda->user_id = Auth::user()->id;
        $agenda->save();

        $about = new About();
        $about->about = $request->about;
        $about->country_id = $request->country_id;
        $about->post_id = $request->post_id;
        $about->candidate_id = $candidate->id;
        $about->user_id = Auth::user()->id;
        $about->save();

        Session::flash('success', "Candidate Added Successfully");
        return redirect()->route('candidates.show', $candidate->slug);

    }

    public function show($slug)
    {
        $candidate = Candidate::where('slug',$slug)->firstOrFail();
        // dd($candidate);
        return view('candidates.show', compact('candidate'));
    }


    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }


    public function update(CandidateRequest $request, Candidate $candidate)
    {
        $candidate->update($request->only('place_name', ''));
        $request->session()->flash('success', "Candidate updated Successfully");
        return redirect()->route('candidates.show', $candidate);
    }


    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        Session::flash('success', "Candidate deleted Successfully");
        return redirect()->route('candidates.index');
    }
}
