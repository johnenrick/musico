<?php

/* Created by John Enrick Pleños */
class Video_list_banner extends FE_Controller{
    public function index(){
        $this->loadComponent("video_list_banner/video_list_banner", "video_list_banner/video_list_banner");
    }
}

