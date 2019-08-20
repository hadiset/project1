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
}


?>


