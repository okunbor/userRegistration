<?php
// database connection class


class DB 
{


    private $host;
    private $user;
    private $password;
    private $database;

    public $conn;


    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "form";
    }


    public function conn()
    {
        // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $this->conn = new mysqli($this->host,  $this->user,  $this->password,  $this->database);
           
        } catch (\Exception  $th) {

            printf("error code : %d", $th->getCode());

            print("<br>");

            printf("error message : %s\n", $th->getMessage());

            print("<br>");

            printf("error on line : %d\n", $th->getLine());

            print("<br>");

            printf(" error in file : %s", $th->getFile());
        }
    }


    public function prepareInsert(string $username, string $password, string $email)
    {


        try {

            $pass  = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $this->conn->stmt_init();
            $stmt->prepare("INSERT INTO registertable(username, password, email) VALUES (?, ?, ?)");

            $stmt->bind_param("sss", $username, $pass, $email); // "is" means that $id is bound as an integer and $label as a string

            $stmt->execute();

            print("insert  successfull");
        } catch (\Exception  $th) {

            printf("error code : %d", $th->getCode());

            print("<br>");

            printf("error message : %s\n", $th->getMessage());

            print("<br>");

            printf("error on line : %d\n", $th->getLine());

            print("<br>");

            printf(" error in file : %s", $th->getFile());
        }
    }



    public function Select(string $username, string $password)
    {


        try {



             //$query ="SELECT username, password FROM registertable WHERE username=$username" ;
            $query = "SELECT username, password FROM registertable WHERE username = ?";

            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("s", $username); // "is" means that $id is bound as an integer and $label as a string

            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            return $row;
        } catch (\Exception  $th) {

            printf("error code : %d", $th->getCode());

            print("<br>");

            printf("error message : %s\n", $th->getMessage());

            print("<br>");

            printf("error on line : %d\n", $th->getLine());

            print("<br>");

            printf(" error in file : %s", $th->getFile());
        }
    }



    public function error($err)
    {

        print('Connection error: ' . $err);
        die;
    }


    public function close()
    {

        $this->conn->close();
    }
}
