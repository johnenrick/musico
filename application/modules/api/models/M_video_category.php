<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_video_category
 *
 * @author johnenrick
 */
class M_video_category extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "video_category";
    }
    public function createVideoCategory($description, $parentID = 0){
        $newData = array(
            "description" => $description,
            "parent_ID" => $parentID
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveVideoCategory($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "video_category AS parent_video_category" => "parent_video_category.ID=video_category.parent_ID"
        );
        $selectedColumn = array(
            "video_category.*",
            "parent_video_category.description AS parent_description"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateVideoCategory($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteVideoCategory($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
