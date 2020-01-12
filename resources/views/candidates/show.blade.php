@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                {{ $candidate->full_name }} running for {{ $candidate->post->name }} for {{ $candidate->place_name }} <br>

                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>
                <div class="card-body">
                    <h4>
                        About Candidate
                    </h4>
                    {!! $candidate->about->about_html !!}
                </div>
                <div class="card-body">
                    <h4>
                        Candidate Agenda
                    </h4>
                    {!! $candidate->agenda->agendas_html !!}
                </div>
                <div class="card-body">
                    <h4>
                        Promises Made
                    </h4>
                    {!! $candidate->promise->promises_html !!}
                </div>



            </div>

            <div class="card">

                @auth
                <div class="card-body">
                    <form action="{{ route('candidatecomments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                        <div class="form-group">
                            <label for="my-input">Leave a comment</label>
                            <textarea name="content" id="content"
                                class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                            @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                            @endif

                            <button type="submit" class="btn btn-outline-primary">Submit Comment</button>
                        </div>
                    </form>
                </div>
                @endauth



            </div>

            <h4 class="text-center">Comments</h4>

            <div class="card">

                @if ($candidate->candidatecomments->count())
                    @foreach ($candidate->candidatecomments as $c)
                    <div class="card-body">

                        <p>
                            {!! $c->content_html !!}
                        </p>
                        <blockquote>
                            <p class="block-footer">
                                <a href="{{ route('users.show',$c->user->id) }}">{{ $c->user->name }}</a> |
                                {{ $c->created_at->diffForHumans() }}

                            </p>
                        </blockquote>
                        <hr>
                    </div>
                    @endforeach
                @endif


            </div>

        </div>
    </div>
</div>
@endsection
