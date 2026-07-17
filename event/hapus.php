<?php
session_start();
include "../config/koneksi.php";

// ===============================
// Cek Login
// ===============================
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}

// ===============================
// Cek Parameter ID
// ===============================
if (!isset($_GET['id'])) {

    header("Location: index.php");
    exit();

}

$id_event = intval($_GET['id']);

// ===============================
// Cek Data Event
// ===============================
$cek = mysqli_query($conn, "SELECT * FROM event WHERE id_event = $id_event");

if (mysqli_num_rows($cek) == 0) {

    echo "
    <script>
        alert('Data event tidak ditemukan!');
        window.location='index.php';
    </script>
    ";

    exit();

}

// ===============================
// Hapus Data
// ===============================
$sql = "DELETE FROM event WHERE id_event = $id_event";

if (mysqli_query($conn, $sql)) {

    echo "
    <script>
        alert('Data event berhasil dihapus.');
        window.location='index.php';
    </script>
    ";

} else {

    echo "
    <script>
        alert('Data gagal dihapus!\\n" . mysqli_error($conn) . "');
        window.location='index.php';
    </script>
    ";

}

mysqli_close($conn);
?>