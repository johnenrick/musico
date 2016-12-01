<script>
    var MemberProfilePlaylistTab = function (memberProfile) {
        
        var moduleBody = memberProfile.body;
        var memberProfilePlaylistTab = this;
        new init_sub_module(memberProfilePlaylistTab, memberProfile, moduleBody.find("#memberProfilePlaylistTab"))
        var subModuleBody = memberProfilePlaylistTab.body;
        memberProfilePlaylistTab.readyFlagValue = 2;
        var videoList = [];
        load_component("grid_list", function(){
            memberProfilePlaylistTab.isReady();
        });
        var playlistDetailModal = commonFormHandler(subModuleBody.find(".playlistModal form"), "c_playlist/createPlaylist", "c_playlist/updatePlaylist", "c_playlist/deletePlaylist");
        playlistDetailModal.submitCreateSuccess = function (response) {
            if (!response["error"].length) {
                subModuleBody.find(".playlistModal").closeModal();
                addPlaylist(response["data"], subModuleBody.find(".playlistModal input[field_name=title]").val(), subModuleBody.find(".playlistModal input[field_name=description]").val())
            }
        };
        playlistDetailModal.submitCreateSuccess = function (response) {
            if (!response["error"].length) {
                subModuleBody.find(".playlistModal").closeModal();
                addPlaylist(response["data"], subModuleBody.find(".playlistModal input[field_name=title]").val(), subModuleBody.find(".playlistModal input[field_name=description]").val())
            }
        };
        playlistDetailModal.submitUpdateSuccess = function (response) {
            if (!response["error"].length) {
                subModuleBody.find("#playlistContainer").find(".playlistEntry[playlist_id="+subModuleBody.find(".playlistModal input[name=ID]").val()+"] .playlistTitle").text(subModuleBody.find(".playlistModal input[field_name=title]").val())
                subModuleBody.find("#playlistContainer").find(".playlistEntry[playlist_id="+subModuleBody.find(".playlistModal input[name=ID]").val()+"] .playlistDescription").text(subModuleBody.find(".playlistModal input[field_name=description]").val())

            }
        };
        subModuleBody.find("#playlistContainer").collapsible();
        subModuleBody.find("#playlistContainer").on("click", "li .collapsible-header", function(){
            var playlistEntry = $(this).parent();
            
            if($(this).hasClass("active")){
                var parameter = {
                    condition : {
                        playlist_ID : playlistEntry.attr("playlist_id")
                    }
                };
                videoList[playlistEntry.attr("playlist_id")].loadingVideoItem();
                api_request("c_playlist_video/retrievePlaylistVideo", parameter, function(response){
                    videoList[playlistEntry.attr("playlist_id")].empty();
                    if(!response["error"].length){
                        setTimeout(function () {
                            for (var x = 0; x < response["data"].length; x++) {
                                videoList[playlistEntry.attr("playlist_id")].addItem(
                                        response["data"][x]["user_video_ID"],
                                        asset_url("user_video/" + response["data"][x]["account_ID"] + "/" + response["data"][x]["thumbnail_file_uploaded_description"]),
                                        response["data"][x]["user_video_title"],
                                        response["data"][x]["first_name"] + " " + response["data"][x]["last_name"], null, null);

                            }
                        }, 500);
                    }else{
                        videoList[playlistEntry.attr("playlist_id")].noVideoItem();
                    }
                });
            }
        });
        subModuleBody.find(".createPlaylist").click(function () {
            playlistDetailModal.createForm();
            subModuleBody.find(".playlistModal").openModal();
        });
        subModuleBody.on("click", ".playlistModal .removePlaylistVideo", function () {
            var playlistVideoID = $(this).parent().parent().attr("playlist_video_id");
            subModuleBody.find(".playlistModal .playlistVideoItem[playlist_video_id="+playlistVideoID+"]").hide();
            api_request("c_playlist_video/deletePlaylistVideo", {ID : playlistVideoID}, function(response){
                if(!response["error"].length){
                    
                    videoList[subModuleBody.find(".playlistModal input[name=ID]").val()].removeItem(subModuleBody.find(".playlistModal .playlistVideoItem[playlist_video_id="+playlistVideoID+"]").attr("user_video_id"));
                    
                    subModuleBody.find(".playlistModal .playlistVideoItem[playlist_video_id="+playlistVideoID+"]").remove();
                }
                subModuleBody.find(".playlistModal .playlistVideoItem[playlist_video_id="+playlistVideoID+"]").show();
            });
            return false;
        });
        subModuleBody.on("click", ".editPlaylistDetail", function () {
            var playlistID = $(this).parent().parent().attr("playlist_id");
            var buttonClicked = $(this);
            buttonClicked.addClass("disabled");
            buttonClicked.attr("disabled", true)
            var parameter = {
                ID : playlistID
            };
            api_request("c_playlist/retrievePlaylist", parameter, function(response){
                if(!response["error"].length){
                    subModuleBody.find(".playlistModal input[name=ID]").val(response["data"]["ID"]);
                    subModuleBody.find(".playlistModal input[field_name=title]").val(response["data"]["title"]);
                    subModuleBody.find(".playlistModal input[field_name=description]").val(response["data"]["description"]);
                    subModuleBody.find(".playlistModal").openModal();

                }
                buttonClicked.removeClass("disabled");
                buttonClicked.attr("disabled", false);
            });
            
            var parameter = {
                condition: {
                    playlist_ID: playlistID
                }
            };
            subModuleBody.find(".playlistModal .playlistVideo .playlistVideoItem").remove();
            api_request("c_playlist_video/retrievePlaylistVideo", parameter, function (response) {
                videoList[playlistID].empty();
                if (!response["error"].length) {
                    for (var x = 0; x < response["data"].length; x++) {
                        var playlistVideoItem = subModuleBody.find(".prototype .playlistVideoItem").clone();
                        playlistVideoItem.attr("playlist_video_id", response["data"][x]["ID"]);
                        playlistVideoItem.attr("user_video_ID", response["data"][x]["user_video_ID"]);
                        playlistVideoItem.find(".title").text(response["data"][x]["user_video_title"]);
                        
                        subModuleBody.find(".playlistModal .playlistVideo").append(playlistVideoItem);
                    }
                } else {
                }
            });
            

            if ($(this).parents("li.active").length === 0) {
                $(this).parents("li").find(".collapsible-header").trigger("click");
            }
            playlistDetailModal.updateForm();
            return false;
        });
        function addPlaylist(ID, title, description) {
            var playlistEntry = subModuleBody.find(".prototype .playlistEntry").clone();
            playlistEntry.attr("playlist_id", ID);
            playlistEntry.find(".playlistTitle").text(title);
            playlistEntry.find(".playlistDescription").text(description);
            videoList[ID] = new GridList(playlistEntry.find(".playlistVideoContainer"));
            subModuleBody.find("#playlistContainer").append(playlistEntry);
        }
        function showPlaylistVideo(playlistID){
            
        }
        function showPlaylistList() {
            subModuleBody.find("#playlistContainer").empty();
            var parameter = {
                condition: {
                    account_ID: user_id()
                }
            }
            api_request("c_playlist/retrievePlaylist", parameter, function (response) {
                if (!response["error"].length) {
                    for (var x = 0; x < response["data"].length; x++) {
                        addPlaylist(response["data"][x]["ID"], response["data"][x]["title"], response["data"][x]["description"]);
                    }
                }
            });
        }
        memberProfilePlaylistTab.ready = function () {
            showPlaylistList();
        };
        memberProfilePlaylistTab.isReady();
        
    };
</script>