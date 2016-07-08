<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_sample_template
 *
 * @author johnenrick
 */
class form_validation extends API_Model{
    public function doesExist($tableColumn, $value){
        $table = explode(".", $tableColumn);
        $this->db->where($table[1], $value);
        $result = $this->db->get($table);
        if($result->num_rows()){
            return true;
        }else{
            return false;
        }
    }
}
