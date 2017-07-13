<?php
require "models/ApplicationsModel.php";

class Applications {
    private $applicationModel;
    
    function __construct(){
        $this->applicationsModel = new ApplicationsModel();    
    }
    
    function getAll(){
        return $this->applicationsModel->selectAll();
    }
}





?>