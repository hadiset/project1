<?php

class product{
    // Show Data
    private $conn;
    private $table_name = "Product";
    
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
}


?>


