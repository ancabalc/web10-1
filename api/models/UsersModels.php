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
    }
