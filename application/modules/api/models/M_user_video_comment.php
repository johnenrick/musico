<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_user_video_comment
 *
 * @author johnenrick
 */
class M_user_video_comment extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "user_video_comment";
    }
    public function createUserVideoComment($userVideoID, $parentID, $accountID, $content){
        $newData = array(
            "user_video_ID" => $userVideoID,
            "parent_ID" => $parentID,
            "account_ID"=>$accountID,
            "content" => $content,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveUserVideoComment($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "account_information" => "account_information.account_ID=user_video_comment.account_ID",
            "account_photo AS account_profile_photo" => "account_profile_photo.account_ID=user_video_comment.account_ID AND account_profile_photo.type=1 AND account_profile_photo.status=1",
            "file_uploaded AS account_profile_photo_file_uploaded" => "account_profile_photo_file_uploaded.ID=account_profile_photo.file_uploaded_ID"
        );
        $selectedColumn = array(
            "user_video_comment.*",
            "account_information.first_name, account_information.middle_name, account_information.last_name",
            "account_profile_photo.ID AS account_profile_photo_ID, account_profile_photo_file_uploaded.description AS account_profile_photo_file_uploaded_description"
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateUserVideoComment($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteUserVideoComment($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
