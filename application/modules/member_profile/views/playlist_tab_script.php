<script>
    load_asset("module/member_profile_home_tab.css");
    var MemberProfilePlaylistTab = function (memberProfile) {
        var memberProfilePlaylistTab = this;
        var moduleBody = memberProfile.body;
        var subModuleBody = moduleBody.find("#memberProfilePlaylistTab");
        var ready = 0;
        var videoList = [];
        load_component("video_list", function(){
            memberProfilePlaylistTab++;
            if(memberProfilePlaylistTab === 1){
               memberProfilePlaylistTab.ready(); 
            }
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
        subModuleBody.find("#playlistContainer").on("click", "li", function(){
            if($(this).hasClass("active")){
                var parameter = {
                    condition : {
                        playlist_ID : $(this).attr("playlist_id")
                    }
                }
                api_request("c_playlist_video/retrievePlaylistVideo", parameter, function(response){
                    console.log(response);
                });
            }
        });
        subModuleBody.find(".createPlaylist").click(function () {
            playlistDetailModal.createForm();
            subModuleBody.find(".playlistModal").openModal();
        });

        subModuleBody.on("click", ".editPlaylistDetail", function () {
            var buttonClicked = $(this);
            buttonClicked.addClass("disabled");
            buttonClicked.attr("disabled", true)
            var parameter = {
                ID : $(this).parent().parent().attr("playlist_id")
            };
            api_request("c_playlist/retrievePlaylist", parameter, function(response){
                console.log(response);
                if(!response["error"].length){
                    console.log(response)
                    subModuleBody.find(".playlistModal input[name=ID]").val(response["data"]["ID"]);
                    subModuleBody.find(".playlistModal input[field_name=title]").val(response["data"]["title"]);
                    subModuleBody.find(".playlistModal input[field_name=description]").val(response["data"]["description"]);
                    subModuleBody.find(".playlistModal").openModal();

                }
                buttonClicked.removeClass("disabled");
                buttonClicked.attr("disabled", false);
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
            videoList[ID] = new VideoList(moduleBody.find("#videoPlaylist"));
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
    };
</script>