<script>
    function commonFormHandler(formElement, createLink, updateLink, deleteLink){
        var formHandler = this;
        formHandler.formElement = formElement;
        formHandler.formMode = "";//create or update
        //Event binding
        formElement.ajaxForm({
            beforeSubmit : function(data,$form,options){
                clear_form_error(formElement);
                formElement.find(".formActionButton button").attr("disabled", true);
                formHandler.submitBeforeSubmit(data);
            },
            success : function(data){
                var response = JSON.parse(data);
                if(response["error"].length){
                    show_form_error(formElement, response["error"]);
                }else{
                    formElement.find(".formActionButton .label-success").show();
                }
                if(formHandler.formMode === "create"){
                    formHandler.submitCreateSuccess(response);
                }else{
                    formHandler.submitUpdateSuccess(response);
                }
                formElement.find(".formActionButton button").attr("disabled", false);
            }
        });
        formElement.find(".formActionButton").on("click", "button", function(){
            switch($(this).attr("action")){
                case "delete":
                    formElement.find(".formActionButton button[action=delete_yes]").show();
                    formElement.find(".formActionButton button[action=delete_no]").show();
                    formElement.find(".formActionButton button[action=delete]").hide();
                    formElement.find(".formActionButton label[action=delete_confirmation]").show();
                    break;
                case "delete_yes":
                    deleteForm();
                    break;
                    
            }
        });
        
        /*Function*/
        formHandler.reset = function(){
            formElement.trigger("reset");
            clear_form_error(formElement);
            formElement.find(".formActionButton button, .formActionButton label").hide();
            formElement.find(".formActionButton button[action=delete]").show();
            formElement.find(".formActionButton button[action=cancel]").show();
            formElement.find(".formActionButton button[action=submit]").show();
        };
        formHandler.createForm = function(){
            formHandler.reset();
            formElement.attr("action", api_url(createLink));
            changeFieldName("create", formElement);
            formHandler.formMode = "create";
        };
        formHandler.updateForm = function(){
            formHandler.reset();
            formHandler.attr("action", api_url(updateLink));
            changeFieldName("update", formElement);
            formHandler.formMode = "update";
        };
        formHandler.deleteForm = function(){
            api_request(deleteLink, {ID : formElement.find("input[name=ID]").val()}, function(data){
                var response = JSON.parse(data);
                
            });
        };
        
        formHandler.submitBeforeSubmit = function(data){
            
        };
        formHandler.submitCreateSuccess = function(response){
            
        };
        formHandler.submitUpdateSuccess = function(response){
            
        };
        function deleteForm = function(){
            formElement.find(".formActionButton button").attr("disabled", true);
            api_request(api_request(deleteLink), {}, function(data){
                var response = JSON.oarse(data);
                formElement.find(".formActionButton button").attr("disabled", false);
            });
        }
        return formHandler;
    }
</script>