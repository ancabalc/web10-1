<?php
require_once "DB.php";
    class UsersModel extends DB {
        function getTop3() {
            $query = "SELECT name,description,image FROM users ORDER BY id desc limit 3";
            return $this->executeQuery($query);
        }
    }

