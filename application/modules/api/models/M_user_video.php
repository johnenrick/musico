<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_user_video
 *
 * @author johnenrick
 */
class M_user_video extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "user_video";
    }
    public function createUserVideo($accountID, $fileUploadedID, $videoCategoryID, $title, $details, $status){
        $newData = array(
            "account_ID" => $accountID,
            "file_uploaded_ID" => $fileUploadedID,
            "video_category_ID" => $videoCategoryID,
            "thumbnail_file_uploaded_ID" => 0,
            "title" => $title,
            "details" => $details,
            "status" => $status,
            "datetime" => time()
                
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveUserVideo($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "file_uploaded" => " file_uploaded.ID=user_video.file_uploaded_ID",
            "file_uploaded AS thumbnail_file_uploaded" => " thumbnail_file_uploaded.ID=user_video.thumbnail_file_uploaded_ID"
        );
        $selectedColumn = array(
            "user_video.*",
            "file_uploaded.description AS file_uploaded_description, file_uploaded.datetime AS file_uploaded_datetime, file_uploaded.file_type AS file_uploaded_file_type",
            "thumbnail_file_uploaded.description AS thumbnail_file_uploaded_description, thumbnail_file_uploaded.datetime AS thumbnail_file_uploaded_datetime, thumbnail_file_uploaded.file_type AS thumbnail_file_uploaded_file_type"
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateUserVideo($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteUserVideo($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
