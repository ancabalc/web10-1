<?php
require_once "DB.php";

class ApplicationsModel extends DB {
    
    
    function selectAll(){
        $query = 'select * from applications';
        return $this->executeQuery($query);
    }
    
}