<?php
require_once "DB.php";
class OffersModel extends DB{
     function selectItems($id){
         $params = [$id];
         $query = 'SELECT * FROM offers WHERE application_id=?';
         $sth = $this->db->prepare($query);
         $sth->execute($params);
         return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}