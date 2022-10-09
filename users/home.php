<?php include "../proses/proses.php"; ?>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <?php 
              $conn = koneksi();
              $id = $_SESSION['id'];
              $query = "SELECT COUNT(users_id) AS jumlah FROM tbl_fix_order WHERE users_id='$id'";
              $sql = $conn->query($query);
              $result = $sql->fetch_assoc();
           
               print_r($result['jumlah']);
               ?>
              <div class="mr-5">
               Order Detail!
             </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?halaman=userOderDetail">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
