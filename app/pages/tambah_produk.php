<?php

  include "../functions/database.php";
  include "../functions/product.php";
  include "../functions/category.php";

  // $temp_file = sys_get_temp_dir();

  // echo $temp_file;
  // var_dump($_FILES);
  // die;

  $database = new database();
  $db = $database->getConnection();
  $dataproduk = new product($db);
  $datakategori = new category($db);
    
  // Jika tombol Save ditekan
  if(isset($_POST['submit'])){
    $produk = $dataproduk->tambah($_POST,$_FILES['image']);
    // Jika edit produk berhasil
    if($produk){      
      echo "<script>
      alert('Data berhasil ditambah');
      window.location.href = 'produk.php'; 
      </script>";
    // Jika edit produk gagal
    }else{      
      echo "<script>
      alert('Data gagal ditambah');      
      </script>";
    }
  }

  
?>
<!DOCTYPE html>
<html>
<head>  
  <title>Tambah Produk</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "./assets/page/header.php";
  include "./assets/page/sidebar.php";?>
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
          <form action="" method="post" enctype="multipart/form-data">
          <div class="box">
            <div class="box-header">      
              <button type="button" class="btn btn-default" style="margin-left:10px;" onclick="window.location.href = 'produk.php'"><i class="fa fa-backward"></i> Back</button>              
              <button type="submit" class="btn btn-info pull-right" name="submit"><i class="fa fa-edit"></i> Save Product</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">                
                <tbody>
                <tr>
                  <th>Product</th>
                  <td>
                    <input type="text" class="form-control" name="product" id="product" required>                    
                  </td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td><input type="number" class="form-control" name="price" id="price" required></td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td><input type="text" class="form-control" name="description" id="description" required></td>
                </tr>                
                <tr>
                  <th>Category</th>
                  <td><select name="category" class="form-control" id="category" >                  
                  <?php foreach($datakategori->show() as $category) : ?>                 
                  <option value="<?= $category["CategoryID"] ?>"><?= $category["CategoryName"] ?></option>                 
                  <?php endforeach; ?>
                  </select></td>
                </tr>                
                <tr>
                  <th>Image</th>
                  <td>                    
                    <img src="./assets/img/noimage.png" alt="gambar-produk" srcset="" width=300 style="display:block;margin:auto">                    
                    <input type="hidden" name="imageOld" id="imageOld" value="noimage.png">
                    <input type="file" name="image" id="image" value="Choose File">
                    <span>(Max. 2MB)</span>
                  </td>
                  
                </tr>                                
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </form>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->      
  <?php include "./assets/page/footer.php"; ?> 
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
</body>
</html>
