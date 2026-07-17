<?php
session_start();
include "../config/koneksi.php";

// Cek login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}

// Cek apakah form dikirim
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Ambil data
    $id_event      = intval($_POST['id_event']);
    $nama_event    = trim(mysqli_real_escape_string($conn, $_POST['nama_event']));
    $jenis_event   = trim(mysqli_real_escape_string($conn, $_POST['jenis_event']));
    $tanggal       = trim(mysqli_real_escape_string($conn, $_POST['tanggal']));
    $lokasi        = trim(mysqli_real_escape_string($conn, $_POST['lokasi']));
    $penyelenggara = trim(mysqli_real_escape_string($conn, $_POST['penyelenggara']));
    $deskripsi     = trim(mysqli_real_escape_string($conn, $_POST['deskripsi']));

    // Validasi
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

    // Query Update
    $sql = "UPDATE event SET
                nama_event = '$nama_event',
                jenis_event = '$jenis_event',
                tanggal = '$tanggal',
                lokasi = '$lokasi',
                penyelenggara = '$penyelenggara',
                deskripsi = '$deskripsi'
            WHERE id_event = $id_event";

    if (mysqli_query($conn, $sql)) {

        echo "
        <script>
            alert('Data event berhasil diperbarui.');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Gagal memperbarui data!\\n" . mysqli_error($conn) . "');
            window.location='edit.php?id=$id_event';
        </script>
        ";

    }

} else {

    header("Location: index.php");
    exit();

}
?>