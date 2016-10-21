<?php

/* Created by John Enrick Pleños */
class Video_list extends FE_Controller{
    public function index(){
        $this->loadComponent("video_list/video_list", "video_list/video_list");
    }
}

