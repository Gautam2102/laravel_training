@extends('layouts.app')

@section('content')
<div class="container">
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>

    <strong>{{ $message }}</strong>

</div>
</div>
@endif
@if(!empty($data) && $data->count())
@foreach($data as $row)

<div class="container">

    <div class="row"
        style="border-left:5px solid red; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10px">
        <div class="col-sm-2" style="padding:15px 15px 15px 15px">
            <h4 class="media-heading">Title</h4>
            <p>{{$row->title}}</p>
            <img class="media-object" width="100px" height="100px" src="{{asset('images/' .$row->image) }}">
        </div>
        <div class="col-sm-6" style="padding:15px 15px 15px 15px">
            <h4 class="media-heading">Body</h4>
            <p>{{$row->body}}</p>
        </div>
        <div class="col-sm-2" style="padding:15px 15px 15px 15px">

            <p class="text-right">
                <h4 class="media-heading">Description</h4>{{$row->dscription}}
            </p>
        </div>
        <div class="col-sm-2" style="padding:50px 15px 15px 15px">

            <span><a href="{{ URL('/editpost/'.$row->id)}}" class="btn btn-info"><i
                        class="glyphicon glyphicon-edit"></i> Edit</a></span>
            |
            <span><a href="{{ URL('/deletepost/'.$row->id)}}" class="btn btn-danger"><i
                        class="glyphicon glyphicon-trash"></i>
                    Delete</a></span>

        </div>
    </div>
</div><br />
</div>
@endforeach
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('! Empty') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('sorry No Data Available here go and add post !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="">
    {{$data->links()}}

</div>

@endsection
