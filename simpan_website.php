<?php
include 'koneksi.php';

$nama_toko = $_POST['nama_toko'];
$slogan    = $_POST['slogan'];
$kontak    = $_POST['kontak'];
$alamat    = $_POST['alamat'];

// Update baris pertama (id=1) misalnya
$sql = "UPDATE website_info 
        SET nama_toko='$nama_toko', slogan='$slogan', kontak='$kontak', alamat='$alamat' 
        WHERE id=1";

if ($conn->query($sql)) {
    echo "<script>alert('Data website berhasil diperbarui!'); window.location='dashboard.php';</script>";
} else {
    echo "Error: " . $conn->error;
}
?>