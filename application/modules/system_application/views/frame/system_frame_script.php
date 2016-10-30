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
     * Load module to the page
     * @param {String} moduleLink Controller/Function of the module
     * @param {String} moduleName Name of the module
     * @returns {undefined}
     */
    var isloadingModule = false;
    function load_module(moduleLink, moduleName){
        
        if(isloadingModule){
            return false;
        }else{
            isloadingModule = true;
        }
        moduleName = moduleName.replace("#","");
        var section = window.location.href.split("#");
        moduleLink = moduleLink.replace("#","");
        window.history.pushState('Object', 'Title', base_url(moduleLink)+((section.length >1 ) ? "#"+section[1] : ""));
        if($("#mainContent").find(".moduleHolder[module_name='"+camelize(moduleName)+"']").length === 0){
            $.post(base_url(moduleLink), {load_module : true}, function(data){
                /*CHECK IF JSON OR HTML FOR AUTHORIZATION*/
                var moduleHolder = $("#systemModule").find(".moduleHolder").clone();
                moduleHolder.attr("module_link", moduleLink);
                moduleHolder.attr("module_name", camelize(moduleName));
                moduleHolder.attr("id",moduleName.replace(/_([a-z])/g, function (g) { return g[1].toUpperCase(); }));
                moduleHolder.append(data);
                $("#mainContent").append(moduleHolder);
                /*show page*/
                $("#mainContent").find(".moduleHolder[module_name!='"+camelize(moduleName)+"']").hide();
                if($('.moduleHolder[module_name="'+camelize(moduleName)+'"]').is(":visible") === false){
                    $('.moduleHolder[module_name="'+camelize(moduleName)+'"]').fadeIn(500);
                }
//                if(typeof systemApplication.module[camelize(moduleName)].ready !== "undefined"){
//                    systemApplication.module[camelize(moduleName)].ready();
//                }
                isloadingModule = false;

            });
        }else{
            /*show page*/
            $("#mainContent").find(".moduleHolder[module_name!='"+camelize(moduleName)+"']").hide();
            if($('#mainContent .moduleHolder[module_name="'+camelize(moduleName)+'"]').is(":visible") === false){
                $('.moduleHolder[module_name="'+camelize(moduleName)+'"]').fadeIn(500);
                if(typeof systemApplication.module[camelize(moduleName)].ready !== "undefined"){
                    systemApplication.module[camelize(moduleName)].ready();
                }
            }
            isloadingModule = false;
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
        });
        $("#viewProfile").click(function(){
            load_module("member_profile/index/"+user_id(), "Member Profile");
        });
        $(".logout").click(function(){
            logout();
        })
    });
    
</script>