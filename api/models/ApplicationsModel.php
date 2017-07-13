<?php
require_once "DB.php";

class ApplicationsModel extends DB {

    
    
    function selectAll(){
        $query = 'select * from applications';
        return $this->executeQuery($query);
    }

    
    function insertItem($item) {
        
            $params = [$item["title"],
                       $item["description"],
                       $item["active"],
                       $item["category_id"],
                       $item["price"]];

            $query = 'INSERT INTO applications(title, description, active, category_id, price) 
                      VALUES(? , ?, ?, ?, ?);';
            $sth = $this->db->prepare($query);
            $sth->execute($params);
       
            return $this->db->lastInsertId();                    
    }
}