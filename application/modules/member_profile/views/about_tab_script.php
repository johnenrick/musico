<script>
    load_asset("module/member_profile_home_tab.css");
    var MemberProfileAboutTab = function(memberProfile){
        var memberProfileAboutTab = this;
        var moduleBody = memberProfile.body;
        var subModuleBody = moduleBody.find("#memberProfileAboutTab");
        
        subModuleBody.find(".profileSettingForm").attr("action", api_url("c_account/updateAccount"));
        subModuleBody.find(".profileSettingForm").ajaxForm({
            beforeSubmit: function(data,$form,options){
                removeFormDataValue("update_data[account__password]", data);
                if(subModuleBody.find(".profileSetting input[field_name=email_address]").attr("current_value") === subModuleBody.find(".profileSetting input[field_name=email_address]").val()){
                    removeFormDataValue("update_data[email_address]", data);
                }
                clear_form_error(subModuleBody.find(".profileSettingForm"));
            },
            success : function(data){
                var response = JSON.parse(data);
                if(!response["error"].length){
                    retrieveAccountDetail();
                    subModuleBody.find(".profileSettingForm .formLabelIndicator.label-success").show();
                }else{
                    show_form_error(subModuleBody.find(".profileSettingForm"), response["error"]);
                }
            }
        });
        subModuleBody.find(".profileSetting form button[type=reset]").click(function(){
            retrieveAccountDetail();
            clear_form_error(subModuleBody.find(".profileSettingForm"));
        });
        
        
        function retrieveAccountDetail(){
            changeFieldName("update", subModuleBody.find(".profileSetting form"));
            memberProfile.body.find(".profileFullName").text("");
            memberProfile.body.find(".profileEmail").text("");
            memberProfile.body.find(".profileCountry").text("");
            memberProfile.body.find(".profileBiography").text("");
            api_request("c_account/retrieveAccount", {ID: memberProfile.accountID, additional_data : {account_biography : true, account_cover_photo : true, account_profile_photo : true}}, function(response){
                if(!response["error"].length){
                    /*Profile Setting*/
                    subModuleBody.find(".profileSetting input[name=ID]").val(response["data"]["ID"]);
                    subModuleBody.find(".profileSetting input[field_name=first_name]").val(response["data"]["first_name"]);
                    subModuleBody.find(".profileSetting input[field_name=middle_name]").val(response["data"]["middle_name"]);
                    subModuleBody.find(".profileSetting input[field_name=last_name]").val(response["data"]["last_name"]);
                    subModuleBody.find(".profileSetting input[field_name=country]").val(response["data"]["country"]);
                    subModuleBody.find(".profileSetting input[field_name=email_address]").val(response["data"]["email_address"]);
                    subModuleBody.find(".profileSetting input[field_name=email_address]").attr("current_value", response["data"]["email_address"]);
                    subModuleBody.find(".profileSetting input[name='condition[account_biography__ID]']").val(response["data"]["account_biography_ID"]);
                    subModuleBody.find(".profileSetting textarea[field_name=account_biography__detail]").val(response["data"]["account_biography_detail"]);
                    /*Profile View*/
                    memberProfile.body.find(".profileFullName").text(response["data"]["first_name"]+" "+response["data"]["middle_name"]+" "+response["data"]["last_name"]);
                    memberProfile.body.find(".profileEmail").text(response["data"]["email_address"]);
                    memberProfile.body.find(".profileCountry").text(response["data"]["country"]);
                    memberProfile.body.find(".profileBiography").text(response["data"]["account_biography_ID"]*1 ? response["data"]["account_biography_detail"] : "");
                    if(response["data"]["account_cover_photo_ID"]*1){
                        memberProfile.body.find("#profile-header").css("background-image", "url("+asset_url("user_upload/"+response["data"]["ID"]+"/"+response["data"]["account_cover_photo_file_uploaded_description"])+")");
                    }
                    if(response["data"]["account_profile_photo_ID"]*1){
                        memberProfile.body.find("#profile-header  .pro-info img").attr("src", asset_url("user_upload/"+response["data"]["ID"]+"/"+response["data"]["account_profile_photo_file_uploaded_description"]))
                    }
                }else{
                    
                }
            }, false);
        }
        memberProfileAboutTab.retrieveAccountDetail = retrieveAccountDetail;
        subModuleBody.find(".modifyPassword").click(function(){
            subModuleBody.find(".passwordModification").show();
            subModuleBody.find(".modifyPassword").hide();
        });
        subModuleBody.find("button.passwordModification").click(function(){
            if($(this).attr("action_id")*1 === 1){//save
                
            }else{//cancel
                subModuleBody.find(".passwordModification").hide();
                subModuleBody.find(".passwordModification input").val("");
                subModuleBody.find(".modifyPassword").show();
            }
        });
        subModuleBody.find(".passwordModification input").keyup(function(e){
            if(subModuleBody.find(".passwordModification input[field_name=account__password]").val() !== subModuleBody.find(".passwordModification input[field_name=account__verify_password]").val() && subModuleBody.find(".passwordModification input[field_name=account__verify_password]").val() !== ""){
                $(this).addClass("invalid");
                
            }else{
                subModuleBody.find(".passwordModification input").removeClass("invalid");
            }
        });
        subModuleBody.find(".accountAuthentication form").attr("action", api_url("C_account/updateAccount"));
        subModuleBody.find(".accountAuthentication form").ajaxForm({
            beforeSubmit : function(data,$form,options){
                if(subModuleBody.find(".passwordModification input[field_name=account__password]").val() !== subModuleBody.find(".passwordModification input[field_name=account__verify_password]").val()){
                    subModuleBody.find(".passwordModification input[field_name=account__verify_password]").addClass("invalid");
                    return false;
                }
                data.splice(0,1);
                data.push({
                    name : "ID",
                    value : user_id()
                });
            },
            success : function(data){
                var response = JSON.parse(data);
                if(!response["error"].length){
                    subModuleBody.find(".accountAuthentication .formLabelIndicator.label-success").show();
                }else{
                    show_form_error(subModuleBody.find(".accountAuthentication form"), response["error"]);
                }
            }
        })
        memberProfileAboutTab.ready = function(){
            if(memberProfile.accountID === user_id()){//viewing own profile
                subModuleBody.find(".profileSetting").show();
                subModuleBody.find(".profileView").hide();
            }else{
                subModuleBody.find(".profileView").show();
                subModuleBody.find(".profileSetting").hide();
            }
            retrieveAccountDetail();
            subModuleBody.find(".passwordModification").hide();
        }
    };
</script>