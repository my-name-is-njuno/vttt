@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Discussions</div>
                <div class="card-body">
                    <form class="" action="{{ route('discussions.store') }}" method="post">
                        @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" placeholder="Discussion Title" aria-describedby="helpId" value="{{ old('title') }}">

                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>

                        @if ($errors->has('content'))
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
