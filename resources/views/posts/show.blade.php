@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $post->name }}
                    @auth
                    <br>
                    <a href="{{ route('posts.create') }}" class="href">New Post</a>
                    @endauth
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>


                <div class="card-body">
                    {!! $post->description_html !!}
                </div>

                

                

            </div>
        </div>
    </div>
</div>
@endsection