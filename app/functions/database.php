<?php

class database{
    private $servername = "localhost";
    private $username = "phpmyadmin";
    private $password = 123;
    private $database = "project1";
    public $conn;

    // Create connection 
    public function getConnection(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if(mysqli_connect_error()){
            die("Connection failed: " . mysqli_connect_error());
        }
        // echo "Connected successfully";
        return $this->conn;
    }   
}
?>


