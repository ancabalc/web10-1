<?php

require "models/UsersModels.php";
class Users {
    private $usersModel;
    
    function __construct(){
        $this->usersModel = new UsersModel();    
    }
    
    function getTop() {
        return $this->usersModel->getTop3();
    }
}