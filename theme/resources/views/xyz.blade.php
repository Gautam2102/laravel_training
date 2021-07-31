


<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
    echo $value;
}
// $arr is now array(2, 4, 6, 8)
 // break the reference with the last element
?>
<br>

<?php
$x = 1;

do {
  echo "The number is: $x <br>";
  $x++;
} while ($x <= 5);
?>
<br>
<?php
$x = 1;




while($x <= 5) {
  echo "The number is: $x <br>";
  $x++;
}
?>

<br>


<?php
$d = date("D");
if($d == "Thu"){
    echo "Have a nice weekend!";
} elseif($d == "Sun"){
    echo "Have a nice Sunday!";
} else{
    echo "Have a nice day!";
}
?>






<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<form action="{{route('postxyz')}}" method="post">
                @csrf
<div class="input_fields_wrap container">
    <button class="add_field_button">Add More Fields</button>


    @for ($i = 0; $i < 1; $i++)
                

    <textarea class="ckeditor" name="ck[]"></textarea>
                    
                    @if($errors->has('ck.'.$i))

                        <span class="help-block text-danger">

                        {{ $errors->first('ck.' .$i)}}
                        </span>
                    @endif
                                        
                                        
                                    
            @endfor

    
   <div class="form-group">
  <label>Categories <span class="text-hightlight">*</span></label>
  <select class="form-control" name="category_id" id="category_id">
    <option>select</option>
    <option value="1">Option</option>
    <option value="2">Multiple Check Box</option>
    </select>
</div>
<div class="form-group" id="divt"><a href="javascript:void(0);" class="add-check btn btn-warning text-light mx-3 " title="Add field"style="float:right;"><i class="fa fa-plus"></i>&ensp;Add More field</a><br/> <br/><div class="row text-center"> <div class="col-sm-9 ">
                  
                  <div class="">
                @for ($i = 0; $i < 4; $i++)
                

                    <span class="d-flex my-3">  <img src="{{asset('/img/radio.png')}}" alt=""height="30px"width="30px">  <input type="text"name="option[{{$i}}]" id="tt1"class="form-control  bg-light " value="{{ old('radio[]') }}"></span>
                        
                        @if($errors->has('option.'.$i))

                            <span class="help-block text-danger">

                            {{ $errors->first('option.' .$i)}}
                            </span>
                        @endif
                                            
                                            
                                        
                @endfor
   
                        </div>
                        <div class="field_wrapper"></div>
                    <!-- @error('radio')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->


                </div></div>

  @error('titre')
{{$message}}

  @enderror
</div>
<div class="form-group" id="divn" style="display:none;"><button class="btn add  btn-warning text-light mx-3"style="float:right;"><i class="fa fa-plus"></i>Add More field</button>
                  <br/> <br/>
                  <div class="row">
                  <div class="col-sm-9">
                  
                    <!-- <img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"> -->
                    <div class="wrapper">
                        <div class="input-box ">


                        @for ($i = 0; $i < 4; $i++)
                

                        <span class="d-flex my-3"> <img src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px"> <input type="text"
                                id="tt2" name="checkbox[{{$i}}]"class="form-control bg-light"></span>
                      
                                @if($errors->has('checkbox.'.$i))

<span class="help-block text-danger">

{{ $errors->first('checkbox.' .$i)}}
</span>
@endif
                           
                @endfor
 

                                <!-- <span class="d-flex my-3"> <img src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px"> <input type="text"
                                id="tt2" name="checkbox[]"class="form-control bg-light" disabled="disabled"></span> -->
                    <!-- @error('radio')
                                <span class="text-danger" >
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror -->


                </div></div></div></div>
    <div class="input_fields">


    </div>
</div>

<div>
<input type="submit"value="submit">
</form>

    <script>
        $(document).ready(function () {
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var editorId = 'editor_' + x;

                    var abc = 'abc' + x;
                    var def = 'def' + x;
                    var sel = 'sel' + x;
                    $(wrapper).append('<div > <textarea id="' + editorId +
                        '" class="ckeditor" name="ck[]"></textarea>  <div class="form-group"><label>Choose Option Type <span class="text-hightlight">*</span></label><select class="form-control abc" name="category_id "id="' +
                        sel + '"><option value="1"id="' + sel +
                        '">radio field</option><option value="2"id="' + sel +
                        '">multiple check box</option> </select></div><div class="divt " id="' +
                        abc +
                        '"style=""><label>Radio option <span class="text-hightlight">*</span></label><span class="d-flex"><img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control"id="' + editorId +
                        '" name="option[{{$i}}]" ><a href="javascript:void(0);" class="add1" id="' +
                        editorId + '" ><i class="fa fa-plus btn btn-warning"></i></a></span></div><div class="divn"id="' + def +
                        '"style="display:none;"><label>Checkbox Field <span class="text-hightlight">*</span></label><span class="d-flex"><img src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control"id="' + editorId +
                        '" name="checkbox[{{$i}}]" ><a href="javascript:void(0);" class="add2" id="' +
                        editorId + '" ><i class="fa fa-plus btn btn-warning"></i></a></span></div><a href="#" class="remove_field btn btn-success">Remove</a></div>'
                        ); //add input box

                    CKEDITOR.replace(editorId, {
                        height: 200
                    });


                    $(document).on('change', "#" + sel, function () {


                        var stateID = $(this).val();

                        var dt = $("#" + abc);

                        var dg = $("#" + def);


                        if (stateID == '1') {
                            $(dg).hide();
                            $(dt).show();
                        } else if (stateID == '2') {
                            $(dt).hide();
                            $(dg).show();

                        }
                    });
                }

                $(".add1").click(function () {
                 
                 


                    $(' <div class="d-flex my-3"> <img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control"id="' + editorId +
                        '" name="option[{{$i}}]" ><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></i></a></span></div>'
                        ).appendTo('#'+abc);
                });
                $(".add2").click(function () {
                 
                 $(' <div class="d-flex my-3"> <img src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control"id="' + editorId +
                     '" name="checkbox[{{$i}}]" ><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></i></a></span></div>'
                     ).appendTo('#'+def);
             });
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
        $(document).ready(function () {
            $(".add").click(function () {
                $('<div class="d-flex my-3"> <img src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control" name="checkbox[{{$i}}]" ><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></a></span></div>')
          
                .appendTo(".input-box");

            });
        });

        $(document).ready(function () {
            $(".add-check").click(function () {
                $('<div class="d-flex my-3"> <img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"><input class="textbox form-control" name="option[{{$i}}]" ><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></a></span></div>')
          
                .appendTo(".field_wrapper");

            });



        });

        $('.input_fields_wrap').on('click', '.rem', function () {
            $(this).parent("div").remove();
        });
        $(document).on('change', '#category_id', function() {
    var stateID = $(this).val();
 
    if (stateID == '1') {
      $("#divn").hide();
      $("#divt").show();
    } else if(stateID == '2') {
      $("#divt").hide();
      $("#divn").show();
    }   
  });  
  
    
    </script>