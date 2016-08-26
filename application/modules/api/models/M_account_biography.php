<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_account_biography
 *
 * @author johnenrick
 */
class M_account_biography extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account_biography";
    }
    public function createAccountBiography($accountID, $detail){
        $newData = array(
            "account_ID" => $accountID,
            "detail" => $detail,
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccountBiography($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
        );
        $selectedColumn = array(
            "account_biography.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccountBiography($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccountBiography($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
