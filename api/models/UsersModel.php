<?php

require_once "DB.php";
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

class UsersModel extends DB{
    function getTop3() {
            $query = "SELECT name,description,image FROM users ORDER BY id desc limit 3";
            return $this->executeQuery($query);
    }
            
    function editUser($item) {
        $params = [ $item["image"],
                    $item["name"],
                    $item["description"],
                    $item["id"]];

        $query = 'UPDATE users SET image= ?, name = ?, description = ? where id = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $sth->rowCount();    
    }
    function addAccount($item) {
        $params =  [$item["name"],
                    $item["email"],
                    $item["password"],
                    $item["role"]];

        $query = 'INSERT INTO users (name, email, password, role) 
                  VALUES(?, ?, ?, ?)';
        $sth = $this->db->prepare($query);
        $sth->execute($params);
        return $this->db->lastInsertId();
    }

    function checkLogin($params) {
        $query = 'SELECT * FROM users WHERE email = ? and password = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params); 
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function checkEmail($email) {
        $query = 'SELECT * FROM users WHERE email = ?';
        $sth = $this->db->prepare($query);
        $sth->execute([$email]); 
        return $sth->fetch();
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
}
