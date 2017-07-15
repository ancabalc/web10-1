<?php
require "models/UsersModels.php";

class Accounts {
    private $usersModel;
    
    function __construct() {
        $this->usersModel = new UsersModels();
    }

    function createAccount() {
        $error=[];
        
        if (empty($_POST["name"])
         || empty($_POST["email"])
         || empty($_POST["password"])
         || empty($_POST["repassword"])
         || empty($_POST["role"])) {
            array_push($error, "All fields are required!");
        
        } else if (!empty($this->usersModel->checkEmail($_POST["email"]))) {
            array_push($error, "Account with this email already exists!");

        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            array_push($error, "Invalid email!");

        } else if (strlen($_POST["password"]) < 6) {
            array_push($error, "Password must have at least 6 characters!");

        } else if ($_POST["password"] !== $_POST["repassword"]) {
            array_push($error, "Passwords do not match!");
        
        } else {
            $salt = '$1$12!ab';
            $password = crypt($_POST["password"], $salt);
            return $this->usersModel->addAccount($_POST);
        }

        if (empty($error)) {
			return "Account was successfully created!";

        } else {
			return $error;
		}
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
