<?php include "../proses/proses.php";  ?>
<?php session_start(); ?>
<?php include "header/header.php" ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>

     <?php 

if(isset($_POST['simpan'])) {
  $conn = koneksi();
  $id_service = $_POST['id_service'];
  $namabarang = $_POST['Nama_barang'];
  $dry_price = $_POST['dry_price'];
  $laundry_price = $_POST['laundry_price'];
  if ($namabarang == "")
  {
    echo "<script>alert('mohon jangan di kosongkan')</script>";
  }else {
    $sql = "INSERT INTO tbl_service_upload (id_service, Nama_barang, dry_price, laundry_price) VALUES ('$id_service', '$namabarang', '$dry_price', '$laundry_price')";
    $result = $conn->query($sql);
    if ($result)
    {
      $_SESSION['tambahPesan'] = "good";
      echo "<script>window.location.replace='Services_record.php'</script>";
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
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="Nama_barang" placeholder="Masukan Nama Anda">
                </div>
                <div class="form-group col-md-8">
                  <label>Service Type</label>
                  <select name="id_service" class="form-control">
                  <?php 

                    $conn = koneksi();
                    $sql = "SELECT * FROM tbl_service";
                    $query = $conn->query($sql);
                   ?>
                   <?php while($rs = $query->fetch_assoc()) { ?>
                    <option value="<?php echo $rs['id_service'];?>"><?php echo $rs['nama_service']; ?></option>
                    <?php  }; ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="">Dry Price</label>
                  <input type="text" class="form-control" name="dry_price" placeholder="Masukan Dry Price yang anda inginkan">
                </div>
                <div class="form-group col-md-8">
                  <label for="">Laundry Price</label>
                  <input type="text" class="form-control" name="laundry_price" placeholder="Masukan Laundry Price yang anda inginkan">
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
          <i class="fa fa-archive"></i>Services Type</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>service Type</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
              <?php $conn = koneksi(); ?>
              <?php $sql ="SELECT * FROM tbl_service_upload JOIN tbl_service ON tbl_service_upload.id_service=tbl_service.id_service"; ?>
              <?php $query = $conn->query($sql); ?>
              <?php $nomor=1; ?>
              <?php while($row=$query->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?php echo $row['Nama_barang']; ?></td>
                  <td><?php echo $row['nama_service']; ?></td>
                  <td>Rp. <?php echo number_format($row['dry_price']); ?></td>
                  <td>Rp. <?php echo number_format($row['laundry_price']); ?></td>
                  <td>
                     <button onclick="confirmationHapusData('hapusServiceRecord.php?id=<?php echo $row['id'] ?>')" class="btn btn-danger btn-sm">Delete</button>
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
