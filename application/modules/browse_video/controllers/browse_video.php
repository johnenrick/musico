<?php

/* Created by John Enrick Pleños */
class Browse_video extends FE_Controller{
    public function index($source = false){
        if(!$this->input->post("load_module")){
            $this->loadPage("browse_video");
        }else{
            $this->loadModule("browse_video", "browse_video_script");
        }
    }
}

