<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_playlist_video
 *
 * @author johnenrick
 */
class M_playlist_video extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "playlist_video";
    }
    public function createPlaylistVideo($playlistID, $userVideoID){
        $newData = array(
            "playlist_ID" => $playlistID,
            "user_video_ID" => $userVideoID,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrievePlaylistVideo($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "playlist" => "playlist.ID=playlist_video.playlist_ID",
            "user_video" => "user_video.ID=playlist_video.user_video_ID",
            "file_uploaded" => "file_uploaded.ID=user_video.file_uploaded_ID",
            "file_uploaded AS thumbnail_file_uploaded" => " thumbnail_file_uploaded.ID=user_video.thumbnail_file_uploaded_ID",
            "account_information" => "account_information.account_ID=user_video.account_ID",
        );
        $selectedColumn = array(
            "playlist_video.*",
            "playlist.account_ID, playlist.title",
            "user_video.title AS user_video_title",
            "account_information.first_name, account_information.middle_name, account_information.last_name",
            "file_uploaded.description AS file_uploaded_description, file_uploaded.datetime AS file_uploaded_datetime, file_uploaded.file_type AS file_uploaded_file_type",
            "thumbnail_file_uploaded.description AS thumbnail_file_uploaded_description, thumbnail_file_uploaded.datetime AS thumbnail_file_uploaded_datetime, thumbnail_file_uploaded.file_type AS thumbnail_file_uploaded_file_type"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updatePlaylistVideo($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deletePlaylistVideo($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
