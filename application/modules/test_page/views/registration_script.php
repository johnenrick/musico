<script type="text/javascript">
load_asset("js/jquery.form.min.js");
// $("#registrationMessage").hide();
$("#registrationForm").attr('action',api_url("C_account/createAccount"));
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
     $('.modal-trigger').leanModal({
     	size: 'small',
      	dismissible: true, // Modal can be dismissed by clicking outside of the modal
      	opacity: .5, // Opacity of modal background
      // in_duration: 300, // Transition in duration
      // out_duration: 200, // Transition out duration
      // ready: function() { alert('Ready'); }, // Callback for Modal open
      // complete: function() { alert('Closed'); } // Callback for Modal close
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

