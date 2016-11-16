<script>
    /*Adding an asset*/
    load_asset("core/custom/card.css");
    load_asset("component/video_list_banner.css");
    load_asset("jquery.matchHeight-min.js");
    
    /*Component Object*/
    /***
     * A sample Component
     * @param {type} componentContainer an element selector where the instance of the component is placed
     * @returns {undefined}
     */
    var VideoListBanner = function (componentContainer) {
        var videoListBanner = this;
        videoListBanner.body = $("#pageComponentContainer .video_list_banner").clone();//The HTML instance of the component. 
        componentContainer.empty();
        componentContainer.append(videoListBanner.body);
        videoListBanner.now_playing_source = "";
        videoListBanner.now_playing_parameter = "";
        videoListBanner.body.on("click", ".videoItem a", function(){
            load_module("now_playing/index/"+videoListBanner.now_playing_source+"/"+$(this).parents(".videoItem").attr("user_video_id")+"/"+btoa(videoListBanner.now_playing_parameter).replace(/\=/gi, ''), "Now Playing");
            return false;
        });
        videoListBanner.body.on("click", ".mainVideo a", function(){
            load_module("now_playing/index/"+videoListBanner.now_playing_source+"/"+$(this).parents(".mainVideo").attr("user_video_id")+"/"+btoa(videoListBanner.now_playing_parameter).replace(/\=/gi, ''), "Now Playing");
            return false;
        });
        videoListBanner.empty = function(){
            videoListBanner.body.find(".videoList .subVideoList").remove();
        };
        videoListBanner.body.find(".mainVideo img").error(function(){
            this.src=asset_url('/image/no_video_image.jpg');
        });
        videoListBanner.addItem = function(userVideoID, userVideoThumbnailLink, videoDescription, uploaderFullName, datetimeCreated, viewCount, mainVideo){
            var videoItem = (mainVideo === true) ?  videoListBanner.body.find(".mainVideo") : videoListBanner.body.find(".prototype .videoItem").clone();
           
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
            videoItem.find(".videoAge").text(videoAge+" ago");
            if(mainVideo === true){
            }else{
                videoListBanner.body.find(".videoList").append(videoItem);
            }
            
            //mainVideo width
            videoListBanner.body.find(".mainVideo").removeClass("l6 l8 l12 ");
            videoListBanner.body.find(".videoList .subVideoList").removeClass("l3 l4");
            var subVideoCount = videoListBanner.body.find(".videoList .subVideoList").length;
            if(subVideoCount === 0){
                videoListBanner.body.find(".mainVideo").addClass("l12");
            }else if(subVideoCount === 1 || subVideoCount === 2 ){
                videoListBanner.body.find(".mainVideo").addClass("l8");
                videoListBanner.body.find(".videoList .subVideoList").addClass("l4");
            }else if(subVideoCount > 2){
                videoListBanner.body.find(".mainVideo").addClass("l6");
                videoListBanner.body.find(".videoList .subVideoList").addClass("l3");
            }
        };
    };
</script>