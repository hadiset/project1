<?php

include "../functions/database.php";
include "../functions/product.php";
include "../functions/category.php";

$database = new database();
$db = $database->getConnection();
$dataproduk = new product($db);
$datakategori = new category($db);
$produk = $dataproduk->show();
$kategori = $datakategori->show();

?>
<!DOCTYPE html>
<html>
<head>  
  <title>Project 1 | Dashboard</title>  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include './assets/page/header.php';?>
  <?php include './assets/page/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= count($kategori); ?></h3>

              <p>Category</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="kategori.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= count($produk); ?></h3>

              <p>Product</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="produk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include './assets/page/footer.php'; ?>
</div>
  <?php include './assets/page/script.php'; ?>
</body>
</html>
