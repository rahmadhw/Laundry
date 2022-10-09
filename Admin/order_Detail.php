<?php include "../proses/proses.php";  ?>

<?php include "header/header.php"; ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item active">My Service</li>
      </ol>

     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Services Type</div>
        <div class="card-body">
            
          <?php $conn = koneksi(); ?>
          <?php $sql = "SELECT * FROM tb_order JOIN tbl_service ON tb_order.id_tbl_service=tbl_service.id_service"; ?>
          <?php $query = $conn->query($sql); ?>



          <div class="table-responsive">
            <a href="addRecord.php" class="btn btn-primary btn-sm mb-4">Add Data</a>
           
            
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Order</th>
                  <th>Alamat</th>
                  <th>Order Code</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
            <?php $nomor = 1; ?>
            <?php while($row = $query->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $row['nama_order']; ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['order_code']; ?></td>
                  <td>
                    <a href="detailorder.php?id=<?php echo $row['id']; ?>&id_order" class="btn btn-info btn-sm">Detail</a>
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
