<?php
include 'koneksi.php';

// Ambil data website dari tabel website_info (baris pertama id=1)
$info = $conn->query("SELECT * FROM website_info WHERE id=1")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title><?php echo $info['nama_toko']; ?> — <?php echo $info['slogan']; ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>

body { background:#FFF7E6; color:#5D4037; font-family:Verdana, Arial, sans-serif; margin:0; }
header { background:#8D6E63; color:#FFF7E6; padding:12px; display:flex; justify-content:space-between; align-items:center; position:relative; }
.brand {
  display: flex;
  align-items: center;
  gap: 20px; 
}

.site-logo {
  height: 200px;   
  width: auto;
  display: block;
}

.brand-title {
  font-size: 30px;      
  font-weight: 700;
  color: var(--vanilla-soft);
  margin: 0;
  line-height: 1; 
}


h1 { margin:0; }
nav ul { list-style:none; display:flex; gap:20px; padding:0; margin:0; }
nav a { text-decoration:none; color:#5D4037; font-weight:bold; }
.produk-list { list-style:none; padding:0; }
.produk-item { background:#FFF8E5; border:1px solid #EAD7B0; margin-bottom:10px; padding:10px;
                   box-shadow:0 2px 6px rgba(0,0,0,0.12); display:flex; align-items:center; gap:12px; }
table { width:100%; border-collapse:collapse; margin-top:20px; box-shadow:0 2px 6px rgba(0,0,0,0.12); }
th, td { border:1px solid #EAD7B0; padding:10px; }
th { background:#8D6E63; color:#FFF7E6; }
td img { border-radius:6px; border:1px solid #EAD7B0; margin-right:8px; vertical-align:middle; }
.btn-pesan { text-decoration:none; color:#FFF7E6; background:#D2691E; padding:6px 10px; border-radius:6px; }
   
.cart-area {
  display: flex;
  align-items: center;
  gap: 12px; 
}

.burger {
  font-size: 22px;
  cursor: pointer;
  background: transparent;
  border: none;
  color: var(--vanilla-soft);
}

.login-link {
  text-decoration: none;
  color: var(--vanilla-soft);
  font-weight: bold;
  background: var(--brown-dark);
  padding: 6px 12px;
  border-radius: 6px;
}

.login-link:hover {
  background: var(--brown-medium);
}
    footer { background:#8D6E63; color:#FFF7E6; text-align:center; padding:15px; margin-top:30px; }
    footer a { color:#FFF7E6; text-decoration:none; font-weight:bold; }
    footer a:hover { text-decoration:underline; }
  </style>
  <script>
    function toggleMenu() {
      var menu = document.getElementById("burgerMenu");
      menu.style.display = (menu.style.display === "block") ? "none" : "block";
    }
  </script>
</head>
<body>

<header class="site-header">
  <div class="header-inner">
    <!-- Brand: logo + teks -->
    <div class="brand">
      <img src="terpapih.jpeg" alt="Logo TERPAPIH" class="site-logo">
      <div class="brand-title">
        <h1><?php echo $info['nama_toko']; ?></h1>
        <p class="tagline"><?php echo $info['slogan']; ?></p>
      </div>
    </div>
</header>

    <!-- Keranjang + burger menu -->
    <div class="cart-area">
      <span>MENU</span>
      <button class="burger" onclick="toggleMenu()">☰</button>
      <div id="burgerMenu" class="menu">
        <a href="login.php" class="login-link">Login Admin</a>
      </div>
    </div>
  </div>




<nav>
  <ul>
    <li><a href="#ORDER">Pemesanan</a></li>
    <li><a href="kontak.php">Kontak</a></li>
  </ul>
</nav>

<main>
  <section>
    <h2>DAFTAR PRODUK</h2>
    <ul class="produk-list">
      <?php
      $result = $conn->query("SELECT * FROM produk");
      while($row = $result->fetch_assoc()):
      ?>
      <li class="produk-item">
        <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>" width="110" height="110">
        <div>
          <h3><?php echo $row['nama_produk']; ?></h3>
        </div>
      </li>
      <?php endwhile; ?>
    </ul>
  </section>

  <section>
    <h3 id="ORDER">PEMESANAN PRODUK - <?php echo $info['nama_toko']; ?></h3>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Deskripsi</th>
          <th>Harga</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM produk");
        while($row = $result->fetch_assoc()):
        ?>
        <tr style="background:linear-gradient(#FFF8E5,#FFF3D6);">
          <td><?php echo $no++; ?></td>
          <td>
            <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>" width="48" height="48"
                 style="vertical-align:middle;border-radius:6px;border:1px solid #EAD7B0;margin-right:8px;">
            <strong><?php echo $row['nama_produk']; ?></strong>
          </td>
          <td style="color:#6b544b;"><?php echo $row['deskripsi']; ?></td>
          <td style="text-align:right;"><strong>Rp<?php echo number_format($row['harga'],0,',','.'); ?></strong></td>
          <td style="text-align:center;">
            <a href="form_pemesanan.php?id=<?php echo $row['id']; ?>" class="btn-pesan">Pesan</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>
</main>

<footer>
  <p>&copy; <?php echo date("Y"); ?> <?php echo $info['nama_toko']; ?> — Semua Hak Dilindungi</p>
  <p>📍 <?php echo $info['alamat']; ?> | 📞 <?php echo $info['kontak']; ?></p>
  <p><a href="kontak.php">Hubungi Kami</a></p>
</footer>

</body>
</html>