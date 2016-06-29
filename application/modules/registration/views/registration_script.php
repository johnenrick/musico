<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    /*Global Variable for this module. This is also the moduleName*/
    var registrationModule = function(){
        registrationModule = this;
        function testing(){
            $.confirm({
                title: 'Confirm!',
                content: 'Simple confirm!'
            });
        }
    };
    
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    load_asset("jquery.form.min.js");+
    load_asset("registration.css");
    load_asset("core/custom/materialize_modal.css");

    $(document).ready(function(){
        var test = new registrationModule();
    });
    // $("#registrationMessage").hide();
    $("#registrationForm").attr('action',api_url("C_account/createAccount"));
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $("#registrationModal").attr("opacity",1);
        $("#modal").click(function(){
            $('#registrationModal').openModal();
      });

      //register
    $("#registrationForm").ajaxForm({
        beforeSubmit: function(){
            clear_form_error($("#registrationForm"));
        },
        success : function(data){
            var response = JSON.parse(data);
            console.log(response)
            if(!response["error"].length){
                $(".hide-module:not(#success-module)").hide();
                   $("#success-module").fadeIn();
                   $("#registrationNumberMessage").show();
            }else{
                 show_form_error($("#registrationForm"), response["error"]);
            console.log(response["error"]);
            }
        }
    });
    });


</script>

