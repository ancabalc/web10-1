<?php
require "models/OffersModel.php";

class Offers {
    private $offersModel;
    
    function __construct(){
        $this->offersModel = new OffersModel();
    }
    
    function getItems(){
        if(empty($_GET["id"])) {
           return ("Invalid request");
        } else {
            return $this->offersModel->selectItems($_GET["id"]);
        }
    }
}







?>