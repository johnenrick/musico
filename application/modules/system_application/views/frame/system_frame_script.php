<script>
    /*global system_data, systemApplication*/
    function setSystemFrameCredential(){
        if(user_id()){//Log In
            $(".headerLogin").hide();//Header Log In button
            $(".headerAuthentication").hide();//Header Join button
            $(".sidebarAuthentication").hide();//Sidebar athentication
            $(".playlistSidebar").show();//Playlist sidebar
            if(user_type() === 4){
                $(".adminSidebar").show();//Admin sidebar
            }
            var imageLink = asset_url("image/profpic.jpg");
            if(system_data.account_information.profile_photo_link){
                imageLink = asset_url("user_upload/"+user_id()+"/"+system_data.account_information.profile_photo_link);
            }
            $(".profilePhoto").attr("src", imageLink);
            $(".userFullName").text(user_first_name()+" "+user_middle_name()+" "+user_last_name());
            $("#profile-btn").show();
           
        }else{//Log Out
            $(".headerLogin").show();//Header Log In button
            $(".headerAuthentication").show();//Header Join button
            $(".sidebarAuthentication").show();//Sidebar athentication
            $(".playlistSidebar").hide();//Playlist sidebar
            $(".adminSidebar").hide();//Admin sidebar
            $("#profile-btn").hide();
        }
    }
    
    /***
     * Call the refresh function of the module
     * @param {String} moduleName Name of the module to be refreshed
     * @returns {undefined}
     */
    function refresh_call(moduleName){
        if(typeof system_data.refresh_call[moduleName] !== "undefined"){
            for(var x = 0; x < system_data.refresh_call[moduleName].length; x++){
                system_data.refresh_call[moduleName][x]();
            }
        }
    }
    $(document).ready(function(){
        //Module Redirection
        $(".moduleLink").click(function(){
            load_module($(this).attr("module_link"), $(this).attr("module_name"));
            return false;
        });
        $("#viewProfile").click(function(){
            load_module("member_profile/index/"+user_id(), "Member Profile");
            return false;
        });
        $(".logout").click(function(){
            logout();
            return false;
        })
    });
    
</script>