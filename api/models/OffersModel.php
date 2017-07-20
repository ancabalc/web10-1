<?php
require_once "DB.php";
class OffersModel extends DB{
     function selectItems($id){
         $params = [$id];
         $query = 'SELECT 
            users.name, 
            users.email, 
            users.job, 
            offers.id, 
            offers.description 
          FROM offers inner join users on offers.user_id = users.id WHERE application_id=?';
         $sth = $this->db->prepare($query);
         $sth->execute($params);
         return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}