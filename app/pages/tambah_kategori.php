<?php

  include "../functions/database.php";  
  include "../functions/category.php";

  // var_dump($_POST);
  // die;

  $database = new database();
  $db = $database->getConnection();  
  $datakategori = new category($db);
    
  // Jika tombol Save ditekan
  if(isset($_POST['submit'])){
    $kategori = $datakategori->tambah($_POST);
    // Jika edit produk berhasil
    if($kategori){      
      echo "<script>
      alert('Data berhasil ditambah');
      window.location.href = 'kategori.php'; 
      </script>";
    // Jika edit produk gagal
    }else{      
      echo "<script>
      event.preventDefault();
      alert('Data gagal ditambah');      
      </script>";
    }
  }

  
?>
<!DOCTYPE html>
<html>
<head>  
  <title>Kategori | Tambah Kategori</title>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "./assets/page/header.php";?>
  <?php include "./assets/page/sidebar.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Category
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
                  <th>Category Name</th>
                  <td>
                    <input type="text" class="form-control" name="category" id="category" required>                    
                  </td>
                </tr>                
                <tr>
                  <th>Description</th>
                  <td><textarea class="form-control" rows="3" name="description" id="description" required></textarea></td>
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
