
<?php



require_once("login.php");

if (isset($_POST["submit"])) {

    # code...
    $db = new Login();
    $username  = trim($_POST["username"]);
    $password  = trim($_POST["password"]);

    $db->validate($username, $password);
}

require_once("footer.php");


?>