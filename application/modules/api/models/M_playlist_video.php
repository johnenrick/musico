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
        );
        $selectedColumn = array(
            "playlist_video.*"
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
