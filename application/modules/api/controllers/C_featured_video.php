<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_featured_video extends API_Controller {
    /*
     * Access Control List
     * 1    - createFeaturedVideo
     * 2    - retrieveFeaturedVideo
     * 4    - updateFeaturedVideo
     * 8    - deleteFeaturedVideo
     * 16   - batchCreateFeaturedVideo
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_featured_video");
        $this->APICONTROLLERID = 1;
    }
    public function createFeaturedVideo(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->formValidationSetRule('user_video_ID', 'User Video', 'required');
            
            if($this->formValidationRun()){
                $result = $this->m_featured_video->createFeaturedVideo(
                        $this->input->post("user_video_ID"),
                        $this->userID
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
    public function retrieveFeaturedVideo(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_featured_video->retrieveFeaturedVideo(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition"),
                    $this->input->post("additional_data"),
                    $this->input->post("group_by"),
                    $this->input->post("distinct")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_featured_video->retrieveFeaturedVideo(
                    1,
                    NULL,
                    NULL,
                    NULL,
                    $this->input->post("ID"), 
                    $this->input->post("condition"),
                    null,
                    $this->input->post("group_by"),
                    $this->input->post("distinct")
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
    public function updateFeaturedVideo(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $updatedData = $this->input->post("updated_data");
            if(isset($updatedData["removed_datetime"])){
                $updatedData["removed_datetime"] = time();
            }
            $result = $this->m_featured_video->updateFeaturedVideo(
                    $this->input->post("ID"),
                    $this->input->post("condition"),
                    $updatedData
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
    public function deleteFeaturedVideo(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_featured_video->deleteFeaturedVideo(
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
