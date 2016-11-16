<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_playlist
 *
 * @author johnenrick
 */
class M_playlist extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "playlist";
    }
    public function createPlaylist($title, $description, $accountID){
        $newData = array(
            "title" => $title,
            "description" => $description,
            "account_ID" => $accountID,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrievePlaylist($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
        );
        $selectedColumn = array(
            "playlist.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updatePlaylist($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deletePlaylist($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
