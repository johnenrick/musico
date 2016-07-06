<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_account_photo
 *
 * @author johnenrick
 */
class M_account_photo extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account_photo";
    }
    public function createAccountPhoto($accountID, $type, $status){
        $newData = array(
            "account_ID" => $accountID,
            "type" => $type,
            "status" => $status
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccountPhoto($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "file_uploaded" => "file_uploaded.ID=account_photo.file_uploaded_ID"
        );
        $selectedColumn = array(
            "account_photo.*",
            "concat(file_uploaded.path,file_uploaded.description,file_uploaded.file_type) AS full_path"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccountPhoto($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccountPhoto($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
