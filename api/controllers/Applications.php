<?php

require "models/ApplicationsModel.php";

class Applications {
 
private $applicationsModel;
 
function __construct(){
        $this->applicationsModel = new ApplicationsModel();    
    }
    
    function createApplication() {
        
            if (empty($_POST['title']) || empty($_POST['description'])) {
                
                return "Invalid Fields";
                }
                
            else {
                
            return $this->applicationsModel->insertItem($_POST);    
        }
    }
}





?>