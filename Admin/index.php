<?php include "header/header.php"; ?>
<?php 
session_start();

if (!isset($_SESSION['Admin_Portal']) && empty($_SESSION['Admin_Portal'])){
  header("Location: login.php");
  return false;
}



 ?>

<?php include "../proses/proses.php"; ?>





<body class="fixed-nav sticky-footer bg-dark" id="page-top">


  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5">
                 Total Servics Provide!
               </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="menu_record.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"> Resginter user!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_user.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Pending Order</div>
        <div class="card-body">


           <?php 
          $conn = koneksi();
        
          $query ="SELECT * FROM tbl_fix_order JOIN tb_order ON tbl_fix_order.order_id=tb_order.id 
          JOIN tbl_service_upload ON tbl_fix_order.tbl_service_upload_id=tbl_service_upload.id 
          JOIN users ON tbl_fix_order.users_id=users.id WHERE tbl_fix_order.status='Pending'";

          $result = $conn->query($query);
           ?>    



          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
              <?php $nomor = 1;  ?>
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
                  <th>  <a href="fixService.php?id=<?php echo $row['order_id']; ?>"class=" btn btn-success btn-sm">View</a>
              
                  </th>
                
                </tr>
                <?php }; ?>    
                             
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
