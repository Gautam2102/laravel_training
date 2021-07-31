@extends('layouts.home')

@section('content')

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
<style>
    #wrapper {
        text-align: center;
        margin: 10px;
        margin-top: 100px;
        margin-left: 100px;
        padding: 0px;


    }

</style>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<div id="wrapper">

    <form action="{{route('postque')}}" method="post">
        @csrf
        <div class="input_fields_wrap container">
            <button class="add_field_button btn btn-success">Add More Questions</button><br><br>

            <label style="font-weight:bold;">Add Questions </label>
            @for ($i = 0; $i < 1; $i++)
            
            <textarea class="ckeditor" name="ck[0][]"></textarea>

                @if($errors->has('ck.*'))

                <span class="help-block text-danger">

                    {{ $errors->first('ck.*')}}
                </span>
                @endif



                @endfor

                <br>
                <div class="form-group">
                    <label style="font-weight:bold;float:left;">Select Option Type <span
                            class="text-hightlight">*</span></label>
                    <select class="form-control" name="category_id" id="category_id">

                        <option value="1">Radio Options</option>
                        <option value="2">Multiple Check Box</option>
                    </select>
                </div>
                <div class="form-group" id="divt"><a href="javascript:void(0);"
                        class="add-check btn btn-warning text-light mx-3 " title="Add field" style="float:right;"><i
                            class="fa fa-plus"></i>&ensp;Add More field</a><br /> <br />
                    <div class="row text-center">
                        <div class="col-sm-9 ">
                            <p style="float:left;">Multiple Radio</p><br>
                            <div class="">
                            
                                @for ($i = 0; $i < 4; $i++) 
                                <span class="d-flex my-3 "> <input type="radio"name="optionradio"value="optionradio"
                                        class=" form-check-input  mt-4 "checked>&ensp;<textarea name="option[0][{{$i}}]"
                                        class="form-control "></textarea> </span>

                                    @if($errors->has('option.*'))

                                    <span class="help-block text-danger">

                                        {{ $errors->first('option.*')}}
                                    </span>
                                    @endif


                                   
                                    @endfor

                            </div>
                            <div class="field_wrapper wrapper">

                            </div>

                        </div>
                    </div>


                </div>
                <div class="form-group" id="divn" style="display:none;"><a href="javascript:void(0);"
                        class="add btn btn-warning text-light mx-3 " title="Add field" style="float:right;"><i
                            class="fa fa-plus"></i>&ensp;Add More field</a>
                    <br /> <br />
                    <div class="row">
                        <div class="col-sm-9">
                            <p style="float:left;">Multiple CheckBox</p><br>
                            <!-- <img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"> -->
                            <div class="wrapper">
                                <div class="input-box ">

                               
                                    
                                    @for ($i = 0; $i < 4; $i++) 
                                    <span class="d-flex my-3"><input type="checkbox"name="optioncheckbox"value="optioncheckbox" checked
                                            class="mt-4">&ensp; <textarea name="checkbox[0][{{$i}}]"
                                            class="form-control "></textarea></span>

                                        @if($errors->has('checkbox.*'))

                                        <span class="help-block text-danger">

                                            {{ $errors->first('checkbox.*')}}
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


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input_fields">


                    </div>

                </div>
        </div>
        <input type="submit" value="submit" class="btn btn-info btn-block">

        <div>

            <hr />
            <br />
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1;
        var j=2;
        var y = 0; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                var editorId = 'editor_' + x;
                var i = +j;
                

                var abc = 'abc' + x;
                var def = 'def' + x;
                var sel = 'sel' + x;
                $(wrapper).append('<div class="bg-light"><label style="font-weight:bold;">Add Questions </label> <textarea id="' + editorId +
                    '" class="ckeditor" name="ck['+x+'][]"></textarea><div class="form-group"><label style="float:left; font-weight:bold;">Select Option Type  <span class="text-hightlight">*</span></label><select class="form-control abc" name="category_id "id="' +
                    sel + '"><option value="1"id="' + sel +
                    '">Radio Options</option><option value="2"id="' + sel +
                    '">multiple check box</option> </select></div><div class="divt " id="' +
                    abc +
                    '"style=""><a href="javascript:void(0);"style="float:right;" class="add1  btn btn-warning text-light mx-3 " id="' +
                    editorId +
                    '" ><i class="fa fa-plus "></i>Add More Field</a><br/><div class="col-sm-9"><p style="float:left;">Multiple Radio</p><br><br><span class="d-flex my-3"><input type="radio"name="optionradio"value="optionradio" class="mt-4"checked>&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="option['+x+'][]"></textarea></span><span class="d-flex my-3"><input type="radio"name="optionradio"value="optionradio"checked class="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="option['+x+'][]"></textarea></span><span class="d-flex my-3"><input type="radio"name="optionradio"value="optionradio"checked class="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="option['+x+'][]"></textarea></span><span class="d-flex my-3"><input type="radio"name="optionradio"value="optionradio"checked class="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="option['+x+'][]"></textarea></span></div></div><div class="divn" id="' +
                    def +
                    '"style="display:none;"><a href="javascript:void(0);"style="float:right;" class="add2  btn btn-warning text-light mx-3 " id="' +
                    editorId +
                    '" ><i class="fa fa-plus "></i>Add More Field</a><br/><div class="col-sm-9"><p style="float:left;">Multiple Checkbox</p><br><br><span class="d-flex my-3"><input type="checkbox"class="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="checkbox['+x+'][]" ></textarea></span><span class="d-flex my-3"><input type="checkbox"name="optioncheckbox"value="optioncheckbox" checkedclass="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="checkbox['+x+'][]" ></textarea></span><span class="d-flex my-3"><input type="checkbox"name="optioncheckbox"value="optioncheckbox" checkedclass="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="checkbox['+x+'][]" ></textarea></span><span class="d-flex my-3"><input type="checkbox"name="optioncheckbox"value="optioncheckbox" checked class="mt-4">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="checkbox['+x+'][]" ></textarea></span></div></div><br><br><a href="#" class="remove_field btn btn-success btn-block">Remove</a><hr/></div>'
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

                i++;


                $(' <div class=" col-sm-9 d-flex my-3"><input type="radio"class="mt-3">&ensp;<textarea class="textbox form-control"id="' +
                    editorId +
                    '" name="option[]"></textarea><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></i></a></span></div>'
                ).appendTo('#' + abc);
            });
            $(".add2").click(function () {

                $(' <div class=" col-sm-9 d-flex my-3"><input type="checkbox"class="mt-3">&ensp; <textarea  class="textbox form-control"id="' +
                    editorId +
                    '" name="checkbox[]" ></textarea><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></i></a></span></div>'
                ).appendTo('#' + def);
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
            $('<div class=" d-flex my-3"><input type="checkbox" class="mt-4">&ensp;<textarea class="textbox form-control" name="checkbox[{{$i}}]" ></textarea><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></a></span></div>')

                .appendTo(".input-box");

        });
    });

    $(document).ready(function () {

        $(".add-check").click(function () {
            $('<div  class=" d-flex my-3"><input type="radio" class="mt-4">&ensp;<textarea class="textbox form-control" name="option[]" ></textarea><span class="rem" ><a href="javascript:void(0);class="btn btn-danger" ><i class="fa fa-minus btn btn-danger"></a></span></div>')

                .appendTo(".field_wrapper");

        });



    });

    $('.input_fields_wrap').on('click', '.rem', function () {
        $(this).parent("div").remove();
    });
    $(document).on('change', '#category_id', function () {
        var stateID = $(this).val();

        if (stateID == '1') {
            $("#divn").hide();
            $("#divt").show();
        } else if (stateID == '2') {
            $("#divt").hide();
            $("#divn").show();
        }
    });

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stop
