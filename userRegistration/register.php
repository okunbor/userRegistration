<?php
require_once("db.php");

class Register
{


    public function register(string $username, string $password, string $email)
    {


        $db = new DB();
        
        $db->conn();

        $db->prepareInsert($username, $password, $email);

        $db->close();
    }

    public function  Setcookie(string $username, string $password)
    {


        setcookie("username", $username);
        setcookie("password", $password);
    }




    public function error() {}
}
