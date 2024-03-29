<script>
    var commonFormHandler = function(formElement, createLink, updateLink, deleteLink){
        var formHandler = this;
        formElement = (formElement[0].tagName === "FORM") ? formElement : formElement.find("form");
        formHandler.formElement = formElement;
        formHandler.formMode = "";//create or update
        if(formHandler.formElement.attr("method") === ""){
            formHandler.formElement.attr("method", "POST"); 
        }
        //Event binding
        formElement.ajaxForm({
            beforeSubmit : function(data,$form,options){
                clear_form_error(formElement);
                formElement.find(".formActionButton button").attr("disabled", true);
                formHandler.submitBeforeSubmit(data);
                console.log(data)
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
                case "delete_no":
                    formElement.find(".formActionButton button[action=delete_yes]").hide();
                    formElement.find(".formActionButton button[action=delete_no]").hide();
                    formElement.find(".formActionButton button[action=delete]").show();
                    formElement.find(".formActionButton label[action=delete_confirmation]").hide();
                    break;
                    
            }
        });
        
        /*Function*/
        formHandler.resetCallBack = null;
        formHandler.reset = function(){
            formElement.trigger("reset");
            clear_form_error(formElement);
            formElement.find(".formActionButton button, .formActionButton label").hide();
            formElement.find(".formActionButton button[action=delete]").show();
            formElement.find(".formActionButton button[action=cancel]").show();
            formElement.find(".formActionButton button[action=submit]").show();
            if(formHandler.resetCallBack !== null){
                formHandler.resetCallBack;
            }
        };
        formHandler.createForm = function(callbackFn){
            formHandler.reset();
            console.log(createLink)
            formElement.attr("action", api_url(createLink));
            console.log(formElement)
            changeFieldName("create", formElement);
            formElement.find(".formActionButton button[action=delete]").hide();
            formHandler.formMode = "create";
            if(typeof callbackFn !== "undefined"){
                callbackFn()
            }
        };
        formHandler.updateForm = function(){
            formHandler.reset();
            formElement.attr("action", api_url(updateLink));
            changeFieldName("update", formElement);
            formElement.find(".formActionButton button[action=delete]").show();
            formHandler.formMode = "update";
        };
        
        
        formHandler.submitBeforeSubmit = function(data){
            
        };
        formHandler.submitCreateSuccess = function(response){
            
        };
        formHandler.submitUpdateSuccess = function(response){
            
        };
        formHandler.submitDeleteSuccess = function(response){
            
        }
        function deleteForm(){
            formElement.find(".formActionButton button").attr("disabled", true);
            api_request(deleteLink, {ID : formElement.find("input[name=ID]").val()}, function(response){
                if(!response["error"].length){
                    formHandler.submitDeleteSuccess(response);
                }else{
                    formElement.find(".formActionButton .label-danger").show()
                }
                formElement.find(".formActionButton button[action=delete_yes]").hide();
                formElement.find(".formActionButton button[action=delete_no]").hide();
                formElement.find(".formActionButton button[action=delete]").show();
                formElement.find(".formActionButton label[action=delete_confirmation]").hide();
                formElement.find(".formActionButton button").attr("disabled", false);
            });
        }
        formHandler.formValue = function(data, formulatedData){
            for(var x in data){
                formElement.find("input[name="+x+"]").val(data[x]).trigger("change");
                formElement.find("input[field_name="+x+"]").val(data[x]).trigger("change");
                formElement.find("textarea[field_name="+x+"]").val(data[x]).trigger("change");
                formElement.find("textarea[field_name="+x+"]").val(data[x]).trigger("change");
            }
        }
        
        formHandler.reset();
        return formHandler;
    }
</script>