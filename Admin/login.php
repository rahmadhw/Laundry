<?php

include '../proses/proses.php';
session_start();

if (isset($_SESSION['Admin_Portal']) && !empty($_SESSION['Admin_Portal'])){
  header("Location: index.php");
}



?>

<?php 


if (isset($_POST['LoginAdmin'])) {
  
  $conn = koneksi();
  $A_NAME = $_POST['A_NAME'];
  $A_PASSWORD = $_POST['A_PASSWORD'];
  $query = "SELECT * FROM admin WHERE username='$A_NAME' and password='$A_PASSWORD'";
  $sql = $conn->query($query);
  if ($sql)
  {
      $select = "SELECT * FROM admin WHERE username='$A_NAME' and password='$A_PASSWORD'";
      $exe = $conn->query($select);
      while($row = $exe->fetch_assoc()) {
      $_SESSION['Admin_Portal'] = $row['nama_pengguna'];
      // $_SESSION['ID'] = $row['ID'];
      // $_SESSION['Adm_Password'] = $row['Adm_Password'];
    }
     $_SESSION["pesan"] = "berhasil";
     header("Location: index.php");

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

</head>
<body>



<div class="container">
      <h1>Please Login</h1>
      <form action="" method="POST" id="form">
        <div class="form-control">
          <input type="text" name="A_NAME" required>
          <label>Email</label>
          <!-- <label>
            <span style="transition-delay: 0ms">E</span>
              <span style="transition-delay: 50ms">m</span>
              <span style="transition-delay: 100ms">a</span>
              <span style="transition-delay: 150ms">i</span>
              <span style="transition-delay: 200ms">l</span>
        </label> -->
        </div>

        <div class="form-control">
          <input type="password" name="A_PASSWORD" required>
          <label>Password</label>
        </div>

        <button class="btn" name="LoginAdmin" id="btnSubmit">Login</button>

        <p class="text"></p>
      </form>
    </div>

    
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


</body>
</html>

