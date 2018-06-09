
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

    $(function(){
        $("#submitButtonRegister").bind({
            click: function(event){
                if($("#id").val() != $("#id2").val()){
                    event.preventDefault();
                    $("#warning").html("<strong>Warning!</strong> Password needs to be the same as you retype it!")
                    $("#warning").show();
                }
                else{
                    $("#warning").unbind('click').click();
                    $("#warning").hide();
                }
            }
        });
    });


    $(function(){
        $(".check").keypress(function(){
            if($(this).val().match(/[^a-zA-Z\D\s:]/)){
                $("#warning").html("<strong>Warning!</strong> Name cannot have non-word characters!");
                $("#warning").show();
            }
            else
            {
                $("#warning").hide();
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