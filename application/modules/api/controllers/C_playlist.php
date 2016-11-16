<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_playlist extends API_Controller {
    /*
     * Access Control List
     * 1    - createPlaylist
     * 2    - retrievePlaylist
     * 4    - updatePlaylist
     * 8    - deletePlaylist
     * 16   - batchCreatePlaylist
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_playlist");
        $this->APICONTROLLERID = 1;
    }
    public function createPlaylist(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->formValidationSetRule('title', 'Title', 'required');
            $this->formValidationSetRule('description', 'Description', 'required');
            if($this->formValidationRun()){
                $result = $this->m_playlist->createPlaylist(
                        $this->input->post("title"),
                        $this->input->post("description"),
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
    public function retrievePlaylist(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_playlist->retrievePlaylist(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_playlist->retrievePlaylist(
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
    public function updatePlaylist(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_playlist->updatePlaylist(
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
    public function deletePlaylist(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_playlist->deletePlaylist(
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
