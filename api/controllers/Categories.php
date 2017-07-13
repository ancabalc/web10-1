<?php

require "models/CategoriesModel.php";

class Categories {
     private $categoriesModel;
    
    function __construct(){
        $this->categoriesModel = new CategoriesModel();    
    }
    
    function getTop() {
        return $this->categoriesModel->getTop();
    }
}