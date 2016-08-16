<!DOCTYPE html>
<html>

<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/materialize.min.css" media="screen,projection" />

    <!--Import customized style-->
    <link type="text/css" rel="stylesheet" href="<?=asset_url()?>css/common.css" />
</head>

<body>
    <!-- Navbar goes here -->
    <div id="content-container" class="row">
        <div id="page-content-container" class="col m12 l12">

            <div id="main" class="row">
                <div id="profile-header" class="col m12">
                    <div class="col m3 pro-info">
                        <img src="http://localhost/musico/assets/image/profpic.jpg">
                        <h5>Jane Doe</h5>
                        <p>
                            Lorem ipsum dolor sit amet, adhuc illud splendide mei ea. Ut has etiam lobortis consequuntur, ex harum veniam feugait has.
                        </p>
                    </div>

                </div>
                <div id="profile-menu" class="col m12">
                    <div class="col m9">
                        <ul class="links tabs">
                            <li class="tab"><a class="active" href="#home">Home</a></li>
                            <li class="tab"><a href="#videos">Videos</a></li>
                            <li class="tab"><a href="#playlist">Playlist</a></li>
                            <li class="tab"><a href="#discussions">Discussions</a></li>
                            <li class="tab"><a href="#about">About</a></li>
                        </ul>
                    </div>
                    <div class="col m3">
                        <a class="waves-effect waves-light btn red darken-4">Subscribe</a>
                        <span>14,321 subscribers</span>
                    </div>
                </div>
                <div id="home">
                    <div id="profile-list" class="col m12">
                        <div class="col m12 col-left">
                            <div class="col s8 m8 l8 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small card-large">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s1.jpg">
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

                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s1.jpg">
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

                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s2.jpg">
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


                           <h6 class="red-text text-darken-1 album-title">BIKE WORLD MANIA</h6>
                           <hr>

                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s2.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s3.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s14.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s5.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s6.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s7.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s8.jpg">
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
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s9.jpg">
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
                        <div class="col m3 col-right">
                           <h6>Popular Uploads</h6>

                            <div class="col s12 m12 l12 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s10.jpg">
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
                            <div class="col s12 m12 l12 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s11.jpg">
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
                            <div class="col s12 m12 l12 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s12.jpg">
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
                            <div class="col s12 m12 l12 videoItem" user_video_id="1">
                                <div class="card hoverable transparent z-depth-0 small  card-fixed">
                                    <div class="card-image">
                                        <a href="">
                                            <img src="http://localhost/musico/assets/sample_image/s13.jpg">
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












                <!-- videos -->
                <div id="videos" class="col m12">
                    <div id="profile-list" class="col m12">
                        <div class="col m12 col-left" id="videoContainer">
                        <a class="waves-effect waves-light btn red darken-4 modal-trigger" href="#upload">Upload</a>

                            <!-- Modal Structure -->
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



                <div id="discussions" class="col m12">
                    <div id="profile-list" class="col m12">
                        <div class="col m9 col-left">
                            <div class="col s4 m4 l4 videoItem" user_video_id="1">
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


                <div id="about" class="col m12">
                    <div id="profile-list" class="col m12">
                        <div class="col m9 col-left">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>Modal Header</h4>
                    <p>A bunch of text</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
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
    </div>


    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?=asset_url()?>js/materialize.min.js"></script>

    <script type="text/javascript" src="<?=asset_url()?>js/global.js"></script>
</body>

</html>
