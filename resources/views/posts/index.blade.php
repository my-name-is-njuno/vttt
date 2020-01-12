@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Posts
                    @auth
                        <br>
                        <a href="{{ route('posts.create') }}" class="href">New Post</a>
                    @endauth
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>


                <ul class="list-group">


                    @foreach($posts as $p)

                        <li class="list-group-item ">
                            {{ $p->name }}
                            <span class="">
                                <a href="{{ $p->url }}" class="btn btn-sm btn-outline-info">View</a> | <a class="btn btn-sm btn-outline-info" href="{{ route('posts.edit', $p->id) }}">Edit</a> |
                                <form action="{{ route('posts.destroy', $p->id) }}" method="post" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn btn-outline-danger" onclick="return confirm('Are You Sure You Want To Delete')">Delete</button>
                                </form>
                                | <a href="{{ route('candidates.self.nominate', ['slug'=>$p->slug]) }}" class="btn btn-sm btn-outline-info">Nominate Yourself</a>
                            </span>



                        </li>

                    @endforeach

                </ul>

				<div class="card-body">
					{{ $posts->links() }}
				</div>

            </div>
        </div>
    </div>
</div>
@endsection
