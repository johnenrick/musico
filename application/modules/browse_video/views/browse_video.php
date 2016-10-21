<div id="browseVideo" class="section">
    <form id="searchBar" method="POST">
        <div class="row searchField no-margin-bot">
                <div class="input-field col s9  m6 offset-m2   primary-input no-padding-right valign-wrapper">
                    <input type="text" id="searchText" class="autocomplete white pull-right valign no-margin-bot" placeholder="  Search Music Cover">
                </div>
                <div class="input-field col s3 m3 no-padding-left valign-wrapper">
                    <button type="submit" class="valign btn red darken-3 pull-left "><i class="fa fa-search" aria-hidden="true"></i> <span class="hide-on-small-and-down">Search</span></button>
                </div>
                <div class="searchingMessage italic red-text text-darken-3 input-field col s12  m9 offset-m2 no-margin-top no-padding-left" >
                    Search by keyword, title, artist, details
                </div>
        </div>
        <div class="row hide no-margin-top">
            <div class="input-field col s10  m4 offset-m2   no-margin-top no-padding-left">
                <span class="red-text text-darken-3">Search in  </span> 
                <span class="red-text  text-darken-3"> any category </span>
            </div>
            <div class="input-field col s2  m2    no-margin-top no-padding-left ">
                <span class="blue-text darken-4 pull-right" > + categories</span>
            </div>
        </div>
        <div class="row filterOption hide">
            <div class="input-field col s12 m4 no-margin-top">
                <input class="checkbox-red" type="checkbox" id="test5"/>
                <label for="test5" class="red-text text-darken-3">Contemporary Blues</label>
            </div>
            <div class="input-field col s12 m4 no-margin-top">
                <input class="checkbox-red" type="checkbox" id="test5"/>
                <label for="test5" class="red-text text-darken-3">Contemporary Blues</label>
            </div>
            <div class="input-field col s12 m4 no-margin-top">
                <input class="checkbox-red" type="checkbox" id="test5"/>
                <label for="test5" class="red-text text-darken-3">Contemporary Blues</label>
            </div>
            <div class="input-field col s12 m4 no-margin-top">
                <input class="checkbox-red" type="checkbox" id="test5"/>
                <label for="test5" class="red-text text-darken-3">Contemporary Blues</label>
            </div>
            <div class="input-field col s12 m4 no-margin-top">
                <input class="checkbox-red" type="checkbox" id="test5"/>
                <label for="test5" class="red-text text-darken-3">Contemporary Blues</label>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col s12">
            <div class="section">
                <h6 class="searchResultIndicator red-text darken-3 " style="font-weight: bold">Random Videos</h6>
                <div class="row videoList">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="prototype">
        <div class="col s12 m6 videoItem" user_video_id="0">
            <div class="card horizontal hoverable" >
                <div class="card-image" >
                    <a href="#"><img onError="this.onerror=null;this.src='<?=  asset_url()?>/image/no_video_image.jpg';"  src="<?= asset_url("user_upload/1/b935825b3a3efe6d6f600c133fd886b9.jpg") ?>"></a>
                </div>
                <div class="card-stacked" >
                    <div class="card-content">
                        <h6 class="blue-text darken-4" style="font-weight:bold;"><a class="videoDescription" href="#">Cycling to the Mountains</a></h6>
                        <div class="grey-text lighten-2">
                            <span class="uploadederName truncate">The Mountain Bikers</span>
                            <div class="thin valign truncate" style="font-size: 11px">
                                <span class="videoDetails "></span>
                                <br>
                                <span class="videoAge">5 months ago</span>
                                <span class="viewCount right-aligned right">10 views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>