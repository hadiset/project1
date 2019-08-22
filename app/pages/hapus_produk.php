<?php

  include "../functions/database.php";
  include "../functions/product.php";
  
  $database = new database();
  $db = $database->getConnection();
  $dataproduk = new product($db);
  
    if(isset($_GET["id"])){
      $hapus = $dataproduk->remove($_GET["id"]);
      
      header("Location: produk.php");
    }
?>
