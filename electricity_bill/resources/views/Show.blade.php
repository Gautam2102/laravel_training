<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
 
</head>
<body>
<div class="cont">
    <h3 style="color:green;">Electricity Bill</h3>
    <br/>
    <br/>
    
    <h4>City :- <span style="padding-left:30px;">{{$row->city}}</span></h4><br/> 
    
    <h4>Total Unit :- <span style="padding-left:30px;">{{$unit}}</span></h4> <br/>
   <h4>Total amount to be Paid :- <span style="padding-left:30px;">{{$add}} Rs/-</span></h4> <br/>
</div>
</body>
</html>