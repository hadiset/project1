<?php

  include "../functions/database.php";
  include "../functions/product.php";
  
  $database = new database();
  $db = $database->getConnection();
  $dataproduk = new product($db);
  

  if(isset($_GET['id'])){
    $produk = $dataproduk->read($_GET['id']);    
  }else{
    header("Location: index.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>  
  <title>Lihat Produk</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "../assets/page/header.php";
  include "../assets/page/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Product
        <small></small>
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
              <button type="button" class="btn btn-default" style="margin-left:10px;" onclick="window.location.href = 'produk.php'"><i class="fa fa-backward"></i> Back</button>
              <button type="button" class="btn btn-danger pull-right" style="margin-left:10px;" onclick="remove(<?= $produk['ProductID'] ?>)"><i class="fa fa-trash"></i> Hapus Product</button>
              <button type="button" class="btn btn-info pull-right" onclick="window.location.href = 'edit_produk.php?id=1'"><i class="fa fa-edit"></i> Edit Product</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">                
                <tbody>
                <tr>
                  <th>Product</th>
                  <td><?= $produk["Name"] ?></td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td><?= $produk["Price"] ?></td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td><?= $produk["Description"] ?></td>
                </tr>                
                <tr>
                  <th>Category</th>
                  <td><?= $produk["CategoryName"] ?></td>
                </tr>                
                <tr>
                  <th>Image</th>
                  <td><img src="../assets/img/<?= $produk["Image"] ?>" alt="gambar-produk" srcset="" width=300 style="display:block;margin:auto"></td>
                </tr>                                
                </tbody>                
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
  <?php include "../assets/page/footer.php"; ?> 
</div>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  function remove($id){
    $confirm = confirm("You will delete this data. Are you sure ?");

    if($confirm){
      window.location.href = "hapus_produk.php?id=" + $id;
    }
  }
</script>    
</body>
</html>
