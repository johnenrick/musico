<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_account_photo extends API_Controller {
    /*
     * Access Control List
     * 1    - createAccountPhoto
     * 2    - retrieveAccountPhoto
     * 4    - updateAccountPhoto
     * 8    - deleteAccountPhoto
     * 16   - batchCreateAccountPhoto
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_account_photo");
        $this->APICONTROLLERID = 1;
    }
    public function createAccountPhoto(){
        $this->accessNumber = 1;
        if($this->checkACL() && $this->userID){
            $this->form_validation->set_rules('type', 'Type', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_account_photo->createAccountPhoto(
                        $this->userID,
                        $this->input->post("type"),
                        1
                        );
                if($result){
                    $fileUpload = $this->uploadFile($this->userID);
                    if(!is_string($fileUpload)){
                        
                        $this->m_account_photo->updateAccountPhoto($result, NULL, array(
                           "file_uploaded_ID" =>  $fileUpload
                        ));
//                        $this->m_account_photo->deleteAccountPhoto(NULL, array(//remove previous entry
//                            "account_photo__type" => $this->input->post("type"),
//                            "account_photo__account_ID" => $this->userID,
//                            "not__account_photo__ID" => $result
//                        ));
                        $this->responseDebug($this->input->post("type"));
                        $this->responseDebug($this->userID);
                        $this->actionLog($result);
                        $this->responseData($result);
                    }else{//failed reverse
                        $this->m_account_photo->deleteAccountPhoto($result);
                        $this->responseError(4, $fileUpload);
                    }
                    
                }else{
                    $this->responseError(3, "Failed to create");
                }
            }else{
                if(count($this->form_validation->error_array())){
                    $this->responseError(102, $this->form_validation->error_array());
                }else{
                    $this->responseError(100, "Required Fields are empty");
                }
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function retrieveAccountPhoto(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_account_photo->retrieveAccountPhoto(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_account_photo->retrieveAccountPhoto(
                    1,
                    NULL,
                    NULL,
                    NULL,
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    ));
            }
            if($result){
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(2, "No Result");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function updateAccountPhoto(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_account_photo->updateAccountPhoto(
                    $this->input->post("ID"),
                    $this->input->post("condition"),
                    $this->input->post("updated_data")
                    );
            if($result){
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(3, "Failed to Update");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function deleteAccountPhoto(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_account_photo->deleteAccountPhoto(
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($result){
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(3, "Failed to delete");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function uploadFile($accountID = false){
        $this->load->library("upload");
        $path = "assets/user_upload/$accountID/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'png|jpg';
        $config['max_size']             = 2000;//kb
        $config['encrypt_name']         = true;
        $config['file_ext_tolower']     = true;
        $this->responseDebug($_FILES['userfile']['type']);
        $this->upload->initialize($config);
        $this->load->library('upload');

        if ($this->upload->do_upload()){
            $uploadData = $this->upload->data();
            $this->load->model("M_file_uploaded");
            return $this->M_file_uploaded->createFileUploaded($uploadData["file_name"], $uploadData["image_type"], $uploadData["file_path"], $uploadData["file_size"]);
        }else{
            $this->responseDebug($this->upload->data());
            $error = $this->upload->display_errors("","");
            return $error;
        }
    }
}
