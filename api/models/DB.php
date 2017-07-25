<?php
class DB{
 protected $db;

 function __construct(){
  $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "webapp_services";
    
        try {
            $this->db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);    
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('Unable to connect');
        }
    }

  function executeQuery($query){
   $sth = $this->db->prepare($query);
      $sth->execute();
      return $sth->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>