<?php
require "models/UsersModel.php";
require "helpers/password.php";
require "helpers/response.php";

class Accounts {
    private $usersModel;
    
    function __construct() {
        $this->usersModel = new UsersModel();
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
            
        } else if ($_POST["password"] !== $_POST["repassword"]) {
            echo "Passwords do not match!";
            
        } else if (strlen($_POST["password"]) < 6) {
            array_push($error, "Password must have at least 6 characters!");
        
        } else {
            $salt = '$1$12!ab';
            $password = crypt($_POST["password"], $salt);
            $this->usersModel->addAccount($_POST);
        }

        if (empty($error)) {
			return success_response("Account was successfully created!");

        } else {
			return error_response($error);
		}
    }
    
    function login() {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            return error_response('Invalid fields');
        } else {
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $result = $this->usersModel->checkEmail($email);
            if (empty($result)) {
                return error_response("User not found.");
            } else {
                $found = checkMailWithPass($result, $pass);
                if ($found === false) {
                    return error_response("User and password do not match.");
                } else {
                    $_SESSION["isLogged"] = TRUE;
                    $_SESSION["email"] = $_POST['email'];
                    return success_response($_SESSION);
                }
            }
        }
    }
    
    function resetPass() {
        $email = [$_POST['email']];
        
        if (empty($email)) {
            return 'Invalid fields';
        } else {
            $user = $this->usersModel->searchEmail($email);
            if (empty ($user)) {
                return "Email not found.";
            } else {
                $pass = hashPass();
                $encPass = passEnc($pass);
                $email = $email[0];
                $params = [$encPass, $email];
                $changePass = $this->usersModel->updatePass($params);
                
                if ($changePass != 1) {
                    return 'Password not updated';
                } else {
                    $subject = "Your Recovered Password";
                    $message = "Please use this password to login " . $pass;
                    $headers = "From : notifications@siit.ro";
                    if(mail($email[0], $subject, $message, $headers)){
                    	return "Your Password has been sent to your email id";
                    } else {
                    	echo "Failed to Recover your password, try again";
                    }
                }
            }
        }
    }
}

?>
