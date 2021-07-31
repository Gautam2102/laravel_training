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


<div class="row hide_mail_id_domain" id="wrapper">


    <div class="col-sm-12">

        <form action="{{route('updateque')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <label for="" style="font-weight:bold;">Add New Questions</label>
            <textarea class="ckeditor" required="" name="ck">{{$data->questions}}</textarea>
            @error('question_option_1')
            <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <label for="" style="font-weight:bold;">Select Option type Radio Button / Checkbox</label>
            <div class="row">
                <div class="col-sm-6"> <button type="button" id="btn1" class="btn btn-info btn-block"><img
                            src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px">&ensp;Add
                        option</button></div>

                <div class="col-sm-6"><button type="button" id="btn2" class="btn btn-primary btn-block"><img
                            src="{{asset('/img/check.png')}}" alt="" height="30px" width="30px">&ensp;Multiple
                        checkbox</button></div>
            </div> <br><br>
            <div id="hide1" class="bg-light">



                <br /> <br />
                <div class="row text-center">
                    <div class="col-sm-9 ">

                        <div class="">
                            @if( isset($data->options) )
                            <?php $i=0 ?>
                            <a href="javascript:void(0);" class="add_button btn btn-warning text-light mx-3 "
                                title="Add field" style="float:right;"><i class="fa fa-plus"></i>&ensp;Add More
                                field</a><br><br>
                            <?php foreach (json_decode($data->options)as $option){?>

                            <span class="d-flex my-3"> <img src="{{asset('/img/radio.png')}}" alt="" height="30px"
                                    width="30px"> <input type="text" name="option[{{$i}}]" class="form-control"
                                    value="{{$option}}" id="tt1"></span>
                            <?php $i++ ?>
                            @if($errors->has('option.'.$i))

                            <span class="help-block text-danger">

                                {{ $errors->first('option.' .$i)}}
                            </span>
                            @endif


                            <!-- <button class="deleteProduct btn btn-danger" data-id="{{ $data->id }}" data-token="{{ csrf_token() }}"data-value="{{ $option }}" >Remove</button> -->


                            <br />

                            <?php }?>
                            @endif
                        </div>
                        <div class="field_wrapper">

                        </div>



                    </div>
                </div>
            </div>



            <div id="hide2" class="bg-light">



                <br /> <br />
                <div class="row">
                    <div class="col-sm-9">

                        <!-- <img src="{{asset('/img/radio.png')}}" alt="" height="30px" width="30px"> -->
                        <div class="wrapper">
                            <div class="input-box ">
                                @if( isset($data->checkbox))
                                <?php $i=0 ?>
                                <button class="btn add-btn  btn-warning text-light mx-3" style="float:right;"><i
                                        class="fa fa-plus"></i>&ensp;Add More field</button>
                                <?php foreach (json_decode($data->checkbox)as $checkbox){?>

                                <span class="d-flex my-3"> <img src="{{asset('/img/check.png')}}" alt="" height="30px"
                                        width="30px"> <input type="text" id="tt2" class="form-control"
                                        name="checkbox[{{$i}}]" value="{{$checkbox}}"></span>
                                <?php $i++ ?>
                                @if($errors->has('checkbox.'.$i))

                                <span class="help-block text-danger">

                                    {{ $errors->first('checkbox.' .$i)}}
                                </span>
                                @endif
                                <?php }?>


                                @endif



                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" value="Update" class="btn btn-primary btn-block mt-5" style="float:right;">


        </form>



    </div>
</div>


<script type="text/javascript">

$(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="d-flex my-3"><input type="text" name="option[{{$i}}]" value=""class="form-control bg-light"/><a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="fa fa-minus"></i></a></div>'; //New input field html
        
         
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
 

    $(document).ready(function () {
        $('#btn1').click(function () {
            $('#tt2').attr('disabled', 'disabled');
            $("#hide2").css("display", "none");
            $('#tt1').removeAttr('disabled');
            $("#hide1").css("display", "block");

        });
        $('#btn2').click(function () {
            $('#tt2').removeAttr('disabled');
            $("#hide2").css("display", "block");
            $('#tt1').attr('disabled', 'disabled');
            $("#hide1").css("display", "none");


        });
    });
    $(document).ready(function () {

        // allowed maximum input fields
        var max_input = 5;

        // initialize the counter for textbox
        var x = 1;

        // handle click event on Add More button
        $('.add-btn').click(function (e) {
            e.preventDefault();
            if (x < max_input) { // validate the condition
                x++; // increment the counter
                $('.wrapper').append(`
       <div class="input-box d-flex my-3">
       <img src="{{asset('/img/check.png')}}" alt=""height="30px"width="30px">  <input type="text"class="form-control bg-light"  id="tt2"name="checkbox[]""/>
         <a href="#" class="remove-lnk btn btn-danger"><i class="fa fa-minus"></i></a>
       </div>
     `); // add input field
            }
        });

        // handle click event of the remove link
        $('.wrapper').on("click", ".remove-lnk", function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); // remove input field
            x--; // decrement the counter
        });

    });

</script>

@stop
