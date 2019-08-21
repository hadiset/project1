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
                                            ORDER BY $this->table_name.ProductID");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function read($id){
        $data = mysqli_query($this->conn, "SELECT $this->table_name.*, $this->table_join.CategoryName
                                            FROM $this->table_name
                                            INNER JOIN $this->table_join ON $this->table_name.CategoryID = $this->table_join.CategoryID
                                            WHERE $this->table_name.ProductID = $id");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil[0];
    }
    
    function remove($id){
        $data = mysqli_query($this->conn, "DELETE FROM $this->table_name
                                            WHERE $this->table_name.ProductID = $id");
        
        if($data){
            return true;
        }else{
            return false;
        }
    }

    function edit($data,$file){
        $name = $file["name"];
        $tmp = $file["tmp_name"];
        $error = $file["error"];
        $size = $file["size"];

        // filter ukuran gambar maksimal 2MB
        if($size > 2000000){
            echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";

            return false;
        }

        //filter jenis file
        $ekstensi = explode(".",$name);
        $ekstensi = end($ekstensi);
        if($ekstensi != "jpg" || $ekstensi != "jpeg" || $ekstensi != "png"){
            echo "<script>
            alert('Jenis file harus berupa jpg, jpeg, atau png!');
            </script>";

            return false;
        }

        $product = htmlspecialchars(strip_tags($data["product"]));
        $price = htmlspecialchars(strip_tags($data["price"]));
        $description = htmlspecialchars(strip_tags($data["description"]));
        $id = $data["id"];

        $sql = "UPDATE `$this->table_name` SET 
                `Name` = '$product', 
                `Price` = '$price', 
                `Description` = '$description' 
                WHERE `$this->table_name`.`ProductID` = $id";

        if(mysqli_query($this->conn,$sql)){
            return true;
        }else{
            return false;
        }
    }
}


?>


