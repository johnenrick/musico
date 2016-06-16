<?php

/* Created by John Enrick Pleños */

class Video extends FE_Controller{
    public function index(){
        if($this->input->post("load_module")){
            $this->loadModule("video", "video_script");
        }else{
            $this->loadPage("video");
        }
    }
    
}