<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  @if($message=Session::get('success'))  
<div class="alert alert-success alert block">
<button type="button" class="close"data-dismiss="alert">x</button>
<strong>{{$message}}</strong>
</div>
@endif        
<table class="table table-bordered">
    <thead>
      <tr>
      <th>ID</th>
        <th>Name</th>
        <th>Email</th>
       
        <th>Image</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $row)
      <tr>
      <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->email}}</td>
      
        <td>{{$row->image}}</td>
        <td><a href="{{url ('/edit',$row->id)}}"class="btn btn-primary">Edit</a
        ><a href="{{url ('/delete',$row->id)}}"class="btn btn-info">Delete</a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
