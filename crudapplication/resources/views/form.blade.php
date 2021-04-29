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
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif
  <form action="/insert"method="post"enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name">
    </div>
    @error('name')

<div class="alert alert-danger">{{$message}}</div>

      @enderror
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" placeholder="Enter Email" name="email">

    </div>
    @error('email')
<div class="alert alert-danger">{{$message}}</div>

      @enderror
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
   @error('password')

<div class="alert alert-danger">{{$message}}</div>

   @enderror
   <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="file" class="form-control"  name="image">
    </div>
   @error('image')

<div class="alert alert-danger">{{$message}}</div>

   @enderror
    <button type="submit" class="btn btn-info btn-block">Submit</button>
    <a href="/show" class="btn btn-warning btn-block">Show Data</a>
  </form>
</div>

</body>
</html>
