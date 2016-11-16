<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_playlist_video extends API_Controller {
    /*
     * Access Control List
     * 1    - createPlaylistVideo
     * 2    - retrievePlaylistVideo
     * 4    - updatePlaylistVideo
     * 8    - deletePlaylistVideo
     * 16   - batchCreatePlaylistVideo
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_playlist_video");
        $this->APICONTROLLERID = 1;
    }
    public function createPlaylistVideo(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->formValidationSetRule('playlist_ID', 'Playlist', 'required');
            
            if($this->formValidationRun()){
                $result = $this->m_playlist_video->createPlaylistVideo(
                        $this->input->post("playlist_ID"),
                        $this->input->post("user_video_ID")
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
    public function retrievePlaylistVideo(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_playlist_video->retrievePlaylistVideo(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_playlist_video->retrievePlaylistVideo(
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
    public function updatePlaylistVideo(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_playlist_video->updatePlaylistVideo(
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
    public function deletePlaylistVideo(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_playlist_video->deletePlaylistVideo(
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
