<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = $conn->query("SELECT * FROM admin WHERE username='$username'");
  $admin = $result->fetch_assoc();

  if ($admin && $password == $admin['password']) {
    $_SESSION['admin'] = $admin['username'];
    header("Location: dashboard.php");
    exit();
  } else {
    echo "<div class='error'>Login gagal! Username atau password salah.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin - Toko Baju Edel</title>
  <style>
    body {
      font-family: Verdana, Arial, sans-serif;
      background:#FFF7E6;
      color:#5D4037;
      display:flex;
      justify-content:center;
      align-items:center;
      height:100vh;
    }
    .login-box {
      background:#FFF8E5;
      border:1px solid #EAD7B0;
      padding:30px;
      border-radius:8px;
      box-shadow:0 2px 6px rgba(0,0,0,0.12);
      width:300px;
      text-align:center;
    }
    h2 {
      color:#3E2723;
      margin-bottom:20px;
    }
    input {
      width:100%;
      padding:10px;
      margin:8px 0;
      border:1px solid #CCC;
      border-radius:6px;
    }
    button {
      width:100%;
      padding:10px;
      background:#D2691E;
      color:#FFF7E6;
      border:none;
      border-radius:6px;
      cursor:pointer;
      font-weight:bold;
    }
    button:hover {
      background:#8D6E63;
    }
    .error {
      color:red;
      margin-top:10px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Admin</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
   <!-- Tombol kembali ke halaman toko -->
    <a href="index.php" class="btn-link">⬅️ Kembali ke Toko</a>
  
  </div>
</body>
</html>