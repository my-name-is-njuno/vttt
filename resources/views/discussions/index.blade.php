@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Discussions<br>
                    <a href="{{ route('discussions.create') }}" class="href">New Discussion</a>
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
							{{ $disc->votes }} votes | {{ $disc->comments }} comments | {{ $disc->views }} views
						</small>
						<blockquote class="blockquote-footer">
							<a href="{{ $disc->user->url }}">{{ $disc->user->name }}</a> | {{ $disc->created_at->diffForHumans() }}
						</blockquote>
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
