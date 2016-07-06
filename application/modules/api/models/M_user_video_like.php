<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_user_video_like
 *
 * @author johnenrick
 */
class M_user_video_like extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "user_video_like";
    }
    public function createUserVideoLike($accountID, $userVideoID){
        $newData = array(
            "account_ID" => $accountID,
            "user_video_ID" => $userVideoID,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveUserVideoLike($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
        );
        $selectedColumn = array(
            "user_video_like.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateUserVideoLike($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteUserVideoLike($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
