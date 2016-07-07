<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user_video extends API_Controller {
    /*
     * Access Control List
     * 1    - createUserVideo
     * 2    - retrieveUserVideo
     * 4    - updateUserVideo
     * 8    - deleteUserVideo
     * 16   - batchCreateUserVideo
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_user_video");
        $this->APICONTROLLERID = 1;
    }
    public function createUserVideo(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('video_category_ID', 'Video Category', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[100]|trim');
            $this->form_validation->set_rules('details', 'Details', 'required');          
            
            
            if($this->form_validation->run()){
                $result = $this->m_user_video->createUserVideo(
                        $this->userID,
                        0,
                        $this->input->post("video_category_ID"),
                        $this->input->post("title"),
                        $this->input->post("details"),
                        2
                        );
                if($result){
                    $this->load->model("M_file_uploaded");
                    $fileUpload = $this->uploadFile($this->userID);
                    if(!is_string($fileUpload)){
                        $this->m_user_video->updateUserVideo($result, NULL, array(
                            "file_uploaded_ID" =>  $fileUpload,
                            "status" =>  1
                        ));
                        $this->actionLog($result);
                        $this->responseData($result);
                    }else{//failed reverse
                        $this->M_file_uploaded->deleteFileUploaded($result);
                        $this->responseError(4, $fileUpload);
                    }
                    
                    
                    $this->actionLog($result);
                    $this->responseData($result);
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
    public function retrieveUserVideo(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_user_video->retrieveUserVideo(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_user_video->retrieveUserVideo(
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
    public function updateUserVideo(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_user_video->updateUserVideo(
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
    public function deleteUserVideo(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_user_video->deleteUserVideo(
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
        $config['allowed_types']        = 'mp4';
        $config['max_size']             = 100000;//kb
        $config['encrypt_name']         = true;
        $config['file_ext_tolower']     = true;
        
        $this->upload->initialize($config);
        $this->load->library('upload');

        if ($this->upload->do_upload()){
            $uploadData = $this->upload->data();
            $this->load->model("M_file_uploaded");
            return $this->M_file_uploaded->createFileUploaded($uploadData["file_name"], $uploadData["image_type"], $uploadData["file_path"], $uploadData["file_size"]);
        }else{
            $error = $this->upload->display_errors("","");
            return $error;
        }
    }
}
