<script type="text/javascript">
load_asset("js/jquery.form.min.js");
// $("#registrationMessage").hide();
$("#registrationForm").attr('action',api_url("C_account/createAccount"));

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
