<?php
  include "./functions/database.php";
  include "./functions/category.php";
  
  $database = new database();
  $db = $database->getConnection();
  $datakategori = new category($db);
  $kategori = $datakategori->show();

  
?>

<!DOCTYPE html>
<html>
<head>  
  <title>Kategori</title>  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include "header.php";
  include "sidebar.php";?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
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
              <h3 class="box-title">Category</h3>
              <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create Category</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="25%">Name</th>
                  <th width="60%">Description</th>                  
                  <th width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($kategori as $category) : ?>
                <tr>
                  <td><?= $category['CategoryName']; ?></td>
                  <td><?= $category['Description']; ?></td>
                  <td>
                    <button type="button" class="btn btn-primary" onclick="window.location.href = '?=<?= $category['CategoryID']; ?>'"><i class="fa fa-eye"></i> Read</button>
                    <button type="button" class="btn btn-info" onclick="window.location.href = '?=<?= $category['CategoryID']; ?>'"><i class="fa fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-danger" onclick="window.location.href = '?=<?= $category['CategoryID']; ?>'"><i class="fa fa-trash"></i> Delete</button>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th width="25%">Name</th>
                  <th width="60%">Description</th>                  
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
  <?php include "footer.php"; ?>      
</div>
<?php include "script.php"; ?>      
</body>
</html>
