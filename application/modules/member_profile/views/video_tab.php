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
                <div class="formMessage"></div>
                <div class="row ">
                    <div id="userVideoInput" class="col s12">
                        <div  class="file-field input-field">
                            <div class="btn btn-sm red darken-3">
                                <span>File</span>
                                <input  type="file" field_name="userfile" name="userfile" accept="video/*">
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
                        <!--<input type="file" name="thumbnail_userfile" class="no-display">--> 
                        <img class="valign margin-right-5" src="" style="height:50px;width:90px; display:none">
                        <span class="small red-text thin">*Play the video and press CAPTURE to set the current scene as thumbnail</span>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6">
                        <input field_name="title" type="text" class="validate valid" >
                        <label class="active" data-error="Invalid Data">Title</label>
                    </div>
                    <div class="input-field col s6 m6">
                        <input field_name="video_category_ID" type="text" class="validate valid" >
                        <label class="active" data-error="Invalid Data">Category</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="userVideoDetailTextarea" field_name="details" class="materialize-textarea validate" ></textarea>
                        <label for="userVideoDetailTextarea" >Details</label>
                    </div>
                </div>
                    
            </div>
            
            <div class="modal-footer formActionButton">
                <label class="pull-left" action="delete_confirmation">Are you sure?</label>
                <button type="button"  class="btn-flat pull-left btn-sm" action="delete">Delete</button>
                <button type="button"  class="btn-flat pull-left btn-sm" action="delete_yes">Yes</button>
                <button type="button"  class="btn-flat pull-left btn-sm" action="delete_no">No</button>
                
                
                <button type="submit" class="btn green darken-1 pull-right" action="submit">Save</button>
                <label class="formLabelIndicator label-success right-align no-display">Success !</label>
                <label class="formLabelIndicator label-danger pull-right no-display">Failed !</label>
                <button action_id="back_close" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Back</button>
            </div>
        </form>
    </div>
</div>