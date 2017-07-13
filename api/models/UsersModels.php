<?php


require_once "DB.php";
class UsersModel extends DB{
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
}

?>