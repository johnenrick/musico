<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_subscription
 *
 * @author johnenrick
 */
class M_subscription extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "subscription";
    }
    public function createSubscription($subscribedAccountID, $subscriberAccountID){
        $newData = array(
            "subscribed_account_ID" => $subscribedAccountID,
            "subscriber_account_ID" => $subscriberAccountID,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveSubscription($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
        );
        $selectedColumn = array(
            "subscription.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateSubscription($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteSubscription($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
