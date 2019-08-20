<?php

class product{
    // Show Data
    private $conn;
    private $table_name = "Product";
    private $table_join = "Category";
    
    public function __construct($db){
        $this->conn = $db;
    }

    function show(){
        $data = mysqli_query($this->conn, "SELECT $this->table_name.*, $this->table_join.CategoryName
                                            FROM $this->table_name
                                            INNER JOIN $this->table_join ON $this->table_name.CategoryID = $this->table_join.CategoryID
                                            ORDER BY $this->table_name.ProductID;");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
}


?>


