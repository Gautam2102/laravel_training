<!-- include header and footer  -->

@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
@php( $Getcountrylist = \App\Models\Country::all()) 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-info">{{ __('Update Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatepost') }}" enctype='multipart/form-data'>
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                        <input type="hidden" class="form-control" name="user_id" value="{{$data->user_id}}">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control   " name="title" value="{{$data->title}}"
                                    autofocus>

                                @error('title')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                <textarea type="text" class="form-control " name="body">{{$data->body}}</textarea>

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
                                    value="{{$data->dscription}}">

                                @error('description')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Select Country') }}</label>
                            <div class="col-md-6">
                           <select name="country" id="roles" class="form-control" >
                        
                           @foreach ($Getcountrylist as $Country)
  
                            <option value="{{$Country->name}}"{{$data->country== $Country->name ? 'selected' : ''}}>{{$Country->name}}</option>
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
                                    {{ __('Update') }}
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

    $('#roles').select2();

});


</script>
@endsection
