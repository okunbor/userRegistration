<?php

require_once("register.php");

if (isset($_POST["submit"])) {

    # code...
    $db = new Register();
    $username  = trim($_POST["username"]);
    $password   =  trim($_POST["password"]);
    $email = trim($_POST["email"]);



    $db->register($username, $password, $email);
}



?>
