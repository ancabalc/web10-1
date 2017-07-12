<?php

require "models/UsersModels.php";

class Accounts {
    private $usersModel;
    
    function __construct(){
        $this->usersModel = new UsersModels();
    }
    
    function login() {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            return 'Invalid fields';
        } else {
            
            $salt = '$1$12!ab';
            $_POST['password'] = crypt($_POST["password"], $salt);
            
            $result = $this->usersModel->checkLogin($_POST);
            
            if (!empty ($result)) {
                $_SESSION["isLogged"] = TRUE;
                $_SESSION["email"] = $_POST['email'];
                return $_SESSION;
            } else {
                return "User or password not found.";
            }
        }
    }

}










?>