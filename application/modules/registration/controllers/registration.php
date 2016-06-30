<?php

/* Created by John Enrick Pleños */
class Registration extends FE_Controller{
    public function index(){
        if(!$this->input->post("load_module")){
            $this->loadPage("registration");
        }else{
            $this->loadModule("registration", "registration_script");

        }
    }
}

