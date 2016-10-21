<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery.nicescroll.min.js");
    
    /*Module Object*/
    var NowPlaying = function(){
        var nowPlaying = this;//instance of the module
        var moduleBody = nowPlaying.body = $("#nowPlaying");
        var moduleReady = 0;
        load_component("video_list", function(){
            nowPlaying.videoPlaylist = new VideoList(moduleBody.find("#videoPlaylist")); 
            moduleReady++;
            if(moduleReady === 1){
               nowPlaying.ready(); 
            }
        });
        moduleBody.find("#videoPlaylist").niceScroll({
            cursorcolor : "#C62828",
            cursorwidth :"10px",
            cursorborder : "none",
            touchbehavior : true,
            autohidemode : false,
            enablemousewheel : true,
            enablekeyboard : true,
            nativeparentscrolling : false,
            enablescrollonselection : true
        });
        
        /*Event*/
        $(window).resize(function(){
            moduleBody.find("#videoPlaylist").height(moduleBody.find("#videoPanel").height());
        });
        moduleBody.find("#videoPlayer").on("timeupdate", function(){
            if(moduleBody.find("#videoPlayer").attr("viewed")*1 === 0 && (moduleBody.find("#videoPlayer")[0].currentTime / moduleBody.find("#videoPlayer")[0].duration) >= 0.5){
                viewVideo();
            }
        })
        moduleBody.find(".uploaderDetail .subscriptionButton").click(function(){
            $(this).addClass("disabled");
            var parameter = {
                subscribed_account_ID : moduleBody.find("#videoPlayer").attr("account_ID")
            };
            api_request("C_subscription/createSubscription", parameter, function(response){
                if(!response["error"].length){
                    moduleBody.find(".uploaderDetail .unSubscriptionButton").show();
                    moduleBody.find(".uploaderDetail .subscriptionButton").hide();
                }else{
                }
                moduleBody.find(".uploaderDetail .subscriptionButton").removeClass("disabled")
            });
        });
        moduleBody.find(".uploaderDetail .unSubscriptionButton").click(function(){
            $(this).addClass("disabled");
            var dataFilter = {
                    condition : {
                        subscribed_account_ID : moduleBody.find("#videoPlayer").attr("account_ID"),
                        subscriber_account_ID : user_id()*1
                    }
                };
            api_request("C_subscription/deleteSubscription", dataFilter, function(response){
                if(!response["error"].length){
                    
                    moduleBody.find(".uploaderDetail .unSubscriptionButton").hide();
                    moduleBody.find(".uploaderDetail .subscriptionButton").show();
                }else{
                }
                moduleBody.find(".uploaderDetail .unSubscriptionButton").removeClass("disabled")
            });
        });
        moduleBody.find(".videoDetail .likeButton").click(function(){
            $(this).addClass("disabled");
            $(this).attr("disabled", true);
            if($(this).attr("action_id")*1 === 2){
                var parameter = {
                        condition : {
                            user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID")
                        }
                    };
                api_request("c_user_video_like/deleteUserVideoLike", parameter, function(response){
                    if(!response["error"].length){

                        moduleBody.find(".videoDetail .likeButton[action_id=2]").hide();
                        moduleBody.find(".videoDetail .likeButton[action_id=1]").show();
                    }else{
                    }
                    moduleBody.find(".videoDetail .likeButton[action_id=2]").removeClass("disabled");
                    moduleBody.find(".videoDetail .likeButton[action_id=2]").attr("disabled", false);
                });
            }else{
                var parameter = {
                    user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID")
                };
                api_request("c_user_video_like/createUserVideoLike", parameter, function(response){
                    if(!response["error"].length){
                        moduleBody.find(".videoDetail .likeButton[action_id=2]").show();
                        moduleBody.find(".videoDetail .likeButton[action_id=1]").hide();
                    }else{
                    }
                    moduleBody.find(".videoDetail .likeButton[action_id=1]").removeClass("disabled");
                    moduleBody.find(".videoDetail .likeButton[action_id=1]").attr("disabled", false);
                });
            }
        });
        moduleBody.find(".uploaderDetail a").click(function(){
            load_module("member_profile/index/"+moduleBody.find("#videoPlayer").attr("account_ID"), "Member Profile");
        })
        function playVideo(){
            var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"];
            var urlParameter = getURLParameter("now_playing/index");
            api_request("c_user_video/retrieveUserVideo", {ID : urlParameter[1], additional_data : {account_profile_photo : true}}, function(response){
                if(!response["error"].length){
                    moduleBody.find("#videoPlayer").attr("user_video_ID", response["data"]["ID"]);
                    moduleBody.find("#videoPlayer").attr("account_ID", response["data"]["account_ID"]);
                    moduleBody.find("#videoPlayer source").attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["file_uploaded_description"]))
                    moduleBody.find("#videoPlayer").load();
                    if(user_id() !== response["data"]["account_ID"]*1){
                        subscriptionDetail();
                        userVideoLikeDetail();
                    }
                    moduleBody.find(".videoDetail .viewCount").text((response["data"]["user_video_view_count"]*1) ? response["data"]["user_video_view_count"] + " Views" : "");
                    moduleBody.find(".videoDetail .likeCount").text((response["data"]["user_video_like_count"]*1) ? response["data"]["user_video_like_count"] + " Likes" : "");
                    var datePosted = new Date(response["data"]["datetime"]*1000);
                    moduleBody.find(".videoDetail .videoDatetime").text(month[datePosted.getMonth()] +" "+datePosted.getDate()+", "+datePosted.getFullYear());
                    moduleBody.find(".videoDetail .videoDescription").text(response["data"]["title"]);
                    moduleBody.find(".uploaderDetail .videoDetail").text(response["data"]["details"]);
                    moduleBody.find(".uploaderDetail .uploaderFullName").text(response["data"]["first_name"]+" "+response["data"]["middle_name"]+" "+response["data"]["last_name"]);
                    
                    if(response["data"]["account_profile_photo_file_uploaded_description"]){
                        moduleBody.find(".uploaderDetail img").attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["account_profile_photo_file_uploaded_description"]));
                    }else{
                        moduleBody.find(".uploaderDetail img").attr("src", asset_url("image/no_profile_photo.jpg"));
                    }
                    moduleBody.find("#videoPlayer").attr("viewed", 0);
                    moduleBody.find("#videoPlaylist").height(moduleBody.find("#videoPanel").height());
                    moduleBody.find("#videoPlaylist").getNiceScroll().resize();
                    
                    setTimeout(function(){
//                        moduleBody.find("#videoPlayer")[0].play();
                    }, 2500);
                }
            }, false);
            
        }
        function viewVideo(){
            moduleBody.find("#videoPlayer").attr("viewed", 1);
            api_request("c_user_video_view/createUserVideoView", {user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID")}, function(response){
               
            });
        }
        function subscriptionDetail(){
            var parameter = {
                condition : {
                    subscribed_account_ID : moduleBody.find("#videoPlayer").attr("account_ID"),
                    subscriber_account_ID : user_id()
                }
            }
            api_request("c_subscription/retrieveSubscription", parameter, function(response){
                if(!response["error"].length){
                    moduleBody.find(".uploaderDetail .unSubscriptionButton").show();
                    moduleBody.find(".uploaderDetail .subscriptionButton").hide();
                }else{
                    moduleBody.find(".uploaderDetail .unSubscriptionButton").hide();
                    moduleBody.find(".uploaderDetail .subscriptionButton").show();
                }
            });
        }
        function userVideoLikeDetail(){
            var parameter = {
                condition : {
                    subscribed_account_ID : moduleBody.find("#videoPlayer").attr("account_ID"),
                    subscriber_account_ID : user_id()
                }
            }
            api_request("c_user_video_like/retrieveUserVideoLike", parameter, function(response){
                if(!response["error"].length){
                    moduleBody.find(".videoDetail .likeButton[action_id=2]").show();
                    moduleBody.find(".videoDetail .likeButton[action_id=1]").hide();
                }else{
                    moduleBody.find(".videoDetail .likeButton[action_id=2]").hide();
                    moduleBody.find(".videoDetail .likeButton[action_id=1]").show();
                }
            });
        }
        function showPlaylist(){
            var urlParameter = getURLParameter("now_playing/index");
            nowPlaying.videoPlaylist.empty();
            if(urlParameter[0] === "search"){
                var filterData = {
                    condition : {
                        like__user_video__title__CONCAT__account_information__first_name__CONCAT__account_information__middle_name__CONCAT__account_information__last_name__CONCAT__user_video__details : []
                    }
                };
                var searchText = atob(urlParameter[2]).split(" ");
                var byRemoved = false;
                for(var x = 0; x < searchText.length; x++){
                    if(searchText[x] === "by" && !byRemoved && x !== searchText.length-1){
                        byRemoved = true;
                    }else{
                        filterData.condition["like__user_video__title__CONCAT__account_information__first_name__CONCAT__account_information__middle_name__CONCAT__account_information__last_name__CONCAT__user_video__details"].push(searchText[x]);
                    }
                }
                api_request("c_user_video/retrieveUserVideo", filterData, function(response){
                    if(!response["error"].length){
                        for(var y = 0; y < 10; y++){
                            for(var x = 0; x < response["data"].length; x++){
                                nowPlaying.videoPlaylist.addVideoItem(response["data"][x]["ID"], asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"]);
                            }
                        }
                    }
                    moduleBody.find("#videoPlaylist").getNiceScroll().resize();
                }, false);
            }
        }
        nowPlaying.ready = function(){
            playVideo();
            showPlaylist();
        };
        
    };
    $(document).ready(function(){
        systemApplication.module.nowPlaying = new NowPlaying();
    });
</script>