<?php

  include "../functions/database.php";
  include "../functions/category.php";
  
  $database = new database();
  $db = $database->getConnection();
  $datakategori = new category($db);
  
  if(isset($_GET['id'])){
    $kategori = $datakategori->read($_GET['id']);    
  }else{
    header("Location: index.php");
  }
  
?>
<!DOCTYPE html>
<html>
<head>  
  <title>Lihat Kategori</title>
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
        List of Cateogry
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
              <button type="button" class="btn btn-default" style="margin-left:10px;" onclick="window.location.href = 'kategori.php'"><i class="fa fa-backward"></i> Back</button>
              <button type="button" class="btn btn-danger pull-right" style="margin-left:10px;" onclick="remove(<?= $kategori['CategoryID'] ?>)"><i class="fa fa-trash"></i> Remove Category</button>
              <button type="button" class="btn btn-info pull-right" onclick="window.location.href = 'edit_kategori.php?id=<?= $kategori['CategoryID'] ?>'"><i class="fa fa-edit"></i> Edit Category</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">                
                <tbody>
                <tr>
                  <th>Name</th>
                  <td><?= $kategori["CategoryName"] ?></td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td><?= $kategori["Description"] ?></td>
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
      window.location.href = "hapus_kategori.php?id=" + $id;
    }
  }
</script>    
</body>
</html>
