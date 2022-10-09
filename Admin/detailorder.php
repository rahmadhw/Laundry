<?php include "../proses/proses.php";  ?>

<?php include "header/header.php"; ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item active">Order Detail</li>
      </ol>

     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive mr-1"></i>order Detail</div>
        <div class="card-body">
            
          <?php $conn = koneksi(); ?>
          <?php $id = $_GET['id']; ?>
          <?php $sql = "SELECT * FROM tb_order JOIN tbl_service ON tb_order.id_tbl_service=tbl_service.id_service WHERE tb_order.id='$id'" ; ?>
          <?php $query = $conn->query($sql); ?>
          



          <div class="table-responsive">
            
            
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Order</th>
                  <th>Alamat</th>
                  <th>Service ID</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor=1; ?>
              <?php while($row = $query->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $row['nama_order'] ?></td>
                  <td><?php echo $row['alamat']; ?></td>
                  <td><?php echo $row['id_tbl_service'] ?></td>
                  <td>
                    <a href="fixService.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Lanjut</a>
                    <!-- <a href="" class="btn btn-info btn-sm">Detail</a> -->
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
