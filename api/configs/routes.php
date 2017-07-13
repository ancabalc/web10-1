<?php



$routes["/api/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/users"] = ["class" =>"Users", "method" => "getTop"];

$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];
$routes["/applications/create"] = ["class" => "Applications", "method" => "createApplication"];
$routes["/accounts/login"] = ["class" => "Accounts", "method" => "login"];

$routes["/categories/top"] = ["class" =>"Categories", "method" => "getTop"];
?>



