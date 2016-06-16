<?php

/* Created by John Enrick Pleños */

class Registration extends FE_Controller{
    public function index(){
        if($this->input->post("load_module")){
            $this->loadModule("registration", "registration_script");
        }else{
            $this->loadPage("registration");
        }
    }
    
}