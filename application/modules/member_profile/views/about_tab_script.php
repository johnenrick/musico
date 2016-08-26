<script>
    load_asset("module/member_profile_home_tab.css");
    var MemberProfileAboutTab = function(memberProfile){
        var memberProfileAboutTab = this;
        var moduleBody = memberProfile.body;
        var subModuleBody = moduleBody.find("#memberProfileAboutTab");
        $('ul.tabs').tabs();
        if(memberProfile.accountID === user_id()){//viewing own profile
            subModuleBody.find(".profileSetting").show();
        }else{
            subModuleBody.find(".profileView").show();
        }
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
        retrieveAccountDetail();
        function retrieveAccountDetail(){
            changeFieldName("update", subModuleBody.find(".profileSetting form"));
            memberProfile.body.find(".profileFullName").text("");
            memberProfile.body.find(".profileEmail").text("");
            memberProfile.body.find(".profileCountry").text("");
            memberProfile.body.find(".profileBiography").text("");
            api_request("c_account/retrieveAccount", {ID: memberProfile.accountID, additional_data : {account_biography : true, account_cover_photo : true}}, function(response){
                if(!response["error"].length){
                    console.log(response);
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
                    memberProfile.body.find("#profile-header").css("background-image", "url("+asset_url("user_upload/"+response["data"]["ID"]+"/"+response["data"]["account_cover_photo_file_uploaded_description"])+")");
                    memberProfile.body.find(".profileEmail").text(response["data"]["email_address"]);
                    memberProfile.body.find(".profileCountry").text(response["data"]["country"]);
                    memberProfile.body.find(".profileBiography").text(response["data"]["account_biography_ID"]*1 ? response["data"]["account_biography_detail"] : "");
                }else{
                    
                }
            }, false);
        }
    };
</script>