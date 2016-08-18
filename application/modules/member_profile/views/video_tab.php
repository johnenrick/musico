<div id="memberProfileVideoTab" >
    <div id="videos" class="col m12">
        <div id="profile-list" class="col m12">
            <div class="col m12 col-left" id="videoContainer">
                <a class="waves-effect waves-light btn red darken-4 modal-trigger" href="#upload">Upload</a>
                <hr>
                <div class="col s3 m3 l3 hide videoItem dummy" user_video_id="1">
                    <div class="card hoverable transparent z-depth-0 small  card-fixed">
                        <div class="card-image">
                            <a href="">
                                <img src="http://localhost/musico/assets/sample_image/s4.jpg">
                            </a>
                        </div>
                        <div class="">
                            <h6 class=" blue-text darken-4" style="font-weight:bold"><a class="videoDescription" id="title" href="">Cycling to the Mountains</a></h6>
                            <div class="grey-text lighten-2">
                                <span class="uploadederName truncate" id="description">The Mountain Bikers</span>
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
    <div id="upload" class="modal modal-fixed-footer">
        <form id="uploadForm" action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="modal-content">
                <!-- <h4>Upload</h4> -->
                    <div class="row">
                        <div class="input-field col s12">
                                <input placeholder="Video title" id="title" name="title" type="text" class="validate">
                                <label for="Title">Title</label>
                        </div>
                        <div class="col m7">
                            <div class="file-field input-field">
                                <div class="btn red darken-4">
                                    <span>File</span>
                                    <input name="userfile" id="videoFile" type="file" accept="video/*" name="video"/>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text"/>
                                </div>
                            </div>
                            <div class="col m12">
                                <video id="video" controls width="320" height="210" onloadedmetadata="$(this).trigger('video_really_ready')"></video>
                            </div>
                        </div>
                        <div class="input-field col m5">
                            <div class="input-field col s12">
                                  <select name="video_category_ID" class="browser-default">
                                    <option value="1" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="1">Option 2</option>
                                    <option value="1">Option 3</option>
                                  </select>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="details" name="details" class="materialize-textarea" row="2"></textarea>
                                <label for="textarea1">Description</label>
                            </div>
                            <div class="input-field col s12">
                                <div class="col s6">
                                    <button class="btn red darken-4" type="button" id="capture">Capture</button>
                                </div>
                                <div class="col s6">
                                    <div id="screen"></div>
                                </div>
                            </div>
                            <input id="video_id" type="hidden" name="user_video_ID">
                            <input id="thumbnail" type="hidden" name="thumbnail_userfile">
                        </div>  
                    </div>
                </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                <button type="submit" class="btn waves-effect waves-light red darken-1">SAVE</button>
            </div>
        </form>
    </div>
</div>