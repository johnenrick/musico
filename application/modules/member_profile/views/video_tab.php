<div id="memberProfileVideoTab" >
    <div class="row">
        <div class="col s12">
            <button id="uploadNewVideo" class="btn red darken-3">Upload Video</button>
        </div>
    </div>
    <hr>
    <div class="row white">
        <div id="videoUploaded" class="col s12 ">
            
        </div>
    </div>
    <div id="userVideoModal" class="modal modal-fixed-footer">
        <form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
            <input name="ID" type="hidden">
            <div class="modal-content">
                <h4 class="red-text text-darken-3">Video Detail</h4>
                <div id="videoSelection" class="row ">
                    <div class="col s12">
                        <div class="file-field input-field">
                            <div class="btn btn-sm red darken-3">
                                <span>File</span>
                                <input id="userVideoInput" type="file" accept="video/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 center-align">
                        <video id="userVideoPlayer" controls style="width:80%;" class="align-center" >
                            <source src="movie.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div id="screenCapture" class="col s12 valign-wrapper">
                        <button type="button" class="btn valign margin-right-5">Capture Screen </button>
                        <input type="file" name="thumbnail_userfile" class="no-display"> 
                        <img class="valign margin-right-5" src="" style="height:50px;width:90px; display:none">
                        <span class="small red-text thin">*Play the video and press CAPTURE to set the current scene as thumbnail</span>
                        
                    </div>
                </div>
                <div id="videoDetail" class="row">
                    <div class="input-field col s6 m6">
                        <input field_name="title" type="text" class="validate valid" >
                        <label class="active" data-error="Invalid Data">Title</label>
                    </div>
                    <div class="input-field col s6 m6">
                        <input field_name="video_category_ID" type="text" class="validate valid" >
                        <label class="active" data-error="Invalid Data">Category</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <textarea field_name="details" class="materialize-textarea" ></textarea>
                        <label class="active" data-error="Invalid Data">Details</label>
                    </div>
                </div>
                    
            </div>
            <div class="modal-footer formActionButton">
                <button action_id="next_video_detail" type="button" class="btn waves-effect waves-light  green darken-3">Proceed <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <button action_id="back_close" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Back</button>
            </div>
        </form>
    </div>
</div>