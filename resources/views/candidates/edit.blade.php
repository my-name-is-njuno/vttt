@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Candidate Info</div>
                <div class="card-body">
                    @include('layouts._message')
                    <form class="" action="{{ route('candidates.update', $candidate->id) }}" method="post">

                        @method('PUT')


                        @csrf
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" name="full_name" id="full_name"
                                class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                placeholder="candidate full_name" aria-describedby="helpId"
                                value="{{ old('full_name', $candidate->full_name) }}">

                            @if ($errors->has('full_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('full_name') }}
                            </div>
                            @endif

                        </div>


                        <div class="form-group">
                        
                            <label for="">Date of Birth</label>
                            <input type="text" name="dob" id="dob" class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}"
                                placeholder="candidate dob" aria-describedby="helpId" value="{{ old('dob', $candidate->dob) }}">
                        
                            @if ($errors->has('dob'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dob') }}
                            </div>
                            @endif
                        
                        </div>


                        <div class="form-group">
                            <label for="">Name Place</label>
                            <input type="text" name="place_name" id="place_name"
                                class="form-control {{ $errors->has('place_name') ? 'is-invalid' : '' }}" placeholder="candidate place_name"
                                aria-describedby="helpId" value="{{ old('place_name', $candidate->place_name) }}">
                        
                            @if ($errors->has('place_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('place_name') }}
                            </div>
                            @endif
                        
                        </div>



                        <div class="form-group">
                            <label for="">Running as</label>
                            <input type="text" name="running_as" id="running_as" class="form-control {{ $errors->has('running_as') ? 'is-invalid' : '' }}"
                                placeholder="candidate running_as" aria-describedby="helpId" value="{{ old('running_as', $candidate->running_as) }}">
                        
                            @if ($errors->has('running_as'))
                            <div class="invalid-feedback">
                                {{ $errors->first('running_as') }}
                            </div>
                            @endif     
                        </div>



                        <div class="form-group">
                            <label for="">Political Party</label>
                            <input type="text" name="political_party" id="political_party"
                                class="form-control {{ $errors->has('political_party') ? 'is-invalid' : '' }}" placeholder="candidate political_party"
                                aria-describedby="helpId" value="{{ old('political_party', $candidate->political_party) }}">
                        
                            @if ($errors->has('political_party'))
                            <div class="invalid-feedback">
                                {{ $errors->first('political_party') }}
                            </div>
                            @endif   
                        </div>


                        <div class="form-group">
                            <label for="">About</label>
                            <textarea name="about" id="about" cols="30" rows="10"
                                class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}">{{ old('about', $candidate->about) }}</textarea>
                        
                            @if ($errors->has('about'))
                            <div class="invalid-feedback">
                                {{ $errors->first('about') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Agenda</label>
                            <textarea name="agenda" id="agenda" cols="30" rows="10"
                                class="form-control {{ $errors->has('agenda') ? 'is-invalid' : '' }}">{{ old('agenda', $candidate->agenda) }}</textarea>

                            @if ($errors->has('agenda'))
                            <div class="invalid-feedback">
                                {{ $errors->first('agenda') }}
                            </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="">Promises to the People</label>
                            <textarea name="promises" id="promises" cols="30" rows="10"
                                class="form-control {{ $errors->has('promises') ? 'is-invalid' : '' }}">{{ old('promises', $candidate->promises) }}</textarea>
                        
                            @if ($errors->has('promises'))
                            <div class="invalid-feedback">
                                {{ $errors->first('promises') }}
                            </div>
                            @endif
                        </div>


                        <div>
                            <button type="submit" class="btn btn-outline-primary">Update Candidacy Info</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection