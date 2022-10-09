<?php include "../proses/proses.php";  ?>

<?php include "header/header.php"; ?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('sidebar/sidebar.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
    	<?php 
    	if (isset($_POST['simpan'])) {
    		$conn = koneksi();
    		$username = $_POST['username'];
    		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    		$nama_pengguna = $_POST['nama_pengguna']; 
    		$query = "INSERT INTO users (username, password, nama_pengguna) 
    		VALUES ('$username', '$password', '$nama_pengguna')";
			$result = $conn->query($query);
			if ($result){
				$_SESSION['register_users'] = "Anda berhasil register";
				echo "<script>document.location.replace='Register_user.php'</script>";
			}
    	}


    	 ?>
	    <div class="card mb-3">
	        <div class="card-header">
	          <i class="fa fa-archive"></i>Add Users</div>
	        <div class="card-body">

	        <div class="row">
	        	<div class="col-md-6">
	        		<form action="" method="POST">
	        			<div class="form-group">
				        	<label for="">Username</label>
				        	<input type="text" name="username" class="form-control" placeholder="Masukan Username">
				        </div>
				        <div class="form-group">
				        	<label for="">Password</label>
				        	<input type="Password" name="password" class="form-control" placeholder="Masukan Password anda">
				        </div>
				        <div class="form-group">
				        	<label for="">Nama Pengguna</label>
				        	<input type="text" name="nama_pengguna" class="form-control" placeholder="Masukan nama pengguna anda">
				        </div>
				        <div class="form-group">
				        	<button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan Data</button>
				        </div>
	        		</form>


	        	</div>
	        </div>
	        
	    </div>
    </div>
   <?php include('footer/footer.php');?>
  </div>
 </body>