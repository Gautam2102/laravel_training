@extends('master')

@section('content')

<!-- show post data from database -->
@foreach($user as $row)

<div class="container">
    <div class="row"
        style="border-left:5px solid red; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius:10px">
        <div class="col-sm-2" style="padding:15px 15px 15px 15px">
            <h4 class="media-heading">Title</h4>
            <p>{{$row->title}}</p>
            <img class="media-object" width="100px" height="100px" src="{{ asset('images/' .$row->image) }}">
        </div>
        <div class="col-sm-6" style="padding:15px 15px 15px 15px">
            <h4 class="media-heading">Body</h4>
            <p>{{$row->body}}</p>
        </div>
        <div class="col-sm-2" style="padding:15px 15px 15px 15px">

            <p class="text-right">
            <h4 class="media-heading">Description</h4>{{$row->dscription}}</p>
        </div>
        <div class="col-sm-2" style="padding:50px 15px 15px 15px">

            <span><i class="glyphicon glyphicon-edit"></i> Edit</span></li> |

            <span><i class="glyphicon glyphicon-trash"></i> Delete</span>

        </div>
    </div>
</div><br />
@endforeach
@endsection