<?php
session_start();

if (!isset($_SESSION['users']) && empty($_SESSION['users'])) {
  header("Location: ../login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
     
  

   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['users'] ?></a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          
         
          <li class="nav-item">
            <a href="index.php" class="nav-link">
                <i class="fa fa-fw fa-dashboard"></i>
              <p>Dashbord</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?halaman=userOderDetail" class="nav-link">
              <i class="fa fa-fw fa-truck"></i>
              <p>User Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?halaman=changePassword" class="nav-link">
             <i class="fa fa-fw fa-lock"></i>
              <p>Change Password</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="index.php?halaman=logout" class="nav-link" data-toggle="modal" data-target="#exampleModal">
             <i class="fa fa-fw fa-lock"></i>
              <p>Log out</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content mt-4">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">
        </div>
        <div class="card-body">
          <?php 
          if (isset($_GET['halaman'])) {
            if ($_GET['halaman'] == "userOderDetail")
            {
              include "userOrderDetail.php";
            }
            else if ($_GET['halaman'] == "changePassword")
            {
              include "changePassword.php";
            }
            else if ($_GET['halaman'] == "logout")
            {
              include "logout.php";
            }

          }else {
            include "home.php";
          } 
          
          ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to Out of user Portal.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php?halaman=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->


<?php if (isset($_SESSION['pesanLogin'])) { ?>

  <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['pesanLogin']; ?>",
      text: "You clicked the button!",
      icon: "success",
    });
  </script>

<?php unset($_SESSION['pesanLogin']); } ?>


<?php if (isset($_SESSION['userPesanUbashPassword'])) { ?>

   <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['userPesanUbashPassword']; ?>",
      text: "You clicked the button!",
      icon: "success",
    });
  </script>

<?php unset($_SESSION['userPesanUbashPassword']); } ?>


</body>
</html>
