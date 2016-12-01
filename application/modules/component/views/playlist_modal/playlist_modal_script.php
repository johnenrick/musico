<script>
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var PlaylistModal = function (componentContainer) {
        var playlistModal = this;
        var currentUserVideoID = 0;
        playlistModal.body = $("#pageComponentContainer .componentHolder.playlist_modal .playlistModal").clone();//The HTML instance of the component. 
        componentContainer.append(playlistModal.body);
        
        playlistModal.body.on("click", ".playlistItemAction", function(){
            var playlistItem = $(this).parent().parent();
            playlistItem.find(".playlistItemAction").hide();
            playlistItem.find(".playlistItemAction[action_id=1]").show();
            
            switch($(this).attr("action_id")*1){
                case 2 : //unselect
                    var parameter = {
                        condition : {
                            playlist_ID : playlistItem.attr("playlist_id"),
                            user_video_ID : currentUserVideoID
                        }
                    };
                    api_request("c_playlist_video/deletePlaylistVideo", parameter, function(response){
                        playlistItem.find(".playlistItemAction[action_id=1]").hide();
                        if(!response["error"].length){
                            playlistItem.find(".playlistItemAction[action_id=3]").show();
                        }else{
                            playlistItem.find(".playlistItemAction[action_id=2]").show();
                        }
                    });
                    break;
                case 3 : //select
                    var parameter = {
                        playlist_ID : playlistItem.attr("playlist_id"),
                        user_video_ID : currentUserVideoID
                    };
                    console.log(parameter)
                    api_request("c_playlist_video/createPlaylistVideo", parameter, function(response){
                        playlistItem.find(".playlistItemAction[action_id=1]").hide();
                        if(!response["error"].length){
                            playlistItem.find(".playlistItemAction[action_id=2]").show();
                        }else{
                            playlistItem.find(".playlistItemAction[action_id=3]").show();
                        }
                    });
                    break;
            }
        });
        playlistModal.showUserPlaylist = function(userVideoID){
            currentUserVideoID = userVideoID;
            listUserPlaylist();            
        };
        function listUserPlaylist(){
            playlistModal.body.find(".playlistContainer").empty();
            var parameter = {
                condition : {
                    account_ID : user_id()
                }
            };
            api_request("c_playlist/retrievePlaylist", parameter, function(response){
                if(!response["error"].length){
                    for(var x = 0; x < response["data"].length; x++){
                        var playlist = playlistModal.body.find(".prototype .playlistItem").clone();
                        playlist.attr("playlist_id", response["data"][x]["ID"]);
                        playlist.find(".title").text(response["data"][x]["title"]);
                        playlistModal.body.find(".playlistContainer").append(playlist);
                    }
                    var playlistVideoParameter = {
                        condition : {
                            playlist__account_ID : user_id(),
                            user_video_ID : currentUserVideoID
                        }
                    };
                    api_request("c_playlist_video/retrievePlaylistVideo", playlistVideoParameter, function(response){
                        playlistModal.body.find(".playlistContainer .playlistItemAction").hide();
                        playlistModal.body.find(".playlistContainer .playlistItemAction[action_id=3]").show();
                        for(var x = 0; x < response["data"].length; x++){
                            playlistModal.body.find(".playlistContainer .collection-item[playlist_id="+response["data"][x]["playlist_ID"]+"] .playlistItemAction[action_id=3]").hide();
                           playlistModal.body.find(".playlistContainer .collection-item[playlist_id="+response["data"][x]["playlist_ID"]+"] .playlistItemAction[action_id=2]").show();
                        }
                        playlistModal.body.openModal();
                    })
                }else{
                    playlistModal.body.find(".playlistContainer").text("You havent created a playlist yet. Go to your profile and click the playlist tab")
                    playlistModal.body.openModal();
                }
            });
        }
    };
</script>