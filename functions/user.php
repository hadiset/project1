<?php

class user{
    private $conn;
    private $table_name = "User";

    public function __construct($db){
        $this->conn = $db;
    }

    // Show Data
    function showData(){
        $data = mysqli_query($this->conn, "SELECT * FROM `$table_name`");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Create Data
    function addUser($data){
        $email = htmlspecialchars($data['email']);
        $email = str_replace(" ","",$email);
        $username = htmlspecialchars(strtolower($data['username']));
        $username = str_replace(" ","",$username);
        $password = htmlspecialchars($data['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `User` (`id`,`email`,`username`,`password`)
        VALUES ('','$email','$username','$password')";

        if(mysqli_query($this->conn,$sql)){
            return "New record created successfully";
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    // Select data by id
    function getUser(){
        $sql = "SELECT * FROM `User` WHERE `id`=2";
        $result = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($result) > 0){
            return mysqli_fetch_assoc($result);
        } else {
            echo "0 result";
        }
        
    }

    // Update data 
    function editUser(){
        $sql = "UPDATE `User` SET 
        `email` = 'alli@mail.com', 
        `username` = 'alli', 
        `password` = '123' 
        WHERE `User`.`id` = 9";

        if(mysqli_query($this->conn,$sql)){
            echo "Record updating successfully";
        } else {
            echo "Error updating record: " . mysql_error($this->conn);
        }
    }

    function deleteUser(){
        $sql = "DELETE FROM `User` 
        WHERE `User`.`id` = 10";

        if(mysqli_query($this->conn,$sql)){
            echo "Record deleted successfully";
        } else {
            echo "Error deleted record: " . mysql_error($this->conn);
        }
    }

    function loginUser($data){
        $email = $data['email'];
        
        $sql = "SELECT * FROM `User`
        WHERE `User`.`email` = '$email'";
        $data = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_assoc($data);
        if(mysqli_num_rows($data) > 0){
            return $result;
        } else {
            return false;
        }
    }
}
?>