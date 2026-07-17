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
// Pastikan Form Dikirim
// ===============================
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Ambil Data Form
    $nama_event    = trim(mysqli_real_escape_string($conn, $_POST['nama_event']));
    $jenis_event   = trim(mysqli_real_escape_string($conn, $_POST['jenis_event']));
    $tanggal       = trim(mysqli_real_escape_string($conn, $_POST['tanggal']));
    $lokasi        = trim(mysqli_real_escape_string($conn, $_POST['lokasi']));
    $penyelenggara = trim(mysqli_real_escape_string($conn, $_POST['penyelenggara']));
    $deskripsi     = trim(mysqli_real_escape_string($conn, $_POST['deskripsi']));

    // ===============================
    // Validasi Input
    // ===============================
    if (
        empty($nama_event) ||
        empty($jenis_event) ||
        empty($tanggal) ||
        empty($lokasi) ||
        empty($penyelenggara) ||
        empty($deskripsi)
    ) {

        echo "
        <script>
            alert('Semua data wajib diisi!');
            window.history.back();
        </script>
        ";
        exit();
    }

    // ===============================
    // Simpan ke Database
    // ===============================
    $sql = "INSERT INTO event
            (
                nama_event,
                jenis_event,
                tanggal,
                lokasi,
                penyelenggara,
                deskripsi
            )
            VALUES
            (
                '$nama_event',
                '$jenis_event',
                '$tanggal',
                '$lokasi',
                '$penyelenggara',
                '$deskripsi'
            )";

    if (mysqli_query($conn, $sql)) {

        echo "
        <script>
            alert('Data event berhasil disimpan.');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Data gagal disimpan!\\n" . mysqli_error($conn) . "');
            window.location='tambah.php';
        </script>
        ";

    }

} else {

    header("Location: tambah.php");
    exit();

}
?>