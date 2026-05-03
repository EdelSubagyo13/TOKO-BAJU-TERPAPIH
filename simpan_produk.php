<?php
include 'koneksi.php';

$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$lokasi = $_FILES['gambar']['tmp_name'];
move_uploaded_file($lokasi, "img/".$gambar);

$conn->query("INSERT INTO produk (nama_produk, deskripsi, harga, gambar) 
VALUES ('$nama', '$deskripsi', '$harga', '$gambar')");

echo "<script>alert('Produk berhasil ditambahkan!'); window.location='dashboard.php';</script>";
?>