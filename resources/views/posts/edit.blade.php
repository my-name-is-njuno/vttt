@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Post Info
                    @auth
                    <br>
                    <a href="{{ route('posts.create') }}" class="href">New Post</a>
                    @endauth
                </div>

                <div class="card-body">
                    @include('layouts._message')
                </div>


                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="country_id" value="{{ Auth::user()->country_id }}">
                        <div class="form-group">
                            <label for="my-input">Name</label>
                            <input id="name" class="form-control {{ $errors->has('name') ? is-invalid: "" }}"
                                type="text" name="name" value="{{ old('name', $post->name) }}">
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Description</label>
                            <textarea name="description" id="description"
                                class="form-control {{ $errors->has('description', $post->description) ? is-invalid : "" }}">{{ old('description', $post->description) }}</textarea>
                            @if ($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Update Post</button>
                        </div>
                    </form>
                </div>





            </div>
        </div>
    </div>
</div>
@endsection
