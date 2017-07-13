<?php
require_once "DB.php";

class UsersModels extends DB {
    
    function checkLogin($params) {
        $query = 'SELECT * FROM users WHERE email = ? and password = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params); 
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function searchEmail($params) {
        $query = 'SELECT * FROM users where email = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params); 
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    function updatePass($params) {
        $query = 'UPDATE users SET password = ? WHERE email = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params); 
        return $sth->rowcount();
    }

    function getTop3() {
            $query = "SELECT name,description,image FROM users ORDER BY id limit 3";
            return $this->executeQuery($query);
        }



}
?>
