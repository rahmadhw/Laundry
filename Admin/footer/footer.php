<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to Out of user Portal.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->

    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../endor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>

    <script type="text/javascript">
            function confirmationHapusData(url) {
                   



                      swal({
                          title: "Anda Yakin Untuk Menghapus Data Ini ?",
                          text: "Anda Tidak Dapat Melihat Data Ini Lagi!!!",
                          icon: "warning",
                          buttons: true,
                          confirmButtonColor: '#DD6B55',
                          dangerMode: true,
                        })
                        .then((willDelete) => {
                          if (willDelete) {
                             window.location.href = url;
                          } else {
                            swal("Your imaginary file is safe!");
                          }
                        });
                  }
          </script>

<?php if (isset($_SESSION['pesan'])) { ?>

  <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['pesan']; ?>",
      text: "You clicked the button!",
      icon: "success",
    });
  </script>

<?php unset($_SESSION['pesan']); } ?>


<?php if (isset($_SESSION['tambahPesan'])) { ?>

  <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['tambahPesan']; ?>",
      text: "You clicked the button!",
      icon: "success",
    });
  </script>

<?php unset($_SESSION['tambahPesan']); } ?>


<?php if (isset($_SESSION['pesanHapus'])) { ?>

<script type="text/javascript">
   swal({
      title: "<?php echo $_SESSION['pesanHapus']; ?>",
      text: "Yeee",
      icon: "success",
    });
</script>

<?php unset($_SESSION['pesanHapus']) ; }  ?>


<?php if (isset($_SESSION['pesanHapusRecord'])) { ?>

    <script type="text/javascript">
      swal({
      title: "<?php echo $_SESSION['pesanHapusRecord']; ?>",
      text: "Yeee",
      icon: "success",
    });
    </script>

<?php unset($_SESSION['pesanHapusRecord']); } ?>



<?php if (isset($_SESSION['tambahPesanAdd'])) { ?>

  <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['tambahPesanAdd']; ?>",
      text: "Yeee",
      icon: "success",
    });
  </script>

<?php unset($_SESSION['tambahPesanAdd']); } ?>


<?php if (isset( $_SESSION['fixserviceAdd'])) { ?>
    
    <script type="text/javascript">
       swal({
          title: "<?php echo $_SESSION['fixserviceAdd']; ?>",
          text: "Yeee!",
          icon: "success",
        });
    </script>

<?php unset($_SESSION['fixserviceAdd']); } ?>

<?php if (isset( $_SESSION['uprove'])) { ?>

  <script type="text/javascript">
      swal({
          title: "<?php echo $_SESSION['uprove']; ?>",
          text: "Yeee",
          icon: "success",
        });
  </script>

<?php unset( $_SESSION['uprove']) ;} ?>

<?php if (isset($_SESSION['register_users'])) { ?>
    <script type="text/javascript">
      swal({
          title: "<?php echo $_SESSION['register_users']; ?>",
          text: "Yeee",
          icon: "success",
        });
  </script>
<?php unset($_SESSION['register_users']); } ?>