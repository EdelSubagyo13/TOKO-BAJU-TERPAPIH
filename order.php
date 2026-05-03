<?php
// Aktifkan error reporting untuk debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if(isset($_POST['submit'])){
    // Ambil data dari form
    $nama      = trim($_POST['nama']);
    $email     = trim($_POST['email']);
    $alamat    = trim($_POST['alamat']);
    $produk_id = intval($_POST['produk_id']);
    $jumlah    = intval($_POST['jumlah']);

    // Simpan ke database
    $sql = "INSERT INTO pesanan (nama_pemesan, email, alamat, produk_id, jumlah) 
            VALUES ('$nama','$email','$alamat','$produk_id','$jumlah')";
    
    if(mysqli_query($conn, $sql)){
        // Ambil ID pesanan terakhir
        $pesanan_id = mysqli_insert_id($conn);

        // Ambil nama produk untuk ditampilkan
        $nama_produk = "Produk tidak ditemukan";
        $produk = mysqli_query($conn, "SELECT nama_produk FROM produk WHERE id='$produk_id'");
        if($produk && mysqli_num_rows($produk) > 0){
            $rowProduk = mysqli_fetch_assoc($produk);
            $nama_produk = $rowProduk['nama_produk'];
        }

        // Tampilkan detail pesanan
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <title>Konfirmasi Pesanan</title>
            <style>
                body { font-family: Verdana, Arial, sans-serif; background:#FFF7E6; color:#5D4037; padding:20px; }
                h2 { color:#3E2723; }
                .box { background:#FFF8E5; border:1px solid #EAD7B0; padding:20px; border-radius:8px; max-width:600px; }
                p { margin:8px 0; }
            </style>
        </head>
        <body>
            <div class='box'>
                <h2>Pesanan Berhasil Disubmit!</h2>
                <p><strong>No. Pesanan:</strong> $pesanan_id</p>
                <p><strong>Nama:</strong> $nama</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Alamat:</strong> $alamat</p>
                <p><strong>Produk:</strong> $nama_produk</p>
                <p><strong>Jumlah:</strong> $jumlah</p>
                <p><em>Terima kasih sudah memesan di Toko Baju Edel!</em></p>
                <a href='index.php'>⬅️ Kembali ke Halaman Toko</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Error saat menyimpan pesanan: " . mysqli_error($conn);
    }
} else {
    echo "Form tidak valid.";
}
?>