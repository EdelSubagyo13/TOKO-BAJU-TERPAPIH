<?php
include 'koneksi.php';

$id = $_GET['id'];
$sql = "UPDATE pemesanan SET status='selesai' WHERE id=$id";

if ($conn->query($sql)) {
  echo "<script>alert('Pesanan telah disudahi.'); window.location='dashboard.php';</script>";
} else {
  echo "Gagal memperbarui status: " . $conn->error;
}
?>