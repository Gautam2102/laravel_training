<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Bill</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>

<body>
    <div class="cont">

        <div class="form">
            <form action="{{ route('postbill') }}" method="post">
                @csrf
                <h1>Calculate Bill</h1>
                
                <select class="user" name="city">
                    <option value="">Select City </option>
                    @foreach($city as $row)
                    <option value="{{$row->id}}">{{$row->city}}</option>
                    @endforeach
                </select>
                @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="number" class="pass" name="unit" placeholder="Enter Unit" value="{{ old('unit') }}"/>
                @error('unit')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="login">Submit</button>
            </form>
        </div>



    </div>
</body>

</html>