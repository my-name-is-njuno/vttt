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
                            {{ $p.name }} 
                            <span class="text-right">
                                <a href="{{ route('posts.show',$p->id) }}">View</a> | <a href="{{ route('posts.edit',$p->id) }}">Edit</a> | <a href="{{ route('posts.delete',$p->id) }}">Delete</a>
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
