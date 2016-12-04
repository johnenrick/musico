<script>
    var MemberProfileVideoTab = function(memberProfile){
        var memberProfileVideoTab = this;
        var moduleBody = memberProfile.body;
        init_sub_module(memberProfileVideoTab, memberProfile, moduleBody.find("#memberProfileVideoTab"));
        var subModuleBody = memberProfileVideoTab.body;
        memberProfileVideoTab.readyFlagValue = 2;
        $('ul.tabs').tabs();
        load_component("grid_list", function(){
            memberProfileVideoTab.videoList = new GridList(moduleBody.find("#videoUploaded")); 
            memberProfileVideoTab.videoList.onVideoItemClickFn = editVideo;
            memberProfileVideoTab.isReady();
        });
        var userVideoModalForm = new commonFormHandler(memberProfileVideoTab.userVideoModal, "c_user_video/createUserVideo", "c_user_video/updateUserVideo", "c_user_video/deleteUserVideo");
        userVideoModalForm.resetCallBack = resetUserVideoModal;
        userVideoModalForm.submitBeforeSubmit = function(data){
            if(memberProfileVideoTab.screenCaptureFile){
                var formData = new FormData();
                formData.append("thumbnail_userfile", memberProfileVideoTab.screenCaptureFile, "test.jpg");
                data.push({
                    name : "thumbnail_userfile",
                    required : true,
                    type: "file",
                    value : formData.get("thumbnail_userfile")
                })
            }
        };
        userVideoModalForm.submitUpdateSuccess = function(response){
            if(!response["error"].length){
                
            }
        };
        subModuleBody.find("#userVideoInput").change(function(){
            var URL = window.URL || window.webkitURL;
            var file = this.files[0];
            var type = file.type;
            var videoNode = subModuleBody.find("#userVideoPlayer")[0];
            var fileURL = URL.createObjectURL(file);
            videoNode.src = fileURL;
//            subModuleBody.find("#userVideoPlayer").show();
            subModuleBody.find("#screenCapture").show();
            subModuleBody.find("#screenCapture img").hide();
            subModuleBody.find("#videoSelection video").attr("poster", "");
        });
        memberProfileVideoTab.userVideoPlayer[0].oncanplay = function(){
            subModuleBody.find("#screenCapture button").trigger("click");
        };
        subModuleBody.find("#uploadNewVideo").click(function(){
            if(subModuleBody.find("#userVideoModal #userVideoInput").val() === ""){
                userVideoModalForm.createForm();
            }
            subModuleBody.find("#userVideoModal").openModal();
        });
        memberProfileVideoTab.screenCaptureFile = null;
        subModuleBody.find("#screenCapture button").click(function(){
            subModuleBody.find("#screenCapture img").show();
            var canvas = document.createElement('canvas');
            canvas.width = 640;
            canvas.height = 358;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(subModuleBody.find("#userVideoPlayer")[0], 0, 0, canvas.width, canvas.height);
            //convert to desired file format
            var dataURI = canvas.toDataURL('image/jpeg'); // can also use 'image/png'
            subModuleBody.find("#screenCapture img").attr("src", dataURI);
//            subModuleBody.find("#screenCapture input[name=thumbnail_userfile]").val(dataURI);
//            var blob = dataURItoBlob(dataURI);
            var blobBin = atob(dataURI.split(',')[1]);
            var array = [];
            for(var i = 0; i < blobBin.length; i++) {
                array.push(blobBin.charCodeAt(i));
            }
            memberProfileVideoTab.screenCaptureFile =new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
            subModuleBody.find("#userVideoPlayer")[0].pause()
        });
        
        function resetUserVideoModal(){
            memberProfileVideoTab.screenCaptureFile = null;
            subModuleBody.find("#screenCapture").hide();
            subModuleBody.find("#userVideoInput").show();
            subModuleBody.find("#videoSelection video").attr("src", "");
            subModuleBody.find("#videoSelection video").attr("poster", asset_url("image/select_video.jpg"));
        }
        
        function editVideo(videoItem){
            userVideoModalForm.updateForm();
            subModuleBody.find("#userVideoInput").hide();
            var parameter = {
                ID : videoItem.attr("user_video_ID")
            };
            api_request("C_user_video/retrieveUserVideo", parameter, function(response){
                if(!response["error"].length){
                    memberProfileVideoTab.userVideoPlayer.attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["file_uploaded_description"]));
                    memberProfileVideoTab.userVideoPlayer.attr("poster", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["thumbnail_file_uploaded_description"]));
                    memberProfileVideoTab.screenCapture.attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["thumbnail_file_uploaded_description"]));
                    userVideoModalForm.formValue(response["data"]);
                }else{
                    system_console(response);
                }
            });
            subModuleBody.find("#userVideoModal").openModal();
        }
        function listUserVideo(){
            memberProfileVideoTab.videoList.empty();
            var param = {
                condition : {
                    account_ID : memberProfile.accountID
                }
            }
            memberProfileVideoTab.videoList.loadingVideoItem();
            api_request("c_user_video/retrieveUserVideo", param, function(response){
                memberProfileVideoTab.videoList.addItemList(response["data"]);
            }, false);
            
        }
        
        memberProfileVideoTab.ready = function(){
            listUserVideo();
        };
        memberProfileVideoTab.isReady();
        
    };
</script>