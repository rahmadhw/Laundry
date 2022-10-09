<?php include "../proses/proses.php";  ?>
<?php session_start(); ?>
<?php include "header/header.php" ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

       
      <!-- Breadcrumbs-->
      

      <?php 

      if (isset($_POST['simpan']))
      {
        $conn = koneksi();
        $servicename = $_POST['service_name'];
        $query ="INSERT INTO tbl_service (nama_service) VALUES ('$servicename')";
        $result = $conn->query($query);
        if ($result)
        {
          $_SESSION['pesan'] = 'hahahah';
         echo "<script>window.location.replace='Register_Service.php'</script>";
        }
      }



       
       ?>



     <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Add Services Type</div>
        <div class="card-body">
         <form action="" method="POST">
             <div class="row mt-4">
                <div class="form-group col-md-8">
                  <label for="">Name</label>
                  <input type="text" class="form-control" name="service_name" placeholder="Masukan Type Pelayanan Cucian">
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
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>

              <?php $conn = koneksi();  ?>
              <?php $sql = "SELECT * FROM tbl_service"; ?>
              <?php $query = $conn->query($sql); ?>
              <?php $nomor = 1; ?>

              <?php while($row = $query->fetch_assoc()) {  ?>
                <tr>
                  <td><?php echo $nomor++; ?></td>
                  <td><?= $row['nama_service']; ?></td>
                  <td>
                 <button onclick="confirmationHapusData('proseshapus.php?id_service=<?php echo $row['id_service'] ?>')" class="btn btn-danger btn-sm">Delete</button>
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
