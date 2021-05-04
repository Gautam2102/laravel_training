<!-- include header and footer  -->
@extends('master')

<!--include body -->
@section('content')


<div class="container">
    <form id="contact" action="/postupdate" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{$data->id}}">
        <fieldset>
            <input type="text" name=" title" placeholder="Enter Title" value="{{$data->title}}">
            @error('title')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <fieldset>
            <textarea type="text" placeholder="Type your body here...." name="body">{{$data->body}}</textarea>
            @error('body')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>

        <fieldset>
            <input type="text" placeholder="Description" name="description" value="{{$data->dscription}}">
            @error('description')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>
        <fieldset>
            Insert Image:
            <input type="file" name="image">
            @error('image')

            <div class="alert">{{$message}}</div>

            @enderror
        </fieldset>
        <button type="submit" name="submit" class="btn-info btn-block">Post</button>

    </form>
</div>
@endsection
