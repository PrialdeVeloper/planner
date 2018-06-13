
(function ($) {
    "use strict";


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);


    $(function(){
        $("#date").bind({
            focusin: function(){
                $(this).attr('type', 'date');
                $(this).trigger('click');
            },

            focusout: function(){
                $(this).attr('type','text');
            }
        });
    });

    // $(function(){
    //     $("#submitButtonRegister").bind({
    //         click: function(event){
    //             if($("#id").val() != $("#id2").val()){
    //                 event.preventDefault();
    //                 $("#warning").html("<strong>Warning!</strong> Password needs to be the same as you retype it!")
    //                 $("#warning").show();
    //             }
    //             else{
    //                 $("#warning").unbind('click').click();
    //                 $("#warning").hide();
    //             }
    //         }
    //     });
    // });


    $(function(){
        $( "button[type=submit]" ).bind({
            click: function(event){
                var count = 0;
                $( "input" ).each(function( index ) {
                    if(($("#id").val() != $("#id2").val()) || ($("#id").val() == "" || $("#id2").val() == "")){
                        $("#warning").html("<strong>Warning!</strong> Password needs to be the same as you retype it! Please go back and fix it");
                        $("#warning").show();
                        count = 1;
                    }
                    var nameInput = $(".fname").val();
                    if($(".fname").val() == "" || nameInput.match(/[^a-zA-Z\D\s:]/)){
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please click previous and make sure your name has no unneccessary characters! ");
                        $("#warning").show();
                        count = 1;
                    }
                    if($("#date").val() == "" || isNaN(Date.parse($("#date").val()))){
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please click previous and check if date is in Date format ");
                        $("#warning").show();
                        count = 1;
                    }
                    var emailInput = $("input[placeholder=Email]").val();
                    if($("input[placeholder=Email]").val() == "" || emailInput.match(/^((?!@).)*$/)){
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please click previous and input email on proper format!(e.g yourname@youremail.com)");
                        $("#warning").show();
                        count = 1;
                    }
                    if($("#imageInput").get(0).files.length === 0){
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please choose an image as your profile picture! ");
                        $("#warning").show();
                        count = 1;
                    }
                    var file = $("#imageInput")[0].files[0];
                    var typeCheck = file.type;
                    var ValidImageTypes = ["image/jpeg", "image/png"];
                    if ($.inArray(typeCheck, ValidImageTypes) < 0) {
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please choose real image for your profile! ");
                        $("#warning").show();
                        count = 1;
                    }
                    var file = $("#imageInput")[0].files[0];
                    var imageSize = file.size;
                    if (imageSize >  5000000) {
                        $("#warning").hide();
                        $("#warning").html("<strong>Warning!</strong> Please choose an image which is less than 5mb!");
                        $("#warning").show();
                        count = 1;
                    }

                    switch($(".select").val()){
                        case 'male':
                            break;
                        case 'female':
                            break;
                        case 'others':
                            break;
                        case 'not':
                            break;
                        default:
                            $("#warning").hide();
                            $("#warning").html("<strong>Warning!</strong> Please select only from gender choices!");
                            $("#warning").show();
                            count = 1;
                    }
                });
                if(count > 0 ){
                    event.preventDefault();
                }
                else
                    if(count = 0){
                    $("#warning").hide();
                    $("#regForm").unbind('submit').submit();
                }
            }
        });
    });

    $(document).on('click', '.browse', function(){
            var file = $(this).parent().parent().parent().find('.file');
            file.trigger('click');
        });
        $(document).on('change', '.file', function(){
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });


function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#previewImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imageInput").change(function(){
    readURL(this);
});