<script>
    load_asset("jquery.form.min.js");
    $(document).ready(function(){
        $(".contactPageLink").click(function(){
            $("#contactPage").openModal();
        });
        $("#contactPageForm").attr("action", base_url("system_application/sendContactMessage"));
        $("#contactPageForm").ajaxForm({
            beforeSubmit : function(){
                $("#contactPageForm button").toggleClass("disabled")
            },
            success : function(data){
               console.log(data);
            }
        });
    });
</script>