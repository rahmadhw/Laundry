<?php 
session_start();
include '../proses/proses.php';

$id = $_GET['id_service'];
$conn = koneksi();
$query = "DELETE FROM tbl_service WHERE id_service='$id'";
$result = $conn->query($query);
$_SESSION['pesanHapus'] = "anda Berhasil menghapus data";
echo "<script>window.location='Register_Services.php'</script>";






 ?>