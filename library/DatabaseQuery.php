<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseQuery
 *
 * @author Bryan
 */
class DatabaseQuery {

    private $_db_table;
    private $_db_tbl_select;
    private $_variables = array();
    public $db_query;

    public function LoginSelectQuery($tbl_select, $table, $vars) {
        $this->_db_tbl_select = $tbl_select;
        $this->_db_table = $table;
        $this->_variables = $vars;

        $this->db_query = "SELECT '$this->db_tbl_select' 
                            FROM '$this->db_table' 
                            WHERE user ='$this->_variables[user]'
                            AND pass = '$this->_variables[pass]'";
    }

}

$DatabaseQuer = new DatabaseQuery();
?>
