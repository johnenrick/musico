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
    public function retrieveUserVideo($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL, $additionalData = array()) {
        $joinedTable = array(
            "file_uploaded" => " file_uploaded.ID=user_video.file_uploaded_ID",
            "file_uploaded AS thumbnail_file_uploaded" => " thumbnail_file_uploaded.ID=user_video.thumbnail_file_uploaded_ID",
            "account_information" => "account_information.account_ID=user_video.account_ID",
            "user_video_view" => "user_video_view.user_video_ID=user_video.ID",
            "user_video_like" => "user_video_like.user_video_ID=user_video.ID"
        );
        $selectedColumn = array(
            "user_video.*",
            "file_uploaded.description AS file_uploaded_description, file_uploaded.datetime AS file_uploaded_datetime, file_uploaded.file_type AS file_uploaded_file_type",
            "thumbnail_file_uploaded.description AS thumbnail_file_uploaded_description, thumbnail_file_uploaded.datetime AS thumbnail_file_uploaded_datetime, thumbnail_file_uploaded.file_type AS thumbnail_file_uploaded_file_type",
            "account_information.first_name, account_information.middle_name, account_information.last_name",
            "COUNT(DISTINCT user_video_view.ID) AS user_video_view_count",
            "COUNT(DISTINCT user_video_like.ID) AS user_video_like_count"
        );
        if(isset($additionalData["account_profile_photo"])){
            $joinedTable["account_photo AS account_profile_photo"] = "account_profile_photo.account_ID=account_information.account_ID AND account_profile_photo.type=1 AND account_profile_photo.status=1";
            $joinedTable["file_uploaded AS account_profile_photo_file_uploaded"] = "account_profile_photo_file_uploaded.ID=account_profile_photo.file_uploaded_ID";
            $selectedColumn[] = "account_profile_photo.ID AS account_profile_photo_ID, account_profile_photo_file_uploaded.description AS account_profile_photo_file_uploaded_description";
        }
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateUserVideo($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteUserVideo($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
