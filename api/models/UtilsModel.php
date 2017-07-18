<?php
require_once "DB.php";

class UtilsModel extends DB {
    
    function getCities() {
        $query = "SELECT id, nume from cities";
        return $this->executeQuery($query);
    }
}