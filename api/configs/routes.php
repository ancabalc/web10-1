<?php

$routes["/accounts/create"] = ["class" => "Accounts", "method" => "createAccount"];
$routes["/users/update"] = ["class" => "Users", "method" => "editUser"];
$routes["/api/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/users"] = ["class" =>"Users", "method" => "getTop"];
$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "createApplication"];
$routes["/accounts/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/accounts/reset-pass"] = ["class" => "Accounts", "method" => "resetPass"];
$routes["/categories/top"] = ["class" =>"Categories", "method" => "getTop"];
$routes["/offers"] = ["class" => "Offers", "method" => "getItems"];
$routes["/cities"] = ["class" =>"Utils", "method" => "getCities"];
?>

