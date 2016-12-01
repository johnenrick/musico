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
            nowPlaying.videoPlaylist.onVideoClick = videoListClick;
            moduleReady++;
            if(moduleReady === 2){
               nowPlaying.ready(); 
            }
        });
        load_component("playlist_modal", function(){
            nowPlaying.playlistModal = new PlaylistModal(nowPlaying.body.parent().parent().parent().parent());
            moduleReady++;
            if(moduleReady === 2){
               nowPlaying.ready(); 
            }
        });
        moduleBody.find("#videoPlaylist").niceScroll({
            cursorcolor : "#C62828",
            cursorwidth :"10px",
            cursorborder : "none",
            autohidemode : true,
            enablemousewheel : true,
            enablekeyboard : true,
            nativeparentscrolling : false,
            enablescrollonselection : true
        });
        
        /*Event*/
        moduleBody.find("#addToPlaylist").click(function(){
           
            nowPlaying.playlistModal.showUserPlaylist(moduleBody.find("#videoPlayer").attr("user_video_ID"));
            return false;
        });
        moduleBody.find("#videoPanel, #videoPlaylist").on("resize", function(){
            moduleBody.find("#videoPlaylist").height(moduleBody.find("#videoPanel").height());
            moduleBody.find("#videoPlaylist").getNiceScroll().resize();
        });
        
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
        moduleBody.find(".videoDetail .featureButton").click(function(){
            $(this).addClass("disabled");
            $(this).attr("disabled", true);
            if($(this).attr("action_id")*1 === 2){
                var parameter = {
                        condition : {
                            user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID"),
                            removed_datetime : 0
                        },
                        updated_data : {
                            removed_datetime : true
                        }
                    };
                api_request("c_featured_video/updateFeaturedVideo", parameter, function(response){
                    if(!response["error"].length){

                        moduleBody.find(".videoDetail .featureButton[action_id=2]").hide();
                        moduleBody.find(".videoDetail .featureButton[action_id=1]").show();
                    }else{
                    }
                    moduleBody.find(".videoDetail .featureButton[action_id=2]").removeClass("disabled");
                    moduleBody.find(".videoDetail .featureButton[action_id=2]").attr("disabled", false);
                });
            }else{
                var parameter = {
                    user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID")
                };
                api_request("c_featured_video/createFeaturedVideo", parameter, function(response){
                    if(!response["error"].length){
                        moduleBody.find(".videoDetail .featureButton[action_id=2]").show();
                        moduleBody.find(".videoDetail .featureButton[action_id=1]").hide();
                    }else{
                    }
                    moduleBody.find(".videoDetail .featureButton[action_id=1]").removeClass("disabled");
                    moduleBody.find(".videoDetail .featureButton[action_id=1]").attr("disabled", false);
                });
            }
        });
        moduleBody.find(".uploaderDetail a").click(function(){
            load_module("member_profile/index/"+moduleBody.find("#videoPlayer").attr("account_ID"), "Member Profile");
        });
        moduleBody.find(".showComment").click(function(){
            moduleBody.find(".commentSection").show();
            moduleBody.find(".showComment").hide();
            showComment();
        });
        moduleBody.find("#createComment textarea").click(function(){
            if(!user_id()){
                $(".headerLogin").trigger("click");
            }
        });
        moduleBody.find("#createComment").attr("action", api_url("c_user_video_comment/createUserVideoComment"));
        moduleBody.find("#createComment").ajaxForm({
            beforeSubmit : function(data, $form,options){
                moduleBody.find("#createComment button").attr("disabled", true);
                moduleBody.find("#createComment button").addClass("disabled");
                data.push({
                    name : "user_video_ID",
                    type : "text",
                    required : true,
                    value : moduleBody.find("#videoPlayer").attr("user_video_ID")
                });
                
            },
            success : function(data){
                var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"];
                var response = JSON.parse(data);
                if(!response["error"].length){
                    var comment = moduleBody.find(".prototype .videoComment").clone();
                    comment.find('img').attr("src", user_photo_url());
                    var datetime = new Date();
                    comment.find('.commentFullName').text(user_first_name()+" "+user_last_name());
                    comment.find('.commentContent').text(moduleBody.find("#createComment textarea").val());
                    comment.find('.datetime').text(month[datetime.getMonth()]+" "+datetime.getDate()+", "+datetime.getFullYear());
                    moduleBody.find("#createComment textarea").val("");
                    moduleBody.find("#createComment textarea").trigger("autoresize");
                    moduleBody.find("#commentPanel").prepend(comment);
                }
                moduleBody.find("#createComment button").attr("disabled", false);
                moduleBody.find("#createComment button").removeClass("disabled");
            }
        });
        function showComment(){
            var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"];
            var parameter = {
                condition : {
                    user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID")
                }
            }
            moduleBody.find("#commentPanel").empty();
            api_request("c_user_video_comment/retrieveUserVideoComment", parameter, function(response){
                if(!response["error"].length){
                    for(var x = 0; x < response["data"].length; x++ ){
                        var comment = moduleBody.find(".prototype .videoComment").clone();
                        var datetime = new Date(response["data"][x]["datetime"]*1000);
                        comment.find('img').attr("src", asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["account_profile_photo_file_uploaded_description"]));
                        comment.find('.commentFullName').text(response["data"][x]["first_name"]+" "+response["data"][x]["last_name"]);
                        comment.find('.commentContent').text(response["data"][x]["content"]);
                        comment.find('.datetime').text(month[datetime.getMonth()]+" "+datetime.getDate()+", "+datetime.getFullYear());
                        moduleBody.find("#commentPanel").append(comment);
                    }
                }
            }, false);
        }
        function playVideo(userVideoID){
            var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September","October", "November", "December"];
            moduleBody.find(".commentSection").hide();
            moduleBody.find(".showComment").show();
            api_request("c_user_video/retrieveUserVideo", {ID : userVideoID, additional_data : {account_profile_photo : true}}, function(response){
                if(!response["error"].length){
                    moduleBody.find("#videoPlayer").attr("user_video_ID", response["data"]["ID"]);
                    moduleBody.find("#videoPlayer").attr("account_ID", response["data"]["account_ID"]);
                    moduleBody.find("#videoPlayer source").attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["file_uploaded_description"]))
                    moduleBody.find("#videoPlayer").load();
                    if(user_id() !== response["data"]["account_ID"]*1){
                        subscriptionDetail();
                        userVideoLikeDetail();
                    }else{
                        moduleBody.find("#videoPanel .uploaderDetail .subscriptionButton").hide();
                        moduleBody.find("#videoPanel .uploaderDetail .unSubscriptionButton").hide();
                        moduleBody.find("#videoPanel .likeButton").hide();
                    }
                    if(user_type() === 4){
                        featureDetail();
                    }else{
                        moduleBody.find("#videoPanel .videoDetail .featureButton").hide();
                    }
                    moduleBody.find("#videoPanel .videoDetail .viewCount").text((response["data"]["user_video_view_count"]*1) ? response["data"]["user_video_view_count"] + " Views" : "");
                    moduleBody.find("#videoPanel .videoDetail .likeCount").text((response["data"]["user_video_like_count"]*1) ? response["data"]["user_video_like_count"] + " Likes" : "");
                    var datePosted = new Date(response["data"]["datetime"]*1000);
                    moduleBody.find("#videoPanel .videoDetail .videoDatetime").text(month[datePosted.getMonth()] +" "+datePosted.getDate()+", "+datePosted.getFullYear());
                    moduleBody.find("#videoPanel .videoDetail .videoDescription").text(response["data"]["title"]);
                    moduleBody.find("#videoPanel .uploaderDetail .videoDetail").text(response["data"]["details"]);
                    moduleBody.find("#videoPanel .uploaderDetail .uploaderFullName").text(response["data"]["first_name"]+" "+response["data"]["middle_name"]+" "+response["data"]["last_name"]);
                    
                    if(response["data"]["account_profile_photo_file_uploaded_description"]){
                        moduleBody.find(".uploaderDetail img").attr("src", asset_url("user_upload/"+response["data"]["account_ID"]+"/"+response["data"]["account_profile_photo_file_uploaded_description"]));
                    }else{
                        moduleBody.find(".uploaderDetail img").attr("src", asset_url("image/no_profile_photo.jpg"));
                    }
                    moduleBody.find("#videoPlayer").attr("viewed", 0);
                    
                    
                    setTimeout(function(){
//                        moduleBody.find("#videoPlayer")[0].play();
                    }, 2500);
                    moduleBody.find("#videoPanel, #videoPlaylist").trigger("resize");
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
                    user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID"),
                    account_ID : user_id()
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
        
        function featureDetail(){
            var parameter = {
                condition : {
                    user_video_ID : moduleBody.find("#videoPlayer").attr("user_video_ID"),
                    removed_datetime : 0
                }
            }
            api_request("c_featured_video/retrieveFeaturedVideo", parameter, function(response){
                if(!response["error"].length){
                    moduleBody.find(".videoDetail .featureButton[action_id=2]").show();
                    moduleBody.find(".videoDetail .featureButton[action_id=1]").hide();
                }else{
                    moduleBody.find(".videoDetail .featureButton[action_id=2]").hide();
                    moduleBody.find(".videoDetail .featureButton[action_id=1]").show();
                }
            });
        }
        function showPlaylist(){
            var urlParameter = getURLParameter("now_playing/index");
            nowPlaying.videoPlaylist.now_playing_source = urlParameter[0];
            nowPlaying.videoPlaylist.now_playing_parameter = urlParameter[2];
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
                        for(var x = 0; x < response["data"].length; x++){
                            nowPlaying.videoPlaylist.addVideoItem(response["data"][x]["ID"], asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"]);
                        }
                        focusPlayList();
                    }
                    
                }, false);
            }else if(urlParameter[0] === "random"){
                api_request("c_user_video/retrieveRandomUserVideo", {}, function(response){
                    if(!response["error"].length){
                        for(var x = 0; x < response["data"].length; x++){
                            nowPlaying.videoPlaylist.addVideoItem(response["data"][x]["ID"], asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"]);
                        }
                        focusPlayList();
                    }
                }, false);
            }else if(urlParameter[0] === "featured"){
                var parameter = {
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
                        nowPlaying.videoPlaylist.empty();
                        for(var x = 0; x < response["data"].length; x++){
                            nowPlaying.videoPlaylist.addVideoItem(response["data"][x]["ID"], asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"]);
                        }
                    }
                }, false);
            }
            
        }
        function focusPlayList(){
            if(moduleBody.find(".videoItem[user_video_id="+moduleBody.find("#videoPlayer").attr("user_video_ID")+"]").length){
                $("#videoPlaylist").scrollTop(
                    moduleBody.find(".videoItem[user_video_id="+moduleBody.find("#videoPlayer").attr("user_video_ID")+"]").offset().top 
                    - moduleBody.find(".videoItem[user_video_id="+moduleBody.find("#videoPlayer").attr("user_video_ID")+"]").parent().offset().top  
                    - moduleBody.find(".videoItem[user_video_id="+moduleBody.find("#videoPlayer").attr("user_video_ID")+"]").parent().scrollTop()
                    );
            }
        }
        function videoListClick(userVideoID){
            playVideo(userVideoID);
        }
        nowPlaying.ready = function(){
            var urlParameter = getURLParameter("now_playing/index");
            playVideo(urlParameter[1]);
            showPlaylist();
        };
        
    };
    $(document).ready(function(){
        systemApplication.module.nowPlaying = new NowPlaying();
    });
</script>