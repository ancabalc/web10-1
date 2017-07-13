<?php

$routes["/api/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/users"] = ["class" =>"Users", "method" => "getTop"];

$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];

$routes["/accounts/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/accounts/reset-pass"] = ["class" => "Accounts", "method" => "resetPass"];

?>

