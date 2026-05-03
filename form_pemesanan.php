<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pembelian - Toko Baju Edel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; background:#FFF7E6; color:#5D4037; padding:20px; }
    h2 { color:#3E2723; }
    form { background:#FFF8E5; padding:20px; border:1px solid #EAD7B0; border-radius:8px; max-width:600px; margin:auto; }
    label { display:block; margin-top:10px; font-weight:bold; }
    input, select, textarea { width:100%; padding:8px; margin-top:4px; border:1px solid #CCC; border-radius:4px; }
    .form-section { margin-bottom:20px; }
    .btn-group { display:flex; justify-content:space-between; margin-top:20px; }
    button { padding:10px 20px; border:none; border-radius:6px; cursor:pointer; }
    .btn-cancel { background:#8D6E63; color:#FFF7E6; }
    .btn-submit { background:#D2691E; color:#FFF7E6; }
  </style>
</head>
<body>

<h2>Form Pembelian</h2>
<form action="simpan_pesanan.php" method="POST">
  
  <div class="form-section">
    <h3>Detail Pembeli</h3>
    <label>Nama Lengkap</label>
    <input type="text" name="nama_lengkap" required>

    <label>No. Telepon</label>
    <input type="text" name="telepon" placeholder="+6281234567890" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Alamat Pengiriman</label>
    <textarea name="alamat" rows="3" required></textarea>
  </div>

  <div class="form-section">
    <h3>Detail Produk</h3>
    <label>Produk</label>
    <select name="produk_id" required>
      <option value="">-- Pilih produk --</option>
      <?php
      $produk = $conn->query("SELECT * FROM produk");
      while($row = $produk->fetch_assoc()):
      ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_produk']; ?></option>
      <?php endwhile; ?>
    </select>

    <label>Jumlah</label>
    <input type="number" name="jumlah" value="1" min="1" required>

    <label>Ukuran</label>
    <select name="ukuran" required>
      <option value="">-- Ukuran --</option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
    </select>
  </div>

  <div class="form-section">
    <h3>Pembayaran & Ringkasan</h3>
    <label>Metode Pembayaran</label>
    <select name="metode_pembayaran" required>
      <option value="">-- Pilih metode --</option>
      <option value="Transfer Bank">Transfer Bank</option>
      <option value="COD">Bayar di Tempat (COD)</option>
      <option value="E-Wallet">E-Wallet</option>
    </select>

    <label>
      <input type="checkbox" name="setuju" required>
      Saya setuju dengan syarat dan ketentuan
    </label>
  </div>

  <!-- isi form detail pembeli, produk, pembayaran -->
  <div class="btn-group">
    <button type="reset" class="btn-cancel">Batal</button>
    <button type="submit" class="btn-submit">Kirim Pesanan</button>
  </div>
</form>

</body>
</html>