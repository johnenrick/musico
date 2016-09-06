<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("cropper.min.css");
    load_asset("cropper.min.js");
    
    /*Module Object*/
    var MemberProfile  = function(){
        var memberProfile = this;//instance of the module
        var moduleBody = memberProfile.body = $("#memberProfile");
        
        
        var readyFlag = 0;
        var readyFlagValue = 7;
        /*Load Tabs*/
        load_sub_module("member_profile/homeTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileHomeTab(memberProfile);
            readyFlag += 1;
            if(readyFlag === readyFlagValue){
                memberProfile.ready();
            }
        });
        load_sub_module("member_profile/aboutTab", function(data){
            moduleBody.find(".tabContent").append(data);
            memberProfile.aboutTab =  new MemberProfileAboutTab(memberProfile);
            readyFlag += 2;
            if(readyFlag === readyFlagValue){
                memberProfile.ready();
            }
        });
        load_sub_module("member_profile/videoTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileVideoTab(memberProfile);
            readyFlag += 4;
            if(readyFlag === readyFlagValue){
                memberProfile.ready();
            }
        });
        /*Profile Cover*/
        moduleBody.find(".changeProfileCover").click(function(){
            moduleBody.find("#profileCoverPhotoModal .label-info").hide();
            moduleBody.find("#profileCoverPhotoModal .label-danger").hide();
            moduleBody.find("#profileCoverPhotoModal").openModal({
                ready : function(){
                    moduleBody.find("#coverPhotoPreview img").attr("src", moduleBody.find("#profile-header").css("background-image").replace('url("',"").replace('")',""));
                    moduleBody.find("#coverPhotoPreview.fixed-dragger-cropper > img").cropper({
//                        autoCropArea: 0.6, // Center 60%
                        aspectRatio : 5,
//                        minCanvasHeight : 320,
                        multiple: false,
                        dashed: false,
                        zoomable : false,
                        minCropBoxHeight : 100,
                        built: function () {
                            $(this).cropper('setCropBoxData',{
                                width : moduleBody.find("#coverPhotoPreview").width()
                            });
                        }
                    });
                },
                complete : function(){
                    moduleBody.find("#coverPhotoPreview.fixed-dragger-cropper > img").cropper("destroy");
                }
            });
        }); 
        moduleBody.find("#profileCoverPhotoModal .saveCover").click(function(){
            moduleBody.find("#profileCoverPhotoModal .label-info").show();
            moduleBody.find("#profileCoverPhotoModal .label-danger").hide();
            moduleBody.find("#profileCoverPhotoModal .saveCover").attr("disabled", true);
            var imageData = moduleBody.find("#coverPhotoPreview.fixed-dragger-cropper > img").cropper("getCroppedCanvas", {height:320 }).toDataURL('image/jpeg');
            var blobBin = atob(imageData.split(',')[1]);
            var array = [];
            for(var i = 0; i < blobBin.length; i++) {
                array.push(blobBin.charCodeAt(i));
            }
            var file=new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
            var formData = new FormData();
            formData.append('userfile', file, "tae.jpg");
            formData.append('type', 2);
            $.ajax(api_url("C_account_photo/createAccountPhoto"), {
                method: "POST",
                headers: {
                    Accept : "charset=utf-8",
                    enctype:'multipart/form-data'
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    var response = JSON.parse(data);
                    
                    if(!response["error"].length){
                        memberProfile.aboutTab.retrieveAccountDetail();
                        moduleBody.find("#profileCoverPhotoModal").closeModal();
                        
                    }else{
                        moduleBody.find("#profileCoverPhotoModal .label-danger").show();
                        moduleBody.find("#profileCoverPhotoModal .label-danger").text(response["error"][0]["message"]);
                    }
                    moduleBody.find("#profileCoverPhotoModal .label-info").hide();
                    moduleBody.find("#profileCoverPhotoModal .saveCover").attr("disabled", false);
                }
            });
        
        });
        moduleBody.find("#profileCoverPhotoModal input[type=file]").change(function () {
            moduleBody.find("#profileCoverPhotoModal .label-danger").hide();
            moduleBody.find("#profileCoverPhotoModal .label-info").show();
            moduleBody.find("#profileCoverPhotoModal input[type=file]").attr("disabled", true);
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    moduleBody.find("#coverPhotoPreview.fixed-dragger-cropper > img").cropper("replace",e.target.result);
                    moduleBody.find("#profileCoverPhotoModal input[type=file]").attr("disabled", false);
                    moduleBody.find("#profileCoverPhotoModal .label-info").hide();
                };
                reader.readAsDataURL(input.files[0]);
                
            }
        });
        /*Profile Photo*/
        moduleBody.find(".changeProfilePhoto").click(function(){
            moduleBody.find("#profilePhotoModal .label-info").hide();
            moduleBody.find("#profilePhotoModal .label-danger").hide();
            moduleBody.find("#profilePhotoModal").openModal({
                ready : function(){
                    moduleBody.find("#profilePhotoPreview img").attr("src", moduleBody.find(".pro-info img").attr("src"));
                    moduleBody.find("#profilePhotoPreview.fixed-dragger-cropper > img").cropper({
//                        autoCropArea: 0.6, // Center 60%
                        aspectRatio : 1 ,
//                        minCanvasHeight : 320,
                        multiple: false,
                        dashed: false,
                        zoomable : false,
                        minCropBoxHeight : 100,
                        built: function () {
                            $(this).cropper('setCropBoxData',{
                                width : moduleBody.find("#profilePhotoPreview").width()
                            });
                        }
                    });
                },
                complete : function(){
                    moduleBody.find(".fixed-dragger-cropper > img").cropper("destroy");
                }
            });
        }); 
        moduleBody.find("#profilePhotoModal .savePhoto").click(function(){
            moduleBody.find("#profilePhotoModal .label-info").show();
            moduleBody.find("#profilePhotoModal .label-danger").hide();
            moduleBody.find("#profilePhotoModal .savePhoto").attr("disabled", true);
            var imageData = moduleBody.find("#profilePhotoPreview.fixed-dragger-cropper > img").cropper("getCroppedCanvas", {height:320 }).toDataURL('image/jpeg');
            var blobBin = atob(imageData.split(',')[1]);
            var array = [];
            for(var i = 0; i < blobBin.length; i++) {
                array.push(blobBin.charCodeAt(i));
            }
            var file=new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
            var formData = new FormData();
            
            formData.append('userfile', file, "tae.jpg");
            formData.append('type', 1);
            
            $.ajax(api_url("C_account_photo/createAccountPhoto"), {
                method: "POST",
                headers: {
                    Accept : "charset=utf-8",
                    enctype:'multipart/form-data'
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    var response = JSON.parse(data);
                    if(!response["error"].length){
                        memberProfile.aboutTab.retrieveAccountDetail();
                        moduleBody.find("#profilePhotoModal").closeModal();
                    }else{
                        moduleBody.find("#profilePhotoModal .label-danger").show();
                        moduleBody.find("#profilePhotoModal .label-danger").text(response["error"][0]["message"]);
                    }
                    moduleBody.find("#profilePhotoModal .label-info").hide();
                    moduleBody.find("#profilePhotoModal .savePhoto").attr("disabled", false);
                }
            });
        
        });
        moduleBody.find("#profilePhotoModal input[type=file]").change(function () {
            moduleBody.find("#profilePhotoModal .label-danger").hide();
            moduleBody.find("#profilePhotoModal .label-info").show();
            moduleBody.find("#profilePhotoModal input[type=file]").attr("disabled", true);
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    moduleBody.find("#profilePhotoPreview.fixed-dragger-cropper > img").cropper("replace",e.target.result);
                    moduleBody.find("#profilePhotoModal input[type=file]").attr("disabled", false);
                    moduleBody.find("#profilePhotoModal .label-info").hide();
                };
                reader.readAsDataURL(input.files[0]);
                
            }
        });
        
        moduleBody.find("#profile-header").on("mouseenter", function(){
            if(memberProfile.accountID === user_id()){
                moduleBody.find("#profile-header .changeProfileCover").show();
                moduleBody.find("#profile-header .changeProfilePhoto").show();
            } 
        }).on("mouseleave", function(){
            if(memberProfile.accountID === user_id()){
                moduleBody.find("#profile-header .changeProfileCover").hide();
                moduleBody.find("#profile-header .changeProfilePhoto").hide();
            }
        });
        
        /*Subscription*/
        function subscriptionDetail(){
            //subscriber count
            api_request("C_subscription/retrieveSubscription", {subscribed_account_ID : memberProfile.accountID}, function(response){
                if(!response["error"].length){
                    moduleBody.find(".subscriptionCount").text(response["data"].length);
                }else{
                    moduleBody.find(".subscriptionCount").text("");
                }

            });
            //subscription button
            moduleBody.find(".unSubscriptionButton").hide();
            moduleBody.find(".subscriptionButton").hide();
            if(memberProfile.accountID !== user_id()){
                var dataFilter = {
                    subscribed_account_ID : memberProfile.accountID,
                    condition : {
                        subscriber_account_ID : user_id()*1
                    }
                };
                api_request("C_subscription/retrieveSubscription", dataFilter, function(response){
                    if(!response["error"].length){
                        moduleBody.find(".unSubscriptionButton").show();

                    }else{
                        moduleBody.find(".subscriptionButton").show();
                    }

                }, false);
            }
        }
        moduleBody.find(".subscriptionButton").click(function(){
            api_request("C_subscription/createSubscription", {subscribed_account_ID : memberProfile.accountID}, function(response){
                if(!response["error"].length){
                    subscriptionDetail();
                }else{
                }

            });
        });
        moduleBody.find(".unSubscriptionButton").click(function(){
            var dataFilter = {
                    
                    condition : {
                        subscribed_account_ID : memberProfile.accountID,
                        subscriber_account_ID : user_id()*1
                    }
                };
            api_request("C_subscription/deleteSubscription", dataFilter, function(response){
                if(!response["error"].length){
                    subscriptionDetail();
                }else{
                }

            });
        });
        
        /**/
        
        memberProfile.ready = function(){//function to run if the module is already been loaded
            var defaultTab = window.location.href.split("#");
            $('ul.tabs').tabs();
            moduleBody.find('ul.tabs').tabs('select_tab', defaultTab[1]);
            var urlParameter = getURLParameter("member_profile/index");
            console.log(urlParameter[0])
            memberProfile.accountID = urlParameter !== false ? urlParameter[0]*1 : 0;
            memberProfile.accountID = (memberProfile.accountID*1 === 0 ) ? user_id() : memberProfile.accountID;
            console.log(memberProfile.accountID)
            subscriptionDetail();
            memberProfile.aboutTab.ready();
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.memberProfile = new MemberProfile();
    });
</script>