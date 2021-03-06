@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Candidates
                    @auth

                    @endauth
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>

                @foreach($candidates as $c)

                    <li class="list-group-item ">
                        {{ $c->full_name }}
                        <span class="text-right">
                            <a href="{{ $c->url }}">View</a> | <a href="{{ route('candidates.edit',$c->id) }}">Edit</a> | <a
                                href="{{ route('candidates.destroy',$c->id) }}">Delete</a>
                        </span>

                    </li>

                @endforeach

                <div class="card-body">
                    {{ $candidates->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
