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
            memberProfileVideoTab.videoList.onVideoClick = editVideo;
            memberProfileVideoTab.isReady();
        });
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
        
        subModuleBody.find("#uploadNewVideo").click(function(){
            subModuleBody.find("#userVideoModal").openModal();
//            subModuleBody.find("#userVideoPlayer").hide();
            if(subModuleBody.find("#userVideoModal input[name=ID]").val()*1 === 0){
                resetUserVideoModal();
            }
        });
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
            var blob = dataURItoBlob(dataURI);
            var fd = new FormData(subModuleBody.find("#userVideoModal form")[0]);
            fd.append("canvasImage", blob);
            subModuleBody.find("#userVideoPlayer")[0].pause()
        });
        
        function dataURItoBlob(dataURI) {
            // convert base64/URLEncoded data component to raw binary data held in a string
            var byteString;
            if (dataURI.split(',')[0].indexOf('base64') >= 0)
                byteString = atob(dataURI.split(',')[1]);
            else
                byteString = unescape(dataURI.split(',')[1]);

            // separate out the mime component
            var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

            // write the bytes of the string to a typed array
            var ia = new Uint8Array(byteString.length);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }

            return new Blob([ia], {type:mimeString});
        }
        
        function resetUserVideoModal(){
            subModuleBody.find("#screenCapture").hide();
            subModuleBody.find("#userVideoModal form").trigger("reset");
            subModuleBody.find("#videoSelection video").attr("poster", asset_url("image/select_video.jpg"));
        }
        
        function editVideo(videoItem){
            console.log(videoItem)
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
            }, false)
        }
        
        memberProfileVideoTab.ready = function(){
            listUserVideo();
        };
        memberProfileVideoTab.isReady();
        
    };
</script>