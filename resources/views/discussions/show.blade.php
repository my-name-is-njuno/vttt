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
                    {!! $discussion->content_html !!}
                </div>
                
                
            </div>

            <div class="card">

                @auth
                   <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                        <div class="form-group">
                            <label for="my-input">Leave a comment</label>
                            <textarea name="content" id="content"
                                class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"></textarea>
                
                
                
                            @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                            @endif
                
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div> 
                @endauth

                

            </div>

            <h4 class="text-center">Comments</h4>
            
            <div class="card">
            
            
                @foreach ($discussion->comments as $c)
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
            
            </div>
            
        </div>
    </div>
</div>
@endsection
