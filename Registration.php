<?php

include 'proses/proses.php';
session_start();


if (isset($_POST['registrasi'])) {
  $conn = koneksi();
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $nama_pengguna = $_POST['nama_pengguna'];
  $query = "INSERT INTO users (username, password, nama_pengguna) 
  VALUES ('$username', '$password', '$nama_pengguna')";
  $result = $conn->query($query);
  if ($result){
    $_SESSION['register_users'] = "Anda berhasil register";
    echo "<script>document.location.href='login.php'</script>";
  }
  
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login Admin</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.37/dist/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="Admin/style.css">

</head>
<body>



<div class="container">
      <h1>Please Login</h1>
      <form action="" method="POST" id="form">
        <div class="form-control">
          <input type="text" name="username" required>
          <label>username</label>
        </div>

        <div class="form-control">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="form-control">
          <input type="text" name="nama_pengguna" required>
          <label>nama pengguna</label>
        </div>

        <button class="btn" name="registrasi" id="btnSubmit">Login</button>

        <p class="text"></p>
      </form>
    </div>

     <script type="text/javascript" src="Admin/"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



    <script>
      const labels = document.querySelectorAll('.form-control label')

    labels.forEach(label => {
        label.innerHTML = label.innerText
            .split('')
            .map((letter, idx) => `<span style="transition-delay:${idx * 50}ms">${letter}</span>`)
            .join('')
    })
    </script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>

