<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("cropper.min.css");
    load_asset("cropper.min.js");
    
    /*Module Object*/
    var MemberProfile  = function(){
        var memberProfile = this;//instance of the module
        var moduleBody = memberProfile.body = $("#memberProfile");
        memberProfile.accountID = "<?=$account_ID?>"*1;
        
        var defaultTab = window.location.href.split("#");
        /*Load Tabs*/
        load_sub_module("member_profile/homeTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileHomeTab(memberProfile);
            moduleBody.find('ul.tabs').tabs('select_tab', '#'+defaultTab[1]);
        });
        load_sub_module("member_profile/aboutTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileAboutTab(memberProfile);
        });
        load_sub_module("member_profile/videoTab", function(data){
            moduleBody.find(".tabContent").append(data);
            new MemberProfileVideoTab(memberProfile);
        });
        /*Profile Cover*/
        moduleBody.find(".changeProfileCover").click(function(){
            moduleBody.find("#profileCoverPhotoModal").openModal({
                ready : function(){
                    moduleBody.find("#coverPhotoPreview img").attr("src", asset_url("image/sample-header.jpg"));
                    moduleBody.find(".fixed-dragger-cropper > img").cropper({
//                        autoCropArea: 0.6, // Center 60%
                        aspectRatio : 5,
                        minCanvasHeight : 320,
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
                    moduleBody.find(".fixed-dragger-cropper > img").cropper("destroy");
                }
            });
        });
        moduleBody.find(".saveCover").click(function(){
            var imageData = moduleBody.find(".fixed-dragger-cropper > img").cropper("getCroppedCanvas").toDataURL('image/jpeg');
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
                    console.log(data);
                },
                error: function () {
                    console.log('Upload error');
                }
            });
        
        });
        
       
        /**/
        memberProfile.reload = function(){//function to run if the module is already been loaded
            
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.memberProfile = new MemberProfile();
    });
</script>