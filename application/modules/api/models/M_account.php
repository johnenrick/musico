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
    public function retrieveAccount($retrieveType = 0, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = array(), $having = array()) {
        $joinedTable = array(
            "account_information" => "account_information.account_ID=account.ID",
            
        );
        $selectedColumn = array(
            "account.username, account.account_type_ID, account.status",
            "account_information.*",
            
        );
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