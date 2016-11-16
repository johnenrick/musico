<div id="nowPlaying" class="">
    <div class="row grey darken-4 section ">
        <div id="videoPanel" class=" col s12 m9 ">
            <div class="row no-margin-bot">
                <div class="col s12 no-padding-side">
                    <video id="videoPlayer" class="responsive-video" width="100%" controls>
                        <source type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="row no-margin-bot videoDetail">
                <div class="col push-m7 push-l8 s12 m5 l4 white-text right-align">
                     <span class="right-align-sm viewCount"></span> 
                     <span class="left-align-sm likeCount"></span> 
                     <br>
                     <button action_id="2" class="likeButton btn transparent right-align-sm" style="width:48%; display:none" ><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                     <button action_id="1" class="likeButton btn transparent right-align-sm" style="width:48%; display:none"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
                     <button action_id="2" class="featureButton btn red darken-3 transparent right-align-sm" style="width:48%;display:none" ><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                     <button action_id="1" class="featureButton btn transparent right-align-sm" style="width:48%;display:none"><i class="fa fa-newspaper-o" aria-hidden="true"></i></button>
                     <br>
                     <a id="addToPlaylist" href="#">+ add to playlist</a>
<!--                         <button class="btn transparent left-align-sm" style="width:48%"><i class="fa fa-star" aria-hidden="true"></i></button>
                     <button class="btn transparent left-align-sm" style="width:48%"><i class="fa fa-star-o" aria-hidden="true"></i></button>-->
                </div>
                <div class="col pull-m5 pull-l4 s12 m7 l8">
                    <span class="small grey-text videoDatetime"></span>
                    <h5 class="white-text no-margin-top videoDescription"></h5>
                </div>

            </div>
            <div class="row uploaderDetail ">
                <div class="col s12 valign-wrapper">
                    <div class="valign" style="width:10%; float:left; max-width: 50px;">
                        <a href=""><img onError="this.onerror=null;this.src='<?=asset_url()?>image/no_profile_photo.jpg';" alt="Profile Photo" class="responsive-img circle"></a>
                    </div>
                    <div class="valign" style="width:89%;padding:0 10px 0 10px;float:left">
                        <a href="" class=""><span class="white-text uploaderFullName"> Happy Grandpa</span></a>
                        <br>
                        <button type="button" action_id="1" class="subscriptionButton waves-effect waves-light btn btn-sm red darken-4 " style="display:none">Subscribe</button>
                        <button type="button" action_id="2" class="unSubscriptionButton waves-effect waves-light btn btn-sm red-outline white darken-4" style="display:none">Unsubscribe</button>
                    </div>

                </div>
                <div class="col s12 white-text ">
                    <p class="videoDetail grey-text"></p>
                </div>
            </div>
        </div>
        <div id="videoPlaylistPanel" class="col m3 no-padding-left" >
            <span class="grey-text">Playlist</span>
            <div id="videoPlaylist" style="overflow-y: scroll">

            </div>
        </div>
        <div class="col s12 center">
            <button class="showComment btn btn-sm transparent"><i class="fa fa-comments" aria-hidden="true"></i> show comments</button>
        </div>
    </div>
    <div class=" row margin-side-10 " >
        <div class="commentSection col s12 m9" style="display:none">
            <form id="createComment" method="POST">
                <input type="hidden" name="parent_ID" value="0">
                <div class="row white  no-margin-bot">
                    <div class="input-field col s12  padding-top-10 ">
                        <textarea name="content"  class="materialize-textarea padding-5 width-99" ></textarea>
                        <label class="" >Write a Comment</label>
                    </div>

                </div>
                <div class="row white  margin-bottom-10">
                    <div class="col s12 margin-bottom-10">
                        <button type="submit" class="btn btn-default pull-right red darken-3"><i class="fa fa-comment" aria-hidden="true"></i> Post Comment</button>
                    </div>

                </div>
            </form>
            <div class="row">
                <div id="commentPanel" class="col s12 ">
                    
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="prototype">
        <div class="videoComment row white margin-bottom-10 padding-10">
            <div class="col s12  ">
                <div class="" style="width:10%; float:left; max-width: 50px;">
                    <a href=""><img onError="this.onerror=null;this.src='<?=asset_url()?>image/no_profile_photo.jpg';" alt="Profile Photo" src="<?=  asset_url("image/no_profile_photo.jpg")?>" class="responsive-img circle"></a>
                </div>
                <div class="" style="width:89%;padding:0 10px 0 10px;float:left">
                    <a href="" class=""><span class="commentFullName"> Happy Grandpa</span></a><span class="datetime pull-right grey-text">Oct 1, 2015</span>
                    <br>
                    <span class="commentContent">Tst rani nga coomen</span>
                </div>

            </div>
        </div>
    </div>
</div>