@extends('layouts.app')

@section('content')
@php( $Getcountrylist = \App\Models\Country::all())
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-info">{{ __('Add Post') }}</div>
                @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('addpost') }}" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="user_email" value="{{Auth::user()->email}}">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control   " name="title" value="{{ old('title') }}"
                                    autofocus>

                                @error('title')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control " name="body"
                                    value="{{ old('body') }}"></textarea>

                                @error('body')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description"
                                    value="{{ old('description') }}">

                                @error('description')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image"
                                class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select Country') }}</label>
                            <div class="col-md-6">
                           <select name="country" id="roles" class="form-control">
                           <option value=""></option>
                           @foreach ($Getcountrylist as $Country)
                            <option value="{{$Country->name}}">{{$Country->name}}</option>
                            @endforeach

                                </select>
                                
                                </div>
                                @error('body')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){

    $('#roles').select2({
  
     placeholder: "select country"

    });

});


</script>
@endsection
