<script>
    /*global systemApplication, systemUtility*/
    
    /*Adding an asset*/
    load_asset("jquery.matchHeight-min.js");
    load_asset("module/browse_video.css");
    /*Module Object*/
    var BrowseVideo  = function(){
        var browseVideo = this;//instance of the module
        var moduleBody = browseVideo.body = $("#browseVideo");
        moduleBody.find("#searchBar .searchField .input-field").matchHeight();
        moduleBody.find("#searchBar").attr("action", api_url("c_user_video/retrieveUserVideo"));
        moduleBody.find("#searchBar").ajaxForm({
            beforeSubmit : function(data,$form,options){
                moduleBody.find("#searchBar .searchingMessage").text("Searhing videos...");
                moduleBody.find("#searchBar button[type=submit]").addClass("disabled");
                var searchText = moduleBody.find("#searchBar #searchText").val().split(" ");
                var byRemoved = false;
                for(var x = 0; x < searchText.length; x++){
                    if(searchText[x] === "by" && !byRemoved && x !== searchText.length-1){
                        byRemoved = true;
                    }else{
                        data.push({
                            name : "condition[like__user_video__title__CONCAT__account_information__first_name__CONCAT__account_information__middle_name__CONCAT__account_information__last_name__CONCAT__user_video__details]["+x+"]",
                            type : "text",
                            required : false,
                            value : searchText[x]
                        });
                    }
                }
            },
            success : function(data){
                var response = JSON.parse(data);
                browseVideo.body.find(".videoList").empty()
                if(!response["error"].length){
                    browseVideo.body.find(".searchResultIndicator").text(response["data"].length +" result"+(response["data"].length > 1 ? "s" :"")+" from \""+moduleBody.find("#searchBar #searchText").val()+"\"")
                    for(var x = 0; x <response["data"].length; x++){
                        addVideoItem(response["data"][x]["ID"], asset_url("user_upload/"+response["data"][x]["account_ID"]+"/"+response["data"][x]["thumbnail_file_uploaded_description"]), response["data"][x]["title"], response["data"][x]["first_name"]+" "+response["data"][x]["middle_name"]+" "+response["data"][x]["last_name"], response["data"][x]["details"], response["data"][x]["datetime"], response["data"][x]["user_video_view_count"]*1);
                    }
                }else{
                    browseVideo.body.find(".searchResultIndicator").text("No Result");
                }
                moduleBody.find("#searchBar button[type=submit]").removeClass("disabled");
                moduleBody.find("#searchBar .searchingMessage").text("Search by keyword, title, artist, details");
            }
        });
        moduleBody.find(".videoList").on("click", ".videoItem a", function(){
            load_module("now_playing/index/search/"+$(this).parents(".videoItem").attr("user_video_id")+"/"+btoa(moduleBody.find("#searchText").val()).replace(/\=/gi, ''), "Now Paying");
        });
        
        function addVideoItem(userVideoID, userVideoThumbnailLink, videoDescription, uploaderFullName, videoDetails, datetimeCreated, viewCount){
            var videoItem = browseVideo.body.find(".prototype .videoItem").clone();
            videoItem.attr("user_video_id", userVideoID);
            videoItem.find("img").attr("src", userVideoThumbnailLink);
            videoItem.find(".videoDescription").text(videoDescription);
            videoItem.find(".uploadederName").text(uploaderFullName);
            videoItem.find(".videoDetails").text(videoDetails);
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
            browseVideo.body.find(".videoList").append(videoItem);
        }
        browseVideo.ready = function(){//function to run if the module is already been loaded
            
        }
    };
        
    $(document).ready(function(){
        if(typeof systemApplication.module.portalPage === "undefined"){
            systemApplication.module.browseVideo = new BrowseVideo();
        }else{
            //TODO refresh function if the module is revisited
            
        }
    });
</script>