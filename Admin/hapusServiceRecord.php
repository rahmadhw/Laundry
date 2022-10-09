<?php 
session_start();
include '../proses/proses.php';

$id = $_GET['id'];
$conn = koneksi();
$query = "DELETE FROM tbl_service_upload WHERE id='$id'";
$result = $conn->query($query);
$_SESSION['pesanHapusRecord'] = "anda Berhasil menghapus data";
echo "<script>window.location='Services_record.php'</script>";






 ?>