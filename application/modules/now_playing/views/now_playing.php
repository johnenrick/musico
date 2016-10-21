<div id="nowPlaying" class="">
    
        <div class="row grey darken-4 section">
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
                    <div class="col s10 offset-s1 white-text ">
                        <p class="videoDetail"></p>
                    </div>
                </div>
            </div>
            <div id="videoPlaylist" class="col m3 no-padding-left" style="overflow-y: scroll">
                
            </div>
        </div>
</div>