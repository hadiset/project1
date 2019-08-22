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

    function edit($data,$file){
        $name = $file["name"];
        $tmp = $file["tmp_name"];
        $error = $file["error"];
        $size = $file["size"];
        $imageOld = $data["imageOld"];

        // filter ukuran gambar maksimal 2MB
        if($size > 2000000){
            echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";

            return false;
        }

        //filter jenis file
        if($name != ""){
            $ekstensi = explode(".",$name);
            $ekstensi = end($ekstensi);            
            if($ekstensi !== "jpg" && $ekstensi !== "jpeg" && $ekstensi !== "png"){
                echo "<script>
                alert('Jenis file harus berupa jpg, jpeg, atau png!');
                </script>";
                
                return false;
            }
        }

        //jika tidak ada gambar yg di upload
        if($error == 4){
            $image = $imageOld;
        //jika ada gambar baru yg di upload
        }else{
            $ekstensi = explode(".",$name);
            $ekstensi = strtolower(end($ekstensi)); 
            $image = uniqid();
            $image .= ".";
            $image .= $ekstensi;
            $dir = "../../assets/img/";

            if(!move_uploaded_file($tmp, $dir.$image)){
                echo "<script>
                alert('Upload gambar gagal!');
                </script>";

                return false;
            }
        }

        
        

        $product = htmlspecialchars(strip_tags($data["product"]));
        $price = htmlspecialchars(strip_tags($data["price"]));
        $description = htmlspecialchars(strip_tags($data["description"]));
        $category = $data['category'];
        $id = $data["id"];

        $sql = "UPDATE `$this->table_name` SET 
                `Name` = '$product', 
                `Price` = '$price', 
                `Description` = '$description',
                `Image` = '$image',
                `CategoryID` = '$category'
                WHERE `$this->table_name`.`ProductID` = $id";

        if(mysqli_query($this->conn,$sql)){
            return true;
        }else{
            return false;
        }
    }

    function tambah($data,$file){
        $name = $file["name"];
        $tmp = $file["tmp_name"];
        $error = $file["error"];
        $size = $file["size"];
        $imageOld = $data["imageOld"];

        // filter ukuran gambar maksimal 2MB
        if($size > 2000000){
            echo "<script>
            alert('Ukuran gambar terlalu besar!');
            </script>";

            return false;
        }

        //filter jenis file
        if($name != ""){
            $ekstensi = explode(".",$name);
            $ekstensi = end($ekstensi);            
            if($ekstensi !== "jpg" && $ekstensi !== "jpeg" && $ekstensi !== "png"){
                echo "<script>
                alert('Jenis file harus berupa jpg, jpeg, atau png!');
                </script>";
                
                return false;
            }
        }

        //jika tidak ada gambar yg di upload
        if($error == 4){
            $image = $imageOld;
        //jika ada gambar baru yg di upload
        }else{
            $ekstensi = explode(".",$name);
            $ekstensi = strtolower(end($ekstensi)); 
            $image = uniqid();
            $image .= ".";
            $image .= $ekstensi;
            $dir = "../assets/img/";

            if(!move_uploaded_file($tmp, $dir.$image)){
                echo "<script>
                alert('Upload gambar gagal!');
                </script>";

                return false;
            }
        }

        
        

        $product = htmlspecialchars(strip_tags($data["product"]));
        $price = htmlspecialchars(strip_tags($data["price"]));
        $description = htmlspecialchars(strip_tags($data["description"]));
        $category = $data['category'];
        
        $sql = "INSERT INTO `$this->table_name`
                (`ProductID`, `Name`, `Price`, `Description`, `Image`, `CategoryID`)
                 VALUES
                ('', '$product', '$price', '$description', '$image', '$category')";

        if(mysqli_query($this->conn,$sql)){
            return true;
        }else{
            return false;
        }
    }
}


?>


