<script>
    /*global systemApplication, systemUtility  */
    load_asset("core/custom/button.css");
     var Portal = function(){
        var portalPage = this;//instance of the module
        var moduleBody = portalPage.body = $("#portalPage");
        var isReady = 0;
        /*Featured Video*/
        load_component("grid_list", function(){
           portalPage.featuredVideoList = new GridList(moduleBody.find(".featuredVideoList"));
           portalPage.featuredVideoList.now_playing_source = "featured";
           portalPage.featuredVideoList.addItem(1, asset_url("sample_image/sample_image (1).jpg"), "Cycling to the Mountains", "The Mountain Bikers", 1462767575, 10);
           isReady++;
           if(isReady === 2){
               portalPage.ready();
           }
        });
        /*5 Random Video*/
        load_component("video_list_banner", function(){
           portalPage.bannerVideoList = new VideoListBanner(moduleBody.find(".randomVideo"));
           portalPage.bannerVideoList.now_playing_source = "random";
           isReady++;
           if(isReady === 2){
               portalPage.ready();
           }
        });
        
        moduleBody.find(".signUpButton").click(function(){
            $(".headerAuthentication").trigger("click");
        });
        moduleBody.find(".discoverButton").click(function(){
            load_module("browse_video", "Browse Video");
        });
        moduleBody.find(".uploadVideo").click(function(){
            if(user_id()){
                load_module("member_profile/index/"+user_id()+"#memberProfileVideoTab", "MemberProfile");
            }else{
                $(".headerLogin").trigger("click");
            }
        });
        function listRandomVideo(){
            api_request("c_user_video/retrieveRandomUserVideo", {}, function(response){
                if(!response["error"].length){
                    portalPage.bannerVideoList.empty();
                    for(var x = 0; x < response["data"].length; x++){
                        portalPage.bannerVideoList.addItem(
                            response["data"][x]["ID"],
                            asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), 
                            response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"], 
                            response["data"][x]["datetime"], 
                            response["data"][x]["user_video_view_count"], 
                            (x === 0 ) ? true : false
                        );
                    }
                }
            }, false);
        }
        function listFeaturedVideo(){
            var parameter = {
                condition : {
                    removed_datetime : 0
                },
                additional_data : {
                    user_video : true
                },
                sort : {
                    removed_datetime : "asc",
                    datetime : "desc"
                },
                limit : 10,
                group_by : "user_video_ID",
                distinct : true
            }
            api_request("C_featured_video/retrieveFeaturedVideo", parameter, function(response){
                if(!response["error"].length){
                    portalPage.featuredVideoList.empty();
                    for(var x = 0; x < response["data"].length; x++){
                        portalPage.featuredVideoList.addItem(
                            response["data"][x]["user_video_ID"],
                            asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), 
                            response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"], 
                            response["data"][x]["datetime"], 
                            response["data"][x]["user_video_view_count"]
                        );
                    }
                }
            }, false);
        }
        portalPage.ready = function(){
            if(user_id()){
                moduleBody.find(".signUpButton").hide();
                moduleBody.find(".discoverButton").show();
            }else{
                moduleBody.find(".signUpButton").show();
                moduleBody.find(".discoverButton").hide();
            }
            listRandomVideo();
            listFeaturedVideo();
        };
    };
        
    $(document).ready(function(){
        systemApplication.module.portal = new Portal();
    });
</script>