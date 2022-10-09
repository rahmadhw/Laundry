<?php include "../proses/proses.php";  ?>

<?php include "header/header.php"; ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

  <?php  include('sidebar/sidebar.php');?>

<?php 


if(isset($_POST['simpan'])) {
  $conn = koneksi();
  $order_id = $_POST['id_order'];
  $tbl_service_upload_id = $_POST['id_tbl_service_uploade'];
  $users_id = $_POST['id_users'];
  $status = $_POST['status'];
  if ($order_id == "")
  {
    echo "<script>alert('mohon jangan di kosongkan')</script>";
  }else {
    $sql = "INSERT INTO tbl_fix_order (order_id, tbl_service_upload_id, users_id, status) VALUES ('$order_id', '
    $tbl_service_upload_id', '$users_id' , '$status')";
    $result = $conn->query($sql);
    if ($result) {
    $_SESSION['fixserviceAdd'] = "berhasil menambahkan data";
     echo "<script>
        window.location.replace='fixService.php';
      </script>";

    }
  }

  

}



 ?>


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
     

          <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Add Service Data</div>
        <div class="card-body">
         <form action="" method="POST">
             <div class="row mt-4">
                
                <div class="form-group col-md-8">
                  <?php $idget = $_GET['id']; ?>
                  <input type="text" name="id_order" value="<?php echo $idget; ?>" class="form-control" readonly>
                </div> 
                <div class="form-group col-md-8">
                  <label>Nama barang cucian</label>
                  <select name="id_tbl_service_uploade" class="form-control">
                  <option>-- Pilih --</option>
                  <?php 

                    $conn = koneksi();
                    $sql = "SELECT * FROM tbl_service_upload";
                    $query = $conn->query($sql);
                    
                    while($rs = $query->fetch_assoc()) {
                      echo '<option value="'.$rs['id'].'">'.$rs['Nama_barang'].'</option>';
                    }

                   ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label>Nama User Acount</label>
                  <select name="id_users" class="form-control">
                  <?php 

                    $conn = koneksi();
                    $sql = "SELECT * FROM users";
                    $query = $conn->query($sql);
                   ?>
                   <?php while($rs = $query->fetch_assoc()) { ?>
                    <option value="<?php echo $rs['id'];?>"><?php echo $rs['nama_pengguna']; ?></option>
                    <?php  }; ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label>Status</label>  
                  <select class="form-control" name="status">
                    <option value="Pending">Pending</option>
                  </select>
                </div>
                
                <div class="form-group col-md-8">
                  <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan Data</button>
                </div>
            </div>
         </form>
        </div>
                     
      </div>
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive mr-1"></i>order Detail</div>
        <div class="card-body">
          
          <?php 
          $conn = koneksi();
          $id = $_GET['id'];
          $query ="SELECT * FROM tbl_fix_order JOIN tb_order ON tbl_fix_order.order_id=tb_order.id 
          JOIN tbl_service_upload ON tbl_fix_order.tbl_service_upload_id=tbl_service_upload.id 
          JOIN users ON tbl_fix_order.users_id=users.id WHERE tbl_fix_order.order_id='$id'";

          $result = $conn->query($query);
           ?>    
        


          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Order</th>
                  <th>Alamat</th>
                  <th>order code</th>
                  <th>Nama barang</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>Nama Pengguna</th>
                  <th>Order Date</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
              <?php $nomor = 1; ?>
              <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $row['nama_order']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['order_code']; ?></td>
                  <td><?php echo $row['Nama_barang']; ?></td>
                  <td><?php echo number_format($row['dry_price']); ?></td>
                  <td><?php echo number_format($row['laundry_price']); ?></td>
                  <td><?php echo $row['nama_pengguna']; ?></td>
                  <td><?php echo $row['order_date']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                  <td>
                    
                    <?php if ($row['status'] == "Pending") { ?>
                    <!-- <a href="" class="btn btn-info btn-sm">Detail</a> -->
                    <a href="uprove.php?id=<?php echo $row['order_id']; ?>" class="btn btn-info btn-sm">Uprove</a>
                      

                    </button>

                    <?php }else if ($row['status'] == "Success") { ?>
                      <a href="" class="btn btn-primary btn-sm">Done</a>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
                     
      </div>



    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer/footer.php');?>
  </div>
</body>

</html>


