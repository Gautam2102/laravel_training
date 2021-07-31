<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<h2 class="text-center"><u>MCQ</u></h2>
<a href="{{route('addquestion')}}"class="btn btn-primary ml-5">Back</a>
<center>
    <div class="container">
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>
    </div>
    @endif
</center>
<div class="container mt-5">


    @foreach($data as $row)
    
<h3>{{$row->id}}.&ensp;{!! $row->questions !!}</h3><br>
@if(isset($row->options) )
@if(!$row->options=='null')
<?php foreach (json_decode($row->options)as $option){?>
    

    <input type="radio" id="opt2" class="item-price" value="" name="item_price">&ensp;{{$option}}<br><br>
   
<?php }?>
@endif
@endif
@if(isset($row->checkbox))

@if(!$row->checkbox=='null')
<?php foreach (json_decode($row->checkbox)as $checkbox){?>
    
   
    <input type="checkbox" id="opt2" class="item-price" value="" name="item_price">&ensp;{{$checkbox}}<br><br>
    
<?php }?>
@endif
@endif

<a href="{{url('/quedit/'.$row->id)}}"class="btn btn-primary"style="">Edit</a>
<hr/>

    @endforeach
    
    </div>
</body>
</html>