<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user_video_view extends API_Controller {
    /*
     * Access Control List
     * 1    - createUserVideoView
     * 2    - retrieveUserVideoView
     * 4    - updateUserVideoView
     * 8    - deleteUserVideoView
     * 16   - batchCreateUserVideoView
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_user_video_view");
        $this->APICONTROLLERID = 1;
    }
    public function createUserVideoView(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('user_video_ID', 'User Video', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_user_video_view->createUserVideoView(
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
    public function retrieveUserVideoView(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_user_video_view->retrieveUserVideoView(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_user_video_view->retrieveUserVideoView(
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
    public function updateUserVideoView(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_user_video_view->updateUserVideoView(
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
    public function deleteUserVideoView(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_user_video_view->deleteUserVideoView(
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
