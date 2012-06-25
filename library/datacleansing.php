<?php

/**
 * Cleanse the data to prevent SQL injection from outside sources.
 * Object Oriented Style again!
 * @author Bryan Bojorque
 */
class DataCleansing {

    //put your code here
    private $_data;

    public function StripAndEscape($data) {
        $this->_data = $data;
        
        $this->_data = stripcslashes($this->_data);
        $this->_data = mysql_escape_string($this->_data);

        return $this->_data;
    }
}

$CleanData = new DataCleansing();

?>
