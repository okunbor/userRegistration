<?php
require_once("db.php");

class Login
{


    function validate(string $username, string $password)
    {

        $db = new DB();
        $db->conn();
        $result = $db->Select($username, $password);

        $pass = password_verify($password, $result["password"]);



        if ($result["username"] == $username && $pass) {

            print("login succesfull");
        }
        //$db->close();
    }

    function Redirect()
    {

        header("location: http://localhost/userRegistration/index.php");
    }
}
