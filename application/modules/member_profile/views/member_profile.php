<div id="memberProfile" >
    <div class="row no-margin-bot ">
        <div id="profile-header" class="col m12 valign-wrapper">
            <div class="col m9 ">
                <button class="changeProfileCover btn btn-large transparent red-darken-4-transparent c-center valign"><i class="fa fa-edit" aria-hidden="true"></i> Change Background</button>
            </div>
            <div class="col m3 pro-info">
                
                <img src="http://localhost/musico/assets/image/profpic.jpg">
                <h5 class="profileFullName">Jane Doe</h5>
                <p class="profileBiography">
                    Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.
                </p>
            </div>
        </div>
    </div>
    <div id="profile-menu" class="row white">
            <div class="col m9">
                <ul class="links tabs">
                    <li class="tab"><a class="active" href="#memberProfileHomeTab">Home</a></li>
                    <li class="tab"><a href="#memberProfileVideoTab">Videos</a></li>
                    <li class="tab"><a href="#playlist">Playlist</a></li>
                    <li class="tab"><a href="#memberProfileAboutTab">About</a></li>
                </ul>
            </div>
            <div class="col m3 center-align">
                <a class="waves-effect waves-light btn red darken-4 ">Subscribe</a>
                <span>14,321 subscribers</span>
            </div>
    </div>
    <div class=" clearfix row">
        <div class="tabContent col s12">
            <!--TAB CONTENTS ARE PLACED IN SUB MODULE-->
            
        </div>



        <!-- playlist -->
        <div id="playlist" class="col m12">
            <div id="profile-list" class="col m12">
                <div class="col m12 col-left"> 
                    <div class="col s3 m3 l3 videoItem" user_video_id="1">
                        <div class="card hoverable transparent z-depth-0 small  card-fixed">
                            <div class="card-image">
                                <a href="">
                                    <img src="http://localhost/musico/assets/sample_image/s4.jpg">
                                </a>
                            </div>
                            <div class="">
                                <h6 class=" blue-text darken-4" style="font-weight:bold"><a class="videoDescription" href="">Cycling to the Mountains</a></h6>
                                <div class="grey-text lighten-2">
                                    <span class="uploadederName truncate">The Mountain Bikers</span>
                                    <div class="thin valign " style="font-size: 11px">
                                        <span class="videoAge">2 months ago</span>
                                        <span class="viewCount right-aligned right">10 views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div id="profileCoverPhotoModal" class="modal modal-lg modal-fixed-footer">
        <div class="modal-content">
            <h4>Cover Photo <i class="fa fa-picture-o" aria-hidden="true"></i></h4>
            <div class="row">
                <div class="col s12 center-align">
                    <div id="coverPhotoPreview" class="fixed-dragger-cropper">
                        <img src="<?=  asset_url("image/sample-header.jpg")?>"   style="width:100%">
                    </div>
                </div>
            </div>
            <form accept-charset="utf-8" enctype="multipart/form-data" method="POST">
                <input type="hidden" value="2">
                <input name="userfile" type="file">
            </form>
        </div>
        
        <div class="modal-footer">
            <button class="btn left"><i class="fa fa-upload" aria-hidden="true"></i> Upload Image</button>
            <button class="saveCover btn green"><i class="fa fa-check" aria-hidden="true"></i> Save Cover</button>
        </div>
    </div>










    


    
</div>