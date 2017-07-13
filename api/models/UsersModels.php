<?php

require_once "DB.php";

class UsersModels extends DB {
    
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
        $query = 'select * from users where email = ? and password = ?';
        $sth = $this->db->prepare($query);
        $sth->execute($params); 
        return $sth->fetch(PDO::FETCH_ASSOC);
        }

    function getTop3() {
        $query = "SELECT name,description,image FROM users ORDER BY id limit 3";
        return $this->executeQuery($query);
        }
    }

?>
