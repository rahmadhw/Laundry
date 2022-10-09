
<?php 
  

  if (!isset($_SESSION['users']) && empty($_SESSION['users']))
  {
    header("Location: ../login.php");
  }




 ?>

<?php include "../proses/proses.php"; ?>







  <!-- Navigation-->

    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>semua Order</div>
        <div class="card-body">


           <?php 
          $conn = koneksi();
          $id = $_SESSION['id'];
          $query ="SELECT * FROM tbl_fix_order JOIN tb_order ON tbl_fix_order.order_id=tb_order.id 
          JOIN tbl_service_upload ON tbl_fix_order.tbl_service_upload_id=tbl_service_upload.id 
          JOIN users ON tbl_fix_order.users_id=users.id WHERE tbl_fix_order.users_id='$id'";

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
                  <?php if ($row['status'] == "Pending") { ?>
                     <th>
                       Proses
                     </th>
                  <?php }else { ?>
                    <th>  <a href="hapusOrder.php?id=<?php echo $row['order_id']; ?>"class=" btn btn-danger btn-sm">Delete</a>
              
                  </th>

                  <?php } ?>
                
                </tr>
                <?php }; ?>    
                             
                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>



    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

</body>

</html>
