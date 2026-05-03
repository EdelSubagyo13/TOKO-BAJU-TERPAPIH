<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM produk WHERE id=$id");
$produk = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk - Toko Baju Edel</title>
  <style>
    body { font-family:Verdana; background:#FFF7E6; color:#5D4037; padding:20px; }
    form { background:#FFF8E5; padding:20px; border:1px solid #EAD7B0; border-radius:8px; max-width:600px; margin:auto; }
    label { display:block; margin-top:10px; font-weight:bold; }
    input, textarea { width:100%; padding:8px; margin-top:4px; border:1px solid #CCC; border-radius:6px; }
    button { margin-top:15px; padding:10px 20px; background:#D2691E; color:#FFF7E6; border:none; border-radius:6px; cursor:pointer; font-weight:bold; }
    button:hover { background:#8D6E63; }
  </style>
</head>
<body>

<h2>Edit Produk</h2>
<form action="update_produk.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $produk['id']; ?>">

  <label>Nama Produk</label>
  <input type="text" name="nama_produk" value="<?php echo $produk['nama_produk']; ?>" required>

  <label>Deskripsi</label>
  <textarea name="deskripsi" required><?php echo $produk['deskripsi']; ?></textarea>

  <label>Harga</label>
  <input type="number" name="harga" value="<?php echo $produk['harga']; ?>" required>

  <label>Gambar (kosongkan jika tidak ingin mengubah)</label>
  <input type="file" name="gambar">

  <button type="submit">Simpan Perubahan</button>
</form>

</body>
</html>