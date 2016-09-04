<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_subscription extends API_Controller {
    /*
     * Access Control List
     * 1    - createSubscription
     * 2    - retrieveSubscription
     * 4    - updateSubscription
     * 8    - deleteSubscription
     * 16   - batchCreateSubscription
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_subscription");
        $this->APICONTROLLERID = 1;
    }
    public function createSubscription(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->formValidationSetRule('subscribed_account_ID', 'First Parameter', 'required');
            
            if($this->formValidationRun()){
                $this->m_subscription->deleteSubscription(NULL, array(
                    "subscribed_account_ID" => $this->input->post("subscribed_account_ID"),
                    "subscriber_account_ID" => $this->userID
                ));
                $result = $this->m_subscription->createSubscription(
                        $this->input->post("subscribed_account_ID"),
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
    public function retrieveSubscription(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_subscription->retrieveSubscription(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_subscription->retrieveSubscription(
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
    public function updateSubscription(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_subscription->updateSubscription(
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
    public function deleteSubscription(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $condition = $this->input->post("condition");
            if($condition){
                $condition["subscriber_account_ID"] = $this->userID;
            }
            $result = $this->m_subscription->deleteSubscription(
                    $this->input->post("ID"), 
                    $condition
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
