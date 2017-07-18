<?php
require "models/UsersModels.php";
class Users {
        private $usersModel;
    function __construct(){
        $this->usersModel = new UsersModel();    
    }
    function addItem() {
        $tmpPath = $_FILES["image"]["tmp_name"];
        $filePath = "../uploads/".$_FILES["image"]["name"];
        move_uploaded_file($tmpPath, $filePath);
        $_POST["image"] = $_FILES["file"]["name"];  
        return $this->usersModel->add($_POST);          

    }
    function editUser() {
        if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['description'])){
            return "Empty fields";
        } else {
            if (!empty($_FILES['image'])) {
                $file = $_FILES['image'];
                $tmpPath = $file["tmp_name"];
                $filePath = "../uploads/" . $file["name"];
                move_uploaded_file($tmpPath, $filePath);
                $_POST['image']= $file["name"];
            }
    
            return $this->usersModel->editUser($_POST);    
        } 
    }
        function getTop() {
        return $this->usersModel->getTop3();
    }
}
?>