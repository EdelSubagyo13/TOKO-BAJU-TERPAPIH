// checkout.js

document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("formPesanan");
  const ringkasan = document.getElementById("ringkasan");

  form.addEventListener("submit", function(event) {
    event.preventDefault();

    // Ambil nilai input
    const nama = document.getElementById("nama").value.trim();
    const produk = document.getElementById("produk").value;
    const jumlah = document.getElementById("jumlah").value;
    const alamat = document.getElementById("alamat").value.trim();

    // Validasi sederhana
    if (!nama || !produk || !jumlah || !alamat) {
      alert("Harap isi semua data pemesanan!");
      return;
    }

    // Hitung total harga (contoh harga statis)
    let harga = 0;
    if (produk === "Kaos Polos Premium") harga = 100000;
    if (produk === "Baju Batik Modern") harga = 250000;
    const total = harga * parseInt(jumlah);

    // Tampilkan ringkasan pesanan
    ringkasan.style.display = "block";
    ringkasan.innerHTML = `
      <h3>Ringkasan Checkout</h3>
      <p><strong>Nama:</strong> ${nama}</p>
      <p><strong>Produk:</strong> ${produk}</p>
      <p><strong>Jumlah:</strong> ${jumlah}</p>
      <p><strong>Alamat:</strong> ${alamat}</p>
      <p><strong>Total Harga:</strong> Rp ${total.toLocaleString("id-ID")}</p>
      <p style="color:green;font-weight:bold;">Pesanan berhasil dibuat!</p>
    `;

    // Reset form
    form.reset();
  });
});