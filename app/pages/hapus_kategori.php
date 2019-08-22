<?php

  include "../functions/database.php";
  include "../functions/category.php";
  
  $database = new database();
  $db = $database->getConnection();
  $datakategori = new category($db);
  
    if(isset($_GET["id"])){
      $hapus = $datakategori->remove($_GET["id"]);
      
      header("Location: kategori.php");
    }
?>
