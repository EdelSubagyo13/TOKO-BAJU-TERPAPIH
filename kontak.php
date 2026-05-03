<?php
// kontak.php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak Admin - Toko Baju Edel</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { background:#FFF7E6; color:#5D4037; font-family:Verdana, Arial, sans-serif; margin:0; }
    header { background:#8D6E63; color:#FFF7E6; padding:12px; text-align:center; }
    h1 { margin:0; }
    .kontak-box {
      background:#FFF8E5;
      border:1px solid #EAD7B0;
      border-radius:8px;
      box-shadow:0 2px 6px rgba(0,0,0,0.12);
      max-width:500px;
      margin:30px auto;
      padding:20px;
      text-align:left;
    }
    .kontak-box h2 { color:#3E2723; margin-top:0; }
    .kontak-item { margin:10px 0; font-size:16px; }
    .kontak-item span { font-weight:bold; color:#3E2723; }
    footer { background:#8D6E63; color:#FFF7E6; text-align:center; padding:15px; margin-top:30px; }
    footer a { color:#FFF7E6; text-decoration:none; font-weight:bold; }
    footer a:hover { text-decoration:underline; }
  </style>
</head>
<body>

<header>
  <h1>📞 Kontak Admin Toko Baju Edel</h1>
</header>

<div class="kontak-box">
  <h2>Informasi Kontak</h2>
  <div class="kontak-item"><span>Email:</span> edelsubagyo11@gmail.com</div>
  <div class="kontak-item"><span>No HP:</span> 0812345678911</div>
  <div class="kontak-item"><span>Alamat:</span> Jln Jalan Aja 12, Candi, Jawa Timur</div>
</div>

<footer>
  <p>&copy; <?php echo date("Y"); ?> Toko Baju Edel — Semua Hak Dilindungi</p>
  <p><a href="index.php">🏬 Kembali ke Halaman Toko</a></p>
</footer>

</body>
</html>