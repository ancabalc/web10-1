<?php
require "models/OffersModel.php";
require "helpers/response.php";

class Offers {
    private $offersModel;
    
    function __construct(){
        $this->offersModel = new OffersModel();
    }
    
    function getItems(){
        if(empty($_GET["id"])) {
           return error_response("Invalid request");
        } else {
            return success_response($this->offersModel->selectItems($_GET["id"]));
        }
    }
}


?>