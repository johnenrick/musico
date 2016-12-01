<div id="memberProfilePlaylistTab" >
    <button class="btn red darken-3 createPlaylist"><i class="fa fa-plus" aria-hidden="true"></i> Create Playlist</button>
    <ul id="playlistContainer" class="collapsible popout" data-collapsible="expandable">
        
    </ul>
    <div class="playlistModal modal modal-sm">
        <div class="modal-content ">
            <div class="row">
                <form method="POST" class="col s12">
                    <input placeholder="Title" name="ID" type="hidden" >
                    <h5 class="red-text text-red-darken-3">Playlist</h5>
                    <div class="formMessage">
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Title" field_name="title" type="text" class="validate valid">
                            <label class="active"  data-error="Invalid Data">Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Description" field_name="description" type="text" class="validate valid">
                            <label class="active"  data-error="Invalid Data">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="formActionButton col s12">
                            <label class="pull-left" action="delete_confirmation">Are you sure?</label>
                            <button type="button"  class="btn-flat pull-left btn-sm" action="delete">Delete</button>
                            <button type="button"  class="btn-flat pull-left btn-sm" action="delete_yes">Yes</button>
                            <button type="button"  class="btn-flat pull-left btn-sm" action="delete_no">No</button>
                            <label class="formLabelIndicator label-danger right-align no-display">Failed !</label>
                            <label class="formLabelIndicator label-success right-align no-display">Success !</label>
                            <button type="submit" class="btn green darken-1 pull-right" action="submit">Save</button>
                      </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="playlistVideo collection with-header">
                        <li class="collection-header"><h6>Playlist Video</h6></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="prototype">
        <li class="playlistEntry" playlist_id="0">
            <div class="collapsible-header">
                <span class="playlistTitle">First Playlist</span>
                <span class="playlistDescription grey-text small">This is the first sample playlist</span>
                <a class="editPlaylistDetail blue-text btn-flat">Edit</a>
            </div>
            <div class="playlistVideoContainer collapsible-body">
            </div>
        </li>
        <li class="playlistVideoItem collection-item">
            <div>
                <span class="title"></span>
                <a href="#" class="removePlaylistVideo secondary-content red-text"><i class="fa fa-trash " aria-hidden="true"></i> remove</a>
            </div>
        </li>
    </div>
</div>