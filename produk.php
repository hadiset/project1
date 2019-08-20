<?php

  include "./functions/database.php";
  include "./functions/product.php";
  include "header.php";
  include "sidebar.php";
  

  $database = new database();
  $db = $database->getConnection();
  $dataproduk = new product($db);
  $produk = $dataproduk->show();
?>
<!DOCTYPE html>
<html>
<head>  
  <title>Produk</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Produk
        <small>berbagai macam produk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
              <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create Product</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="15%">Product</th>
                  <th width="10%">Price</th>
                  <th width="50%">Description</th>
                  <th width="10%">Category</th>
                  <th width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($produk as $product ) : ?>
                <tr>
                  <td>
                    <img src="./assets/img/<?= $product['Image']; ?>" alt="gambar-produk" srcset="" width=100 style="display:block;margin:auto">
                    <p align="center"><?= $product['Name']; ?></p>
                  </td>
                  <td><?= $product['Price']; ?>
                  </td>
                  <td><?= $product['Description']; ?></td>
                  <td> <?= $product['CategoryID']; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" onclick="window.location.href = '?=<?= $product['ProductID']; ?>'"><i class="fa fa-eye"></i> Read</button>
                    <button type="button" class="btn btn-info"><i class="fa fa-edit" onclick="window.location.href = '?=<?= $product['ProductID']; ?>'"></i> Edit</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash" onclick="window.location.href = '?=<?= $product['ProductID']; ?>'"></i> Delete</button>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th width="15%">Product</th>
                  <th width="10%">Price</th>
                  <th width="50%">Description</th>
                  <th width="10%">Category</th>
                  <th width="15%">Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->      
</div>    
<?php include "footer.php"; ?> 
</body>
</html>
