<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of m_account
 *
 * @author johnenrick
 */
class M_account extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account";
    }
    public function createAccount($username, $password, $accountTypeID, $status = 2){
        $newData = array(
            "username" => $username,
            "password" => sha1($password),
            "account_type_ID" => $accountTypeID,
            "status" => $status
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccount($retrieveType = 0, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = array(), $having = array(), $additionalData = array()) {
        $joinedTable = array(
            "account_information" => "account_information.account_ID=account.ID",
            
        );
        $selectedColumn = array(
            "account.username, account.account_type_ID, account.status",
            "account_information.*",
            
        );
        if(isset($additionalData["account_biography"])){
            $joinedTable["account_biography"] = "account_biography.account_ID=account_information.account_ID";
            $selectedColumn[] = "account_biography.ID AS account_biography_ID, account_biography.detail as account_biography_detail";
        }
        if(isset($additionalData["account_cover_photo"])){
            $joinedTable["account_photo AS account_cover_photo"] = "account_cover_photo.account_ID=account_information.account_ID AND account_cover_photo.type=2 AND account_cover_photo.status=1";
            $joinedTable["file_uploaded AS account_cover_photo_file_uploaded"] = "account_cover_photo_file_uploaded.ID=account_cover_photo.file_uploaded_ID";
            $selectedColumn[] = "account_cover_photo.ID AS account_cover_photo_ID, account_cover_photo_file_uploaded.description AS account_cover_photo_file_uploaded_description";
        }
        if(isset($additionalData["account_profile_photo"])){
            $joinedTable["account_photo AS account_profile_photo"] = "account_profile_photo.account_ID=account_information.account_ID AND account_profile_photo.type=1 AND account_profile_photo.status=1";
            $joinedTable["file_uploaded AS account_profile_photo_file_uploaded"] = "account_profile_photo_file_uploaded.ID=account_profile_photo.file_uploaded_ID";
            $selectedColumn[] = "account_profile_photo.ID AS account_profile_photo_ID, account_profile_photo_file_uploaded.description AS account_profile_photo_file_uploaded_description";
        }
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable, $having);
    }
    public function updateAccount($ID = NULL, $condition = array(), $newData = array()) {
        if(isset($newData["password"])){
            $newData["password"] = sha1($newData["password"]);
        }
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccount($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}