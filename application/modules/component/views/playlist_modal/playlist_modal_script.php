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
        playlistModal.body.on("click", ".playlistItem", function(){
            console.log($(this).attr("playlist_id"))
        });
        playlistModal.showUserPlaylist = function(userVideoID){
            currentUserVideoID = userVideoID;
            listUserPlaylist();
            playlistModal.body.openModal();
        };
        function listUserPlaylist(){
            playlistModal.body.find(".playlistContainer").empty();
            var parameter = {
                condition : {
                    account_ID : user_id()
                }
            }
            api_request("c_playlist/retrievePlaylist", parameter, function(response){
                if(!response["error"].length){
                    for(var x = 0; x < response["data"].length; x++){
                        var playlist = playlistModal.body.find(".prototype .playlistItem").clone();
                        playlist.attr("playlist_id", response["data"][x]["ID"]);
                        playlist.find(".title").text(response["data"][x]["title"]);
                        playlistModal.body.find(".playlistContainer").append(playlist);
                    }
                }else{
                    playlistModal.body.find(".playlistContainer").text("You havent created a playlist yet. Go to your profile and click the playlist tab")
                }
            });
        }
    };
</script>