<?php

require "models/UtilsModel.php";

class Utils {
     private $categoriesModel;
    
    function __construct(){
        $this->utilsModel = new UtilsModel();    
    }
    
    function getCities() {
        return $this->utilsModel->getCities();
    }
}