<?php

/* Created by John Enrick Pleños */
class Video_category extends FE_Controller{
    public function index(){
        if(!$this->input->post("load_module")){
            $this->loadPage("video_category");
        }else{
            $this->loadModule("video_category", "video_category_script");
        }
    }
}

