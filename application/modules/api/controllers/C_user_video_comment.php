<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user_video_comment extends API_Controller {
    /*
     * Access Control List
     * 1    - createUserVideoComment
     * 2    - retrieveUserVideoComment
     * 4    - updateUserVideoComment
     * 8    - deleteUserVideoComment
     * 16   - batchCreateUserVideoComment
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_user_video_comment");
        $this->APICONTROLLERID = 1;
    }
    public function createUserVideoComment(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->formValidationSetRule('user_video_ID', 'User Video', 'required');
            $this->formValidationSetRule('content', 'Content', 'required');
            if($this->formValidationRun()){
                $result = $this->m_user_video_comment->createUserVideoComment(
                        $this->input->post("user_video_ID"),
                        $this->input->post("parent_ID"),
                        $this->userID,
                        $this->input->post("content")
                        );
                if($result){
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to create");
                }
            }else{
                if(count($this->formValidationError())){
                    $this->responseError(102, $this->formValidationError());
                }else{
                    $this->responseError(100, "Required Fields are empty");
                }
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function retrieveUserVideoComment(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_user_video_comment->retrieveUserVideoComment(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_user_video_comment->retrieveUserVideoComment(
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
    public function updateUserVideoComment(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_user_video_comment->updateUserVideoComment(
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
    public function deleteUserVideoComment(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_user_video_comment->deleteUserVideoComment(
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
