<?php


include "proses/proses.php";
session_start();

if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
  header("Location: users/index.php");
}

if (isset($_POST['login']))
{
  $conn = koneksi();
  $A_NAME = $_POST['A_NAME'];
  $A_PASSWORD = $_POST['A_PASSWORD'];
  $sql = "SELECT * FROM users WHERE username = '$A_NAME'";
  $query1 = $conn->query($sql);
  if (mysqli_num_rows($query1) === 1 ) {
    $result = $query1->fetch_assoc();
    if (password_verify($A_PASSWORD, $result['password'])) {
      $_SESSION['users'] = $result['username'];
      $_SESSION['id'] = $result['id'];
      $_SESSION['pesanLogin'] = "Anda berhasil Login";
      header("Location: users/index.php");
    }
  }

  $_SESSION['gagalLogin'] = "Anda gagal login";
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login UMI Laundry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="index.css">
</head>
<body>



<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
   
          <form method="POST" action=""> 
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="A_NAME" require placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="A_PASSWORD"  required placeholder="Enter Your Password">
            </div>

              <button type="submit" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Not a member? <a href="Registration.php">New Registration</a></p>
      <!--     <p>Forgot <a href="#">Password?</a></p> -->
        </div>
      </div>
      
    </div>
  </div> 
</div>




<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('#myModal').modal({
    backdrop: 'static',   // This disable for click outside event
    keyboard: true        // This for keyboard event
})
</script>

<?php if (isset($_SESSION['gagalLogin'])) { ?>

  <script type="text/javascript">
    swal({
      title: "<?php echo $_SESSION['gagalLogin']; ?>",
      text: "You clicked the button!",
      icon: "warning",
    });
  </script>

<?php unset($_SESSION['gagalLogin']); } ?>

<?php if (isset($_SESSION['register_users'])) { ?>
    <script type="text/javascript">
      swal({
          title: "<?php echo $_SESSION['register_users']; ?>",
          text: "Yeee",
          icon: "success",
        });
  </script>
<?php unset($_SESSION['register_users']); } ?>


</body>
</html>