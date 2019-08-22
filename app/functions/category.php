<?php

class category{
    // Show Data
    private $conn;
    private $table_name = "Category";
    
    public function __construct($db){
        $this->conn = $db;
    }

    function show(){
        $data = mysqli_query($this->conn, "SELECT * FROM `$this->table_name`");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function read($id){
        $data = mysqli_query($this->conn, "SELECT * FROM $this->table_name                                            
                                            WHERE $this->table_name.CategoryID = $id");
        
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil[0];
    }
    
    function remove($id){
        $data = mysqli_query($this->conn, "DELETE FROM $this->table_name
                                            WHERE $this->table_name.CategoryID = $id");
        
        if($data){
            return true;
        }else{
            return false;
        }
    }

    function edit($data){
        $category = htmlspecialchars(strip_tags($data["category"]));        
        $description = htmlspecialchars(strip_tags($data["description"]));        
        $id = $data["id"];

        $sql = "UPDATE `$this->table_name` SET 
                `CategoryName` = '$category',                 
                `Description` = '$description'
                WHERE `$this->table_name`.`CategoryID` = $id";

        if(mysqli_query($this->conn,$sql)){
            return true;
        }else{
            return false;
        }
    }

    function tambah($data){
        $category = htmlspecialchars(strip_tags($data["category"]));        
        $description = htmlspecialchars(strip_tags($data["description"]));        
        $id = $data["id"];
        
        $sql = "INSERT INTO `$this->table_name`
                (`CategoryID`, `CategoryName`, `Description`)
                 VALUES
                ('', '$category', '$description')";

        if(mysqli_query($this->conn,$sql)){
            return true;
        }else{
            return false;
        }
    }
}


?>


