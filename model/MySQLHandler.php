<?php

class MySQLHandler implements DbHandler {
    private  $_db_handler;
    private  $_table;
    
    public function __construct($table) {
        $this->_table = $table;
        $this->connect();
    }
    
    public function connect() {
        $handler = mysqli_connect(__HOST__,__USER__,__PASS__,__DB__);
        if($handler) {
            $this->_db_handler = $handler;
            return true;
        } else {
            return false;
        }
    }
    
    public function disconnect() {
        if($this->_db_handler) {
            mysqli_close($this->_db_handler);
        } 
    }
    
    public function get_data($fields = array(),  $start = 0) {
        $table = $this->_table;
        if(empty($fields)) {
            $sql = "select * from `$table`";
        } else {
            $sql = "select ";
            foreach ($fields as $f) {
                $sql .= "`$f`, ";
            }
            $sql .= "from `$table`";
            $sql = str_replace(", from", "from", $sql);
        }
        
        $sql .= "limit $start," . __RECORDS_PER_PAGE__;
        return $this->get_results($sql);
    }
    
    public function get_record($index) {
        $table = $this->_table;
        $sql = "select * from `$table` limit $index,1";
        return $this->get_results($sql);
    }
    
    private function get_results($sql) {
        if(__Debug_Mode__ == 1) {
            echo "<h5>sent query: </h5>" . $sql . "<br/>";
        }
        $_handler_results = mysqli_query($this->_db_handler, $sql);
        $_arr_results = array();
        
        if($_handler_results) {
            while ($row = mysqli_fetch_array($_handler_results))
            {
                $_arr_results[] = array_change_key_case($row, CASE_LOWER);
            }
            return $_arr_results;
        } else {
            return false;
        }
    }
}

