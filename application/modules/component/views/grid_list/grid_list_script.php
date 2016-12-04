<script>
    /*Adding an asset*/
    load_asset("jquery-confirm.min.css");
    load_asset("jquery-confirm.min.js");
    load_asset("jquery.matchHeight-min.js");
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var GridList = function (componentContainer) {
        var gridList = this;
        gridList.body = $("#pageComponentContainer .grid_list").clone();//The HTML instance of the component.
        componentContainer.append(gridList.body);
        gridList.onVideoItemClickFn = null;
        gridList.now_playing_source = "";
        gridList.now_playing_parameter = "";
        gridList.body.on("click", ".videoItem a", function(){
            
            return false;
        });
        gridList.body.bind('load', ".videoList img", function(){
            console.log($(this))
        });
        /**
         * 
         * @param {int} userVideoID ID of the user video
         * @param {string} userVideoThumbnailLink the link of the video which is already generated using user_video_url
         * @param {string} videoDescription the title of the video
         * @param {string} uploaderFullName full name of the uploaded
         * @param {timestamp} datetimeCreated the timestamp it was created
         * @param {int} viewCount count of how many views the video has
         * @returns {undefined}
         */
        gridList.addItem = function(userVideoID, userVideoThumbnailLink, videoDescription, uploaderFullName, datetimeCreated, viewCount){
            var videoItem = gridList.body.find(".prototype .videoItem").clone();
            videoItem.attr("user_video_id", userVideoID);
            videoItem.find("img").attr("src", userVideoThumbnailLink);
            videoItem.find(".videoDescription").text(videoDescription);
            videoItem.find(".uploadederName").text(uploaderFullName);
            videoItem.find(".viewCount").text(viewCount+" view"+((viewCount > 1) ? "s":""));
            var currentTimestamp = (new Date()).getTime()/1000;
            var timestampDifference = currentTimestamp - datetimeCreated;
            var videoAge = "long ";
            if(timestampDifference < 60){//seconds
                videoAge = timestampDifference+" second"+(timestampDifference > 1 ? "s" :"");
            }else if(timestampDifference < 3600){//Minute
                videoAge = parseInt(timestampDifference/60)+" minute"+((parseInt(timestampDifference/60) > 1) ? "s" :"");
            }else if(timestampDifference < 86400){//Hour
                videoAge = parseInt(timestampDifference/3600)+" hour"+((parseInt(timestampDifference/3600) > 1) ? "s" :"");
            }else if(timestampDifference < 2678400){//Day
                videoAge = parseInt(timestampDifference/86400)+" day"+((parseInt(timestampDifference/86400) > 1) ? "s" :"");
            }else if(timestampDifference < 32140800){//Month
                videoAge = parseInt(timestampDifference/2678400)+" month"+((parseInt(timestampDifference/2678400) > 1) ? "s" :"");
            }else{//years
                videoAge = parseInt(timestampDifference/32140800)+" year"+((parseInt(timestampDifference/32140800) > 1) ? "s" :"");
            }
            if(datetimeCreated === null){
                videoItem.find(".videoAge").hide();
            }
            if(viewCount === null){
                videoItem.find(".viewCount").hide();
            }
            videoItem.find(".videoAge").text(videoAge+" ago");
            gridList.body.find(".videoList").append(videoItem);
            gridList.body.find(".videoList .videoItem").matchHeight();
        };
        gridList.addItemList = function(itemList){
            gridList.empty();
            if(itemList){
                for(var x = 0; x < itemList.length; x++){
                    gridList.addItem(
                        itemList[x]["ID"],
                        asset_url("user_upload/"+itemList[x]["account_ID"]+"/"+itemList[x]["thumbnail_file_uploaded_description"]), 
                        itemList[x]["title"], itemList[x]["first_name"]+" "+itemList[x]["middle_name"]+" "+itemList[x]["last_name"], 
                        itemList[x]["datetime"], 
                        itemList[x]["user_video_view_count"]
                    );
                }
            }else{
                gridList.noVideoItem();
            }
        }
        gridList.removeItem = function(userVideoID){
            gridList.body.find(".videoList .videoItem[user_video_id="+userVideoID+"]").remove()
        }
        gridList.body.find(".videoList").on("click", ".videoItem", function(){
            if(gridList.now_playing_source === ""){
                if(gridList.onVideoItemClickFn !== null){
                    gridList.onVideoItemClickFn($(this));
                }
            }else{
                load_module("now_playing/index/"+gridList.now_playing_source+"/"+$(this).parents(".videoItem").attr("user_video_id")+"/"+btoa(gridList.now_playing_parameter).replace(/\=/gi, ''), "Now Playing");
            }
        });
        gridList.updateItem = function(userVideoID, userVideoThumbnailLink, videoDescription, uploaderFullName, datetimeCreated, viewCount){
            var videoItem = gridList.body.find(".videoItem[user_video_ID="+userVideoID+"]")
            videoItem.find("img").attr("src", userVideoThumbnailLink);
            
            userVideoThumbnailLink ? videoItem.find(".videoDescription").text(videoDescription) : null;
            uploaderFullName ? videoItem.find(".uploadederName").text(uploaderFullName) : null;
            viewCount ?  videoItem.find(".viewCount").text(viewCount+" view"+((viewCount > 1) ? "s":"")) : null;
            if(datetimeCreated){
                var currentTimestamp = (new Date()).getTime()/1000;
                var timestampDifference = currentTimestamp - datetimeCreated;
                var videoAge = "long ";
                if(timestampDifference < 60){//seconds
                    videoAge = timestampDifference+" second"+(timestampDifference > 1 ? "s" :"");
                }else if(timestampDifference < 3600){//Minute
                    videoAge = parseInt(timestampDifference/60)+" minute"+((parseInt(timestampDifference/60) > 1) ? "s" :"");
                }else if(timestampDifference < 86400){//Hour
                    videoAge = parseInt(timestampDifference/3600)+" hour"+((parseInt(timestampDifference/3600) > 1) ? "s" :"");
                }else if(timestampDifference < 2678400){//Day
                    videoAge = parseInt(timestampDifference/86400)+" day"+((parseInt(timestampDifference/86400) > 1) ? "s" :"");
                }else if(timestampDifference < 32140800){//Month
                    videoAge = parseInt(timestampDifference/2678400)+" month"+((parseInt(timestampDifference/2678400) > 1) ? "s" :"");
                }else{//years
                    videoAge = parseInt(timestampDifference/32140800)+" year"+((parseInt(timestampDifference/32140800) > 1) ? "s" :"");
                }
                if(datetimeCreated === null){
                    videoItem.find(".videoAge").hide();
                }
                videoItem.find(".videoAge").text(videoAge+" ago");
            }
            
        }
        gridList.empty = function(){
            gridList.body.find(".videoList").empty();
        };
        gridList.loadingVideoItem = function(){
            gridList.body.find(".videoList").html("&nbsp;&nbsp;&nbsp;&nbsp;Loading videos...");
        };
        gridList.noVideoItem = function(){
            gridList.body.find(".videoList").html("&nbsp;&nbsp;&nbsp;&nbsp;No video added.");
        };
        gridList.empty();
        
    };
</script>