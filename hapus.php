<?php
include 'koneksi.php';

$id = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM produk WHERE id=$id";

if ($conn->query($sql)) {
  echo "<script>alert('Produk berhasil dihapus!'); window.location='dashboard.php';</script>";
} else {
  echo "Gagal menghapus produk: " . $conn->error;
}
?>