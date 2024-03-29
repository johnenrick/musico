<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of API_Model
 *
 * @author johnenrick
 */
class API_Model extends CI_Model{
    public $TABLE = false;
    public $DATABASETABLE = array();
    public $HASCONDITION = false;
    public function __construct() {
        parent::__construct();
        $this->db->start_cache();
        $this->db->flush_cache();
    }
    public function createTableEntry($newData){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->db->insert($this->TABLE, $newData);
        $result = $this->db->insert_id();
        $this->db->flush_cache();
        $this->db->stop_cache();
        
        return $result;
    }
    /**
     * Retrieve Entry from the table
     * @param int   $retrieveType   0 to retrieve the result, 1 to count the result
     * @param int   $limit          Set the number of entry to be retrieved
     * @param int   $offset         Set an offset where to start retrieving the data
     * @param array $sort           Sort the entry by the array key with the array value. The left side of __[double underscore] is the table and the right side is the column. \nexample:  [database_table__table_column] => "asc" 
     * @param int   $ID             If specified, it will ignore the condition parameter and return only one entry in associative array
     * @param array $condition      Filter the entry base on different conditions. __[double_underscore] separates two to three segment of the array key.
     *                              ConditionType can be like, or, not, if not specified it will be equal.
     *                              e.g. [condition_type__database_table__table_column], [condition_type__table_column], [database_table__table_column]
     * @param array $selectedColumn Specify the columns to retrieve. All columns in default table is selected and prioritized
     */
    public function retrieveTableEntry($retrieveType = 0, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = array(), $selectedColumn = array(), $joinedTable = array(), $groupBy = false, $having = array(), $distinct = false){
        $this->initializeTableColumn($joinedTable);
        $this->db->start_cache();
        $this->db->flush_cache();
        //Select column
        if(is_array($selectedColumn)){
            $selectedQuery = "";
            $activeBactick = true;
            foreach($selectedColumn as $key => $column){
                $selectedQuery.=" $column";
                $selectedQuery.=",";
                if (strpos($column, 'CONCAT(') !== false) {
                    $activeBactick = false;
                }
            }
            $selectedQuery .= ", $this->TABLE.ID ";
            $this->db->select($selectedQuery, $activeBactick);
        }
        //joining table
        foreach($joinedTable as $key => $value){
            $this->db->join($key, $value, "left");
        }
        
        //Filtering entry
        if($ID != NULL){
            $this->db->where("$this->TABLE.ID", $ID);
        }
        $this->addCondition($condition);

        //Having Clause
        if($having){
            $this->addHaving($having);
        }
        //Sorting entry
        if(is_array($sort)){
            foreach($sort as $key => $value){
                $keySegment = explode("__", $key);
                $this->db->order_by(((count($keySegment) > 1 )? $keySegment[0]."." : (isset($this->DATABASETABLE[$this->TABLE][$keySegment[count($keySegment)-1]]) ? $this->TABLE."." : "")).$keySegment[count($keySegment)-1], (strtolower($value) == "asc") ? "asc" : "desc");
            }
        }
        //limits and offset
        if($limit !== NULL){
            $this->db->limit($limit, $offset);
        }
        $this->db->group_by($groupBy ? $groupBy :"$this->TABLE.ID");
        ($distinct) ? $this->db->distinct() : null;
        if(!($retrieveType)){
            $result = $this->db->get($this->TABLE);
            $this->db->flush_cache();
            $this->db->stop_cache();
            if($result->num_rows()){
                return ($ID !== NULL) ? $result->row_array() : $result->result_array();
            }else{
                return false;
            }
            
        }else{
            $result = count($this->db->get($this->TABLE)->result_array());
            $this->db->flush_cache();
            $this->db->stop_cache();
            $this->db->flush_cache();
            return $result;
        }
        
    }
    /**
     * 
     * @param type $ID          ID of the entry to be deleted. Ignore the condition parameter
     * @param type $condition   Filter the entry base on different conditions. __[double_underscore] separates two to three segment of the array key.
     *                          ConditionType can be like, or, not, if not specified it will be equal.
     *                          e.g. [condition_type__database_table__table_column], [condition_type__table_column], [database_table__table_column]
     * @param type $newData     Updated data
     * @return int
     */
    public function updateTableEntry($ID = NULL, $condition = array(), $newData = array(), $joinedTable = array()){
        $this->initializeTableColumn($joinedTable);
        $this->db->start_cache();
        $this->db->flush_cache();
        if($ID !== NULL){
            $this->db->where("$this->TABLE.ID", $ID);
        }
        if(count($condition)){
            $this->addCondition($condition);
        }
        if(isset($newData["ID"])){ // avoid changing the primary key
            unset($newData["ID"]);
        }
        foreach($joinedTable as $key => $value){
            $this->db->join($key, $value, "left");
        }
        $result = false;
        if(count($newData) > 0 && (($ID !== NULL) || $this->HASCONDITION)){
            $updatedData = array();
            foreach($newData as $newDataKey => $newDataValue){
                $column = explode("__", $newDataKey);
                if(isset($this->DATABASETABLE[$this->TABLE][(count($column ) == 1 ? $column[ 0 ] : $column[1]) ] )){
                    if((count($column ) == 1 ? $column[ 0 ] : $column[1]) != "ID"){
                        $updatedData[(count($column ) == 1 ? $column[ 0 ] : $column[1])] = $newDataValue;
                    }
                }else{
                }
            }
            if(count($updatedData)){
                $result = $this->db->update($this->TABLE, $updatedData);
            }else{
                $this->db->get($this->TABLE);
            }
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        $this->db->flush_cache();
       
        return $result;
    }
    public function addCondition($condition = array()){
        
        if(is_array($condition)){
            foreach($condition as $tableColumnKey => $tableColumnValue){
                $segment = explode("__", $tableColumnKey);
                $tableColumn = $segment[count($segment)-1];
                $tableName = (count($segment) === 3) ? $segment[1] : ((count($segment) === 2) ? $segment[0] : $this->TABLE);
                $passArithmetic = false;
                /*Arithmetic Operations*/
                /*Concat*/
                $plusColumns = explode("__CONCAT__", $tableColumnKey);
                if(count($plusColumns) > 1){
                    $passArithmetic = true;
                    $tableColumnTemp ="";
                    foreach($plusColumns as $plusColumnsValue){
                        $plusColumn = explode("__", $plusColumnsValue);
                        $tableName = "";
                        $tableColumn = "";
                        if(count($plusColumn) == 3){
                            $tableName = $plusColumn[1];
                            $tableColumn = $plusColumn[2];
                        }else if(count($plusColumn) == 2){
                            $tableName = $plusColumn[0];
                            $tableColumn = $plusColumn[1];
                        }else{
                            $tableName = $this->TABLE;
                            $tableColumn = $plusColumn[0];
                        }
                        if(!isset($this->DATABASETABLE[$tableName][$tableColumn])){
                            $passArithmetic = false;
                        }else{
                            $tableColumnTemp .= ($tableColumnTemp == "" ? "" : " , ")."`$tableName`.`$tableColumn`";
                        }
                    }
                    $tableColumn = "CONCAT($tableColumnTemp)";
                }
                
                if((isset($this->DATABASETABLE[$tableName][$tableColumn]) || $passArithmetic) && ($tableColumnValue !== "")){
                  
                    $leftValue = ($passArithmetic) ? $tableColumn: "$tableName.$tableColumn";
                    $this->HASCONDITION = true;
                    
                    switch($segment[0]){
                        
                        case "like":
                            if(is_array($tableColumnValue)){
                                foreach($tableColumnValue as $tableColumnValueValue){
                                    $this->db->like($leftValue, $tableColumnValueValue);
                                }
                            }else{
                                $this->db->like($leftValue, $tableColumnValue);
                            }
                            break;
                        case "not" :
                            $this->db->where("$leftValue!=", $tableColumnValue);
                            break;
                        case "or" :
                            $this->db->or_where("$leftValue", $tableColumnValue);
                            break;
                        case "lesser":
                            $this->db->where("$leftValue<", $tableColumnValue);
                            break;
                        case "lesser_equal":
                            $this->db->where("$leftValue<=", $tableColumnValue);
                            break;
                        case "greater_equal":
                            $this->db->where("$leftValue>=", $tableColumnValue);
                            break;
                        case "greater":
                            $this->db->where("$leftValue>", $tableColumnValue);
                            break;
                        case "not_null":
                            $this->db->where("$leftValue is not null", null);
                            break;
                        case "is_null":
                            $this->db->where("$leftValue is null", null);
                            break;
                        default :
                            if(is_array($tableColumnValue)){
                                $this->db->where_in("$leftValue", $tableColumnValue);
                            }else{
                                $this->db->where("$leftValue=", $tableColumnValue);
                            }
                            break;
                    }
                }
            }
        }
    }
    /**
     * 
     * @param type $condition
     *              condition__operation__table__column
     *              greater_equal__SUM__account__money
     */
    public function addHaving($condition = array()){
        
        if(is_array($condition)){
            foreach($condition as $tableColumnKey => $tableColumnValue){
                $segment = explode("__", $tableColumnKey);
                $tableColumn = $segment[3];
                $tableName = $segment[2];
                if((isset($this->DATABASETABLE[$tableName][$tableColumn])) && ($tableColumnValue !="")){
                    $this->HASCONDITION = true;
                    $havingField = "";
                    switch($segment[1]){
                        case "SUM" : 
                            $havingField = "SUM($tableName.$tableColumn)*1";
                            break;
                    }
                    switch($segment[0]){
                        case "not" :
                            $this->db->having("$havingField!=", $tableColumnValue);
                            break;
                        case "lesser":
                            $this->db->having("$havingField <", $tableColumnValue);
                            break;
                        case "lesser_equal":
                            $this->db->having("$havingField<=", $tableColumnValue);
                            break;
                        case "greater_equal":
                            $this->db->having("$havingField>=", $tableColumnValue);
                            break;
                        case "greater":
                            $this->db->having("$havingField>", $tableColumnValue);
                            break;
                        case "not_null":
                            $this->db->having("$havingField is not null", null);
                            break;
                        case "is_null":
                            $this->db->where("$havingField is null", null);
                            break;
                        default :
                            if(is_array($tableColumnValue)){
                                $this->db->where_in("$leftValue", $tableColumnValue);
                            }else{
                                $this->db->where("$leftValue=", $tableColumnValue);
                            }
                            break;
                    }
                }
            }
        }
    }
    public function isValidCondition(){
        
    }
    public function deleteTableEntry($ID = NULL, $condition = array(), $joinedTable = array()){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->initializeTableColumn($joinedTable);
        foreach($joinedTable as $key => $value){
            $this->db->join($key, $value, "left");
        }
        $this->addCondition($condition);
        if($ID){
            $this->db->where("$this->TABLE.ID", $ID);
        }
        $result = $this->db->delete("$this->TABLE");
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchCreateTableEntry($batchEntry){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = false;
        if(count($batchEntry) > 0){
            $this->db->insert_batch("$this->TABLE", $batchEntry);
            $result = $this->db->insert_id();
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchUpdateTableEntry($conditionColumn, $newData, $condition){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = false;
        if(count($newData) > 0){
            $this->db->where($condition);
            $this->db->update_batch("$this->TABLE", $newData, $conditionColumn);
            $result = true;
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchDeleteTableEntry($IDList, $condition){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->db->where($condition);
        $this->db->where_in("ID", $IDList);
        $result = $this->db->delete("$this->TABLE");
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function initializeTableColumn($joinedTable = array()){
        $this->DATABASETABLE = array();
        $this->HASCONDITION = false;
        foreach($joinedTable as $joinedTableKey => $joinedTableValue){
            if(strpos($joinedTableKey, "select ") === false){
                $tableName = explode(" AS ", $joinedTableKey); 
                $this->db->start_cache();
                $this->db->flush_cache();
                $this->DATABASETABLE[$tableName[(count($tableName) > 1) ? 1 : 0]] = array_flip($this->db->list_fields($tableName[0]));
                $this->db->flush_cache();
                $this->db->stop_cache();
            }
        }
        $this->DATABASETABLE[$this->TABLE] = array_flip($this->db->list_fields($this->TABLE));
        return true;
    }
}