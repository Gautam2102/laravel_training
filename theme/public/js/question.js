
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var editorId = 'editor_' +x;
            $(wrapper).append('<div> <textarea id="'+editorId+'" class="ckeditor" name="ck[]"></textarea><a href="#" class="remove_field">Remove</a></div>'); //add input box
            $('#form_div').append('#display_div');
            CKEDITOR.replace(editorId, { height: 200 });
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div class="d-flex my-3"> <img src="{{asset('/img/radio.png')}}" alt=""height="30px"width="30px"><input type="text" name="option[{{$i}}]" value=""class="form-control bg-light"/><a href="javascript:void(0);" class="remove_button btn btn-danger"><i class="fa fa-minus"></i></a></div>'; //New input field html
        
         
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
       <img src="{{asset('/img/check.png')}}" alt=""height="30px"width="30px">  <input type="text"class="form-control bg-light"  id="tt2"name="checkbox[{{$i}}]""/>
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