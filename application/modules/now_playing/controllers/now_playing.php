<?php

/* Created by John Enrick Pleños */
class Now_playing extends FE_Controller{
    public function index(){
        if(!$this->input->post("load_module")){
            $this->loadPage("now_playing");
        }else{
            $this->loadModule("now_playing", "now_playing_script");
        }
    }
}

