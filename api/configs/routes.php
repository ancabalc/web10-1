<?php

$routes["/offers"] = ["class" => "Offers", "method" => "getItems"];
$routes["/accounts/create"] = ["class" => "Accounts", "method" => "createAccount"];
$routes["/login"] = ["class" => "Accounts", "method" => "login"];
$routes["/users"] = ["class" => "Users", "method" => "getTop"];
$routes["/applications"] = ["class" => "Applications", "method" => "getAll"];
$routes["/accounts/login"] = ["class" => "Accounts", "method" => "login"];

