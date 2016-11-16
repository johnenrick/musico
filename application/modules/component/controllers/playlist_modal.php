<?php

/* Created by John Enrick Pleños */
class Playlist_modal extends FE_Controller{
    public function index(){
        $this->loadComponent("playlist_modal/playlist_modal", "playlist_modal/playlist_modal");
    }
}

