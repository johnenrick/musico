<div id="memberProfile" >
    <div class="row no-margin-bot ">
        <div id="profile-header" class="col m12 valign-wrapper">
            <div class="col m9 valign center-align">
                <button class="changeProfileCover btn btn-large transparent red-darken-4-transparent c-center  no-display"><i class="fa fa-edit" aria-hidden="true"></i> Change Cover</button>
                <button class="changeProfilePhoto btn btn-large transparent red-darken-4-transparent c-center no-display"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</button>
                
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
                <ul class="links tabs" style="overflow-x: hidden">
                    <li class="tab"><a href="#memberProfileHomeTab">Home</a></li>
                    <li class="tab"><a href="#memberProfileVideoTab">Videos</a></li>
                    <li class="tab"><a href="#playlist">Playlist</a></li>
                    <li class="tab"><a href="#memberProfileAboutTab">About</a></li>
                </ul>
            </div>
            <div class="col m3 center-align" >
                <a class="subscriptionButton waves-effect waves-light btn red darken-4 ">Subscribe <span class="subscriptionCount" style="font-size:11px"></span></a>
                <a class="unSubscriptionButton waves-effect waves-light btn red-outline white darken-4 ">Unsubscribe <span class="subscriptionCount" style="font-size:11px"></span></a>
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
        <div class="modal-content ">
            <h4>Cover Photo <i class="fa fa-picture-o" aria-hidden="true"></i></h4>
            <div class="row">
                <div class="col s12 file-field input-field left">
                    <div class="btn">
                      <span><i class="fa fa-upload" aria-hidden="true"></i> Upload Image</span>
                      <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col s12 center-align ">
                    <div id="coverPhotoPreview" class="fixed-dragger-cropper">
                        <img src="<?=  asset_url("image/sample-header.jpg")?>"   style="width:100%">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            
            <button class="saveCover btn green"><i class="fa fa-check" aria-hidden="true"></i> Save Cover</button>
            <a  class=" modal-action btn-flat label-danger no-display">Fail</a>
            <a  class="label-info modal-action btn-flat no-display">Please wait...</a>
        </div>
    </div>
    
    <div id="profilePhotoModal" class="modal modal-lg modal-fixed-footer">
        <div class="modal-content ">
            <h4>Profile Photo <i class="fa fa-picture-o" aria-hidden="true"></i></h4>
            <div class="row">
                <div class="col s12 file-field input-field left">
                    <div class="btn">
                      <span><i class="fa fa-upload" aria-hidden="true"></i> Upload Image</span>
                      <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col s12 center-align ">
                    <div id="profilePhotoPreview" class="fixed-dragger-cropper">
                        <img src="<?=  asset_url("image/sample-header.jpg")?>"   style="width:100%">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            
            <button class="savePhoto btn green"><i class="fa fa-check" aria-hidden="true"></i> Save Photo</button>
            <a  class=" modal-action btn-flat label-danger no-display">Fail</a>
            <a  class="label-info modal-action btn-flat no-display">Please wait...</a>
        </div>
    </div>










    


    
</div>