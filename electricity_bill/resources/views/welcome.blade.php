<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Bill</title>
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
                <input type="number" class="pass" name="unit" placeholder="Enter Unit" />
                @error('unit')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="login">Submit</button>
            </form>
        </div>



    </div>
</body>

</html>
