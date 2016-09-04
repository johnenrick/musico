<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portal
 *
 * @author johnenrick
 */
class Portal extends FE_Controller{
    //put your code here
    function index(){
        if($this->input->post("load_module")){
            $this->loadModule(array("portal"), "portal_script");
        }else{
            $this->loadPage("Portal");
        }
    }
    function login(){
        $this->form_validation->set_rules('username', 'Username/Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $this->load->model("api/M_account");
            $condition = array();
            $condition["password"] = sha1($this->input->post("password"));
            $condition[(filter_var($this->input->post("username"), FILTER_VALIDATE_EMAIL)) ? "email__detail" : "username"] = $this->input->post("username");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, NULL,$condition);
            if($result){
                $data["token"] = generateToken($result[0]["ID"], $result[0]["account_type_ID"], $result[0]["username"]);
                $data["ID"] = $result[0]["ID"];
                $data["username"] = $result[0]["username"];
                $data["first_name"] = $result[0]["first_name"];
                $data["middle_name"] = $result[0]["middle_name"];
                $data["last_name"] = $result[0]["last_name"];
                $data["account_type_ID"] = $result[0]["account_type_ID"];
                $data["decoded"] = decodeToken($data["token"]);
                $this->responseData($data);
                $this->response["token"] = $data["token"];
            }else{
                $this->responseError(5, "Username/Email and Password Mismatch");
            }
        }else{
           if(count($this->form_validation->error_array())){
                $this->responseError(102, $this->form_validation->error_array());
            }else{
                $this->responseError(100, "Type Username/Email and Password");
            }
        }
        $this->outputResponse();
    }
    public function testDecode(){
        echo 60*60*4;
        decodeToken("MGE2ZDU4ZWI3YjM1MmJjZWI1ODUxODMwOTBhYWMwMzcxYmVkZTBhMDdiZWMxNDgxOGNjOTdhOWYwOTg0YjM1MTg0Mzc3NTJiYzE5OWMzMmFiZWEyMDY2NmU5MDYzODE4ZTg2MGE1N2I1NjM0NGM1M2UxZjU2MDhmZGJhMDFkNmJ4Q1g1K3FEdWFYUFRiWEdjQU1qZzQzaWJZOWdRVW14c3Q5VCsyUUZ0ek9YYm1USnZBRlhGa05MRzM2cU5iNnY5UlgvQm9QakhWdS9BYzNLYVhleVJ4NEJjZHBnRFZER2hZSWFSVnhqbTJzanVpSVYwVUFXbGozaXRzbWJqcUJKRWZhVkdDa2tJUHliRHRnYk9BakJyOFBpNWo4VVV3d3ZFcVFTR2U0dS9vYnZqWmhoOHJDZjZZNEJDaUN5NG51dkE=");
    }
    public function userInformation(){
        if($this->userID){
            $this->load->model("api/M_account");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, $this->userID, array("in__account__status" => array(1,2)));
            if($result){
                $this->responseData($result);
            }else{
                $this->responseDebug($this->userID);
                $this->responseError(2, "Account Not Found");
            }
        }else{
            $this->responseError(3, "Not Loged In");
        }
        $this->outputResponse();
    }
    public function refreshSession(){
        $this->responseDebug(user_id());
        if(user_id()){
            $this->load->model("api/M_account");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, user_id(), array("status" => 1));
            $this->responseDebug($result);
            if($result){
                $this->createSession($result["first_name"], $result["last_name"], $result["middle_name"], $result["account_type_ID"], user_id(), $result["username"]);
                $this->responseData($result);
            }else{
                $this->responseError(2, "Account Not Found");
            }
        }else{
            $this->responseError(1, "Log In Required");
        }
        $this->outputResponse();
    }
    function logout(){
        $this->createSession(false, false, false, false, false, false);
        header("Location: ".base_url());
    }
    function testKey(){
        $this->load->library('encrypt');
        $msg = 'My secret message';
        $encrypted_string = $this->encrypt->encode($msg);
        echo time();
        
    }
    protected function createSession($firstName, $lastName, $middleName, $userType, $userID, $username){
        $this->session->set_userdata(array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "middle_name" => $middleName,
            "user_type" => $userType,
            "user_ID" => $userID,
            "username" => $username
        ));
    }
}
