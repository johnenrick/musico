<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user_video_like extends API_Controller {
    /*
     * Access Control List
     * 1    - createUserVideoLike
     * 2    - retrieveUserVideoLike
     * 4    - updateUserVideoLike
     * 8    - deleteUserVideoLike
     * 16   - batchCreateUserVideoLike
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_user_video_like");
        $this->APICONTROLLERID = 1;
    }
    public function createUserVideoLike(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('user_video_ID', 'User Video', 'required');
            if($this->form_validation->run()){
                $result = $this->m_user_video_like->createUserVideoLike(
                        $this->userID,
                        $this->input->post("user_video_ID")
                        );
                if($result){
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
    public function retrieveUserVideoLike(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_user_video_like->retrieveUserVideoLike(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_user_video_like->retrieveUserVideoLike(
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
    public function updateUserVideoLike(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_user_video_like->updateUserVideoLike(
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
    public function deleteUserVideoLike(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_user_video_like->deleteUserVideoLike(
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
}
