<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit();
}
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - Toko Baju Edel</title>
  <style>
    body {
      font-family: Verdana, Arial, sans-serif;
      background:#FFF7E6;
      color:#5D4037;
      margin:0;
      padding:20px;
    }
    h2 {
      color:#3E2723;
      margin-top:30px;
    }
    form {
      background:#FFF8E5;
      border:1px solid #EAD7B0;
      padding:20px;
      border-radius:8px;
      box-shadow:0 2px 6px rgba(0,0,0,0.12);
      max-width:600px;
      margin-bottom:30px;
    }
    label {
      display:block;
      margin-top:10px;
      font-weight:bold;
    }
    input, textarea {
      width:100%;
      padding:8px;
      margin-top:4px;
      border:1px solid #CCC;
      border-radius:6px;
      font-family:inherit;
    }
    button, .btn-link {
      margin-top:15px;
      padding:10px 20px;
      background:#D2691E;
      color:#FFF7E6;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-weight:bold;
      text-decoration:none;
      display:inline-block;
    }
    button:hover, .btn-link:hover {
      background:#8D6E63;
    }
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top:20px;
    }
    th, td {
      border: 1px solid #EAD7B0;
      padding: 8px;
      text-align: left;
    }
    th {
      background:#D2691E;
      color:#FFF7E6;
    }
  </style>
</head>
<body>

<h2>Pengaturan Website</h2>
<form action="simpan_website.php" method="POST">
  <label>Nama Toko</label>
  <input type="text" name="nama_toko" required>
  
  <label>Slogan</label>
  <input type="text" name="slogan">
  
  <label>Kontak</label>
  <input type="text" name="kontak">
  
  <label>Alamat</label>
  <textarea name="alamat"></textarea>
  
  <button type="submit">Simpan</button>
</form>

<h2>Tambah Produk</h2>
<form action="simpan_produk.php" method="POST" enctype="multipart/form-data">
  <label>Nama Produk</label>
  <input type="text" name="nama_produk" required>
  
  <label>Deskripsi</label>
  <textarea name="deskripsi" required></textarea>
  
  <label>Harga</label>
  <input type="number" name="harga" required>
  
  <label>Gambar</label>
  <input type="file" name="gambar">
  
  <button type="submit">Simpan Produk</button>
</form>
<h2>Daftar Produk</h2>
<?php
$result = $conn->query("SELECT * FROM produk ORDER BY id DESC");

if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Tindakan</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nama_produk']."</td>
                <td>".$row['deskripsi']."</td>
                <td>Rp".number_format($row['harga'],0,',','.')."</td>
                <td><img src='".$row['gambar']."' width='60' style='border-radius:6px;border:1px solid #EAD7B0;'></td>
                <td style='text-align:center;'>
                  <a href='edit_produk.php?id=".$row['id']."' class='btn-link'>✏️ Edit</a>
                  <a href='hapus.php?id=".$row['id']."' class='btn-link' onclick=\"return confirm('Yakin ingin menghapus produk ini?')\">🗑️ Hapus</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Belum ada produk ditambahkan.</p>";
}
?>
<!-- Tombol menuju halaman toko -->
<a href="index.php" class="btn-link">🏬 Lihat Halaman Toko</a>

<!-- Tombol logout admin -->
<a href="logout.php" class="btn-link">🚪 Logout Admin</a>


<h2>Daftar Pesanan Customer</h2>
<?php
$sql = "SELECT p.id, p.nama_lengkap, p.telepon, p.email, p.alamat, p.lokasi, pr.nama_produk, 
               p.jumlah, p.ukuran, p.metode_pembayaran, p.tanggal_pesan, p.status
        FROM pemesanan p
        LEFT JOIN produk pr ON p.produk_id = pr.id
        ORDER BY p.tanggal_pesan DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Lokasi</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Metode</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nama_lengkap']."</td>
                <td>".$row['telepon']."</td>
                <td>".$row['email']."</td>
                <td>".$row['alamat']."</td>
                <td>".$row['lokasi']."</td>
                <td>".$row['nama_produk']."</td>
                <td>".$row['jumlah']."</td>
                <td>".$row['ukuran']."</td>
                <td>".$row['metode_pembayaran']."</td>
                <td>".$row['tanggal_pesan']."</td>
                <td><strong>".$row['status']."</strong></td>
                <td style='text-align:center;'>";
        if ($row['status'] != 'selesai') {
            echo "<a href='sudahi_pesanan.php?id=".$row['id']."' class='btn-link' onclick=\"return confirm('Sudahi pesanan ini?')\">✅ Sudahi</a>";
        } else {
            echo "✔️";
        }
        echo "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Belum ada pesanan masuk.</p>";
}
?>
</body>
</html>