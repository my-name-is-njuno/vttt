@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Discussions
                    @auth
                        <br>
                        <a href="{{ route('discussions.create') }}" class="href">New Discussion</a>
                    @endauth
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>

				@foreach($discussions as $disc)

					<div class="card-body">
						<h4>
							<a href="{{ $disc->url }}">{{ $disc->title }}</a>
                        </h4>


						<p>
							{{ str_limit($disc->content,250) }}
						</p>
						<small>
							{{ $disc->votes_count }} votes | {{ $disc->comments_count }} comments | {{ $disc->views_count }} views
						</small>
						<blockquote class="blockquote-footer">
							<a href="{{ $disc->user->url }}">{{ $disc->user->name }}</a> | {{ $disc->created_at->diffForHumans() }}
                        </blockquote>

                        @auth
                            @if (Auth::user()->can('update-discussion', $disc))
                                <p class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('discussions.edit', $disc->id) }}">Edit</a>
                                </p>
                                <form class="text-right" action="{{ route('discussions.destroy', $disc->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                        @endauth



					</div>

				@endforeach

				<div class="card-body">
					{{ $discussions->links() }}
				</div>

            </div>
        </div>
    </div>
</div>
@endsection
