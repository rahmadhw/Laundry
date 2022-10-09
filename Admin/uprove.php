<?php include "../proses/proses.php";  ?>
<?php session_start(); ?>
<?php include "header/header.php" ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

       
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item active">My Service</li>
      </ol>

      <?php 

     if (isset($_POST['Uprove'])) {
        $conn = koneksi();
        $id = $_GET['id'];
        $status = $_POST['status'];
        $query = "UPDATE tbl_fix_order SET status='$status' WHERE order_id='$id'";
       $result2 = $conn->query($query);
        $_SESSION['uprove'] = "Berhasil Menambahkan Data";
    }


       
       ?>



     <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Uprove</div>
        <div class="card-body">
         <h1>Add uprove order</h1>
         <form action="" method="POST">
             <div class="row mt-4">
                <div class="form-group col-md-8">
                 <select name="status" class="form-control">
                        <option class="form-control">-- Pilih --</option>
                         <option class="form-control" value="Pending">Pending</option>
                         <option class="form-control" value="Success">Success</option>
                                    
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <button type="submit" name="Uprove" class="btn btn-primary btn-sm">Simpan Data</button>
                </div>
            </div>
         </form>
        </div>
                     
      </div>
      
      <!-- Example DataTables Card-->
  
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
   
    <?php include('footer/footer.php');?>

  </div>
</body>

</html>
