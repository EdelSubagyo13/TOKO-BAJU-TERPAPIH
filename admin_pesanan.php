<?php
include 'koneksi.php';
session_start();

// cek login admin
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: order.php");
    exit;
}

$result = mysqli_query($conn, "SELECT p.id, p.nama_pemesan, p.email, p.alamat, pr.nama_produk, p.jumlah, p.tanggal_pesan, p.status 
                               FROM pesanan p 
                               JOIN produk pr ON p.produk_id = pr.id 
                               ORDER BY p.tanggal_pesan DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan</title>
    <style>
        table {border-collapse: collapse; width: 100%;}
        th, td {border: 1px solid #ddd; padding: 8px;}
        th {background-color: #333; color: white;}
    </style>
</head>
<body>
    <h2>Daftar Pesanan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Tanggal Pesan</th>
            <th>Status</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_pemesan'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td><?= $row['jumlah'] ?></td>
            <td><?= $row['tanggal_pesan'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>