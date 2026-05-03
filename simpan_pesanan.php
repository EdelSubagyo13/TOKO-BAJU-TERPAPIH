<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (isset($_POST['setuju'])) {
  // Ambil data dari form
  $nama      = $_POST['nama_lengkap'];
  $telepon   = $_POST['telepon'];
  $email     = $_POST['email'];
  $alamat    = $_POST['alamat'];
  $lokasi    = isset($_POST['lokasi']) ? $_POST['lokasi'] : ''; // hindari error jika tidak dikirim
  $produk_id = $_POST['produk_id'];
  $jumlah    = $_POST['jumlah'];
  $ukuran    = $_POST['ukuran'];
  $metode    = $_POST['metode_pembayaran'];

  // Simpan ke database
  $sql = "INSERT INTO pemesanan 
          (nama_lengkap, telepon, email, alamat, lokasi, produk_id, jumlah, ukuran, metode_pembayaran) 
          VALUES 
          ('$nama', '$telepon', '$email', '$alamat', '$lokasi', '$produk_id', '$jumlah', '$ukuran', '$metode')";

  if ($conn->query($sql)) {
    header("Location: konfirmasi.php");
    exit();
  } else {
    echo "Gagal menyimpan pesanan: " . $conn->error;
  }
} else {
  echo "<script>alert('Anda harus menyetujui syarat dan ketentuan.'); history.back();</script>";
}
?>