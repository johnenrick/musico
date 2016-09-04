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
            
        }else{//Log Out
            $(".headerLogin").show();//Header Log In button
            $(".headerAuthentication").show();//Header Join button
            $(".sidebarAuthentication").show();//Sidebar athentication
            $(".playlistSidebar").hide();//Playlist sidebar
            $(".adminSidebar").hide();//Admin sidebar
        }
    }
    /***
     * Load module to the page
     * @param {String} moduleLink Controller/Function of the module
     * @param {String} moduleName Name of the module
     * @returns {undefined}
     */
    function load_module(moduleLink, moduleName){
        moduleName = moduleName.toLowerCase();
        var section = window.location.href.split("#");
        window.history.pushState('Object', 'Title', base_url(moduleLink)+(section.length >1  ? "#"+section[1] : ""));
        if($("#mainContent").find(".moduleHolder[module_link='"+moduleLink+"']").length === 0){
            
            $.post(base_url(moduleLink), {load_module : true}, function(data){
                /*CHECK IF JSON OR HTML FOR AUTHORIZATION*/
                var moduleHolder = $("#systemModule").find(".moduleHolder").clone();
                moduleHolder.attr("module_link", moduleLink);
                moduleHolder.attr("id",moduleName.replace(/_([a-z])/g, function (g) { return g[1].toUpperCase(); }));
                moduleHolder.append(data);
                $("#mainContent").append(moduleHolder);
                /*show page*/
                $("#mainContent").find(".moduleHolder[module_link!='"+moduleLink+"']").hide();
                if($('.moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                    $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                    refresh_call(moduleName);
                }

            });
        }else{
            /*show page*/
            $("#mainContent").find(".moduleHolder[module_link!='"+moduleLink+"']").hide();
            if($('#mainContent .moduleHolder[module_link="'+moduleLink+'"]').is(":visible") === false){
                $('.moduleHolder[module_link="'+moduleLink+'"]').fadeIn(500);
                if(typeof systemApplication.module[camelize(moduleName)].reload !== "undefined"){
                    systemApplication.module[camelize(moduleName)].reload();
                }
            }
        }
    }
    $(document).ready(function(){
        //Module Redirection
        $(".moduleLink").click(function(){
            load_module($(this).attr("module_link"), $(this).attr("module_name"));
        });
        
    });
    
</script>