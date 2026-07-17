<?php
session_start();
include "config/koneksi.php";

// Jika bukan dari tombol login
if (!isset($_POST['login'])) {
    header("Location: login.php");
    exit();
}

// Mengambil data dari form
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Validasi input
if (empty($username) || empty($password)) {

    echo "<script>
            alert('Username dan Password wajib diisi!');
            window.location='login.php';
          </script>";
    exit();
}

// Mengamankan input
$username = mysqli_real_escape_string($conn, $username);

// Cari username
$query = mysqli_query($conn, "
    SELECT *
    FROM admin
    WHERE username='$username'
    LIMIT 1
");

if (mysqli_num_rows($query) == 1) {

    $admin = mysqli_fetch_assoc($query);

    /*
    =======================================
    LOGIN
    =======================================
    Jika password masih teks biasa
    */

    if ($password == $admin['password']) {

        $_SESSION['login'] = true;
        $_SESSION['id_admin'] = $admin['id_admin'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['nama_lengkap'] = $admin['nama_lengkap'];

        echo "<script>
                alert('Login berhasil. Selamat datang!');
                window.location='dashboard.php';
              </script>";

        exit();

    } else {

        echo "<script>
                alert('Password yang Anda masukkan salah!');
                window.location='login.php';
              </script>";

        exit();

    }

} else {

    echo "<script>
            alert('Username tidak ditemukan!');
            window.location='login.php';
          </script>";

    exit();

}
?>