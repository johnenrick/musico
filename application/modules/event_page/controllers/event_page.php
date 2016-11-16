<?php

/* Created by John Enrick Pleños */
class Event_page extends FE_Controller{
    public function index(){
        if(!$this->input->post("load_module")){
            $this->loadPage("event_page");
        }else{
            $this->loadModule("event_page", "event_page_script");
        }
    }
}

