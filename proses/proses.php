<?php 

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "new_laundry");
}





function ubahPassword()
{
  $conn = koneksi();
  $USER_ID = $_SESSION['id'];
  $password = $_POST['password'];
  $sql = "UPDATE users SET password='$password' WHERE id = '$USER_ID'";
  $query = $conn->query($sql);
  return $query;
}


function SelectChangeService()
{
  $conn = koneksi();
  $sql = "SELECT * FROM `services_type`";
  $query = $conn->query($sql);
  return $query;
}

function detailServisType()
{
  $conn = koneksi();
  $sql = "SELECT * FROM detail_service_type
   JOIN services_type 
   ON detail_service_type.id_services_type=services_type.id_services_type
   ";
  $result = $conn->query($sql);
  $data = [];
  while($row = $result->fetch_assoc())
  {
    $data[] = $row;
  }

  return $data;

}

function showuser()
{
  $conn = koneksi();
  $sql = "SELECT * FROM `users`";
  $query = $conn->query($sql);
  return $query;
}






?>
