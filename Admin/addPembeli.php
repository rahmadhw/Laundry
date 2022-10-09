<?php include "../proses/proses.php";  ?>



<?php include "header/header.php"; ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">

        <li class="breadcrumb-item active">add Data</li>
      </ol>

     
      
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Add Data Pencucian Pelanggan</div>
        <div class="card-body">
          <?php 

            if (isset($_POST['simpan'])) {
              $conn = koneksi();
              $id = $_POST['id_tbl_service'];
              $nama = $_POST['nama_order'];
              $alamat = $_POST['alamat'];
              $order_code = $_POST['order_code'];
              $insert = "INSERT INTO tb_order (id_tbl_service, nama_order, alamat, order_code)
               VALUES 
               ('$id', '$nama', '$alamat', $order_code)";

              $query = $conn->query($insert);
              if ($query) {
                 $_SESSION['tambahPesanAdd'] = "Berhasil Menambahkan Data";
                echo '

                  <script>window.location.replace="addPembeli.php"</script>

                ';
              }else {
                 echo '

                  <script>alert("gagal")</script>

                ';
              }

            }



           ?>



          <?php $conn = koneksi(); ?>
          <?php $sql = "SELECT * FROM tbl_service"; ?>
          <?php $query = $conn->query($sql); ?>

    
          



           <form action="" method="POST">
             <div class="row mt-4">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="">Cucian Anda</label>
                    <select class="form-control" name="id_tbl_service">
                      <?php while($row=$query->fetch_assoc()) { ?>
                      <option value="<?php echo $row['id_service'] ?>"  class="form-control"><?php echo $row['nama_service']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="">nama order</label>
                    <input Type= "text"  id="" class="form-control" name="nama_order" placeholder="Masukan Nama Anda"></input>
                  </div>

                  <div class="form-group">
                    <label for="">alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Masukan Alamat Lengkap Anda"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="">Order Code</label>
                  
                    <input name="order_code" class="form-control" value="<?php echo rand(20,2000); ?>" readonly></input>
                  </div>
                  
                   <div class="form-group">
                    <button class="btn btn-primary btn-sm" name="simpan">simpan</button>
                  </div>
                </div>
            </div>
         </form>
        </div>
                     
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer/footer.php');?>
  </div>
</body>

</html>
