@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $discussion->title }}<br>
                    <a href="{{ route('discussions.create') }}" class="href">New Discussion</a>
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>
                <div class="card-body">
                    {{ $discussion->content_html }}
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
