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
// Cek ID Event
// ===============================
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id_event = intval($_GET['id']);

$query = mysqli_query($conn, "SELECT * FROM event WHERE id_event = $id_event");

if (mysqli_num_rows($query) == 0) {

    echo "
    <script>
        alert('Data event tidak ditemukan!');
        window.location='index.php';
    </script>
    ";

    exit();
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit Event | Smart Event Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body style="background:#f4f6f9;">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0">

<div class="card-header bg-warning text-dark">

<h4 class="mb-0">

<i class="fa-solid fa-pen-to-square"></i>

Edit Data Event

</h4>

</div>

<div class="card-body">

<form action="update.php" method="POST">

<input
type="hidden"
name="id_event"
value="<?= $data['id_event']; ?>">

<!-- Nama Event -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-signature text-primary"></i>

Nama Event

</label>

<input
type="text"
name="nama_event"
class="form-control"
value="<?= htmlspecialchars($data['nama_event']); ?>"
required>

</div>

<!-- Jenis Event -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-layer-group text-primary"></i>

Jenis Event

</label>

<select
name="jenis_event"
class="form-select"
required>

<option value="Seminar" <?= ($data['jenis_event']=="Seminar")?"selected":""; ?>>
Seminar
</option>

<option value="Workshop" <?= ($data['jenis_event']=="Workshop")?"selected":""; ?>>
Workshop
</option>

<option value="Pelatihan" <?= ($data['jenis_event']=="Pelatihan")?"selected":""; ?>>
Pelatihan
</option>

<option value="Lomba" <?= ($data['jenis_event']=="Lomba")?"selected":""; ?>>
Lomba
</option>

</select>

</div>

<!-- Tanggal -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-calendar-days text-primary"></i>

Tanggal Event

</label>

<input
type="date"
name="tanggal"
class="form-control"
value="<?= $data['tanggal']; ?>"
required>

</div>

<!-- Lokasi -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-location-dot text-primary"></i>

Lokasi

</label>

<input
type="text"
name="lokasi"
class="form-control"
value="<?= htmlspecialchars($data['lokasi']); ?>"
required>

</div>

<!-- Penyelenggara -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-building text-primary"></i>

Penyelenggara

</label>

<input
type="text"
name="penyelenggara"
class="form-control"
value="<?= htmlspecialchars($data['penyelenggara']); ?>"
required>

</div>

<!-- Deskripsi -->

<div class="mb-4">

<label class="form-label">

<i class="fa-solid fa-file-lines text-primary"></i>

Deskripsi Event

</label>

<textarea
name="deskripsi"
class="form-control"
rows="5"
required><?= htmlspecialchars($data['deskripsi']); ?></textarea>

</div>

<!-- Tombol -->

<div class="d-flex justify-content-between">

<a href="index.php" class="btn btn-secondary">

<i class="fa-solid fa-arrow-left"></i>

Kembali

</a>

<div>

<button
type="reset"
class="btn btn-warning me-2">

<i class="fa-solid fa-rotate-left"></i>

Reset

</button>

<button
type="submit"
name="update"
class="btn btn-success">

<i class="fa-solid fa-floppy-disk"></i>

Update Data

</button>

</div>

</div>

</form>

</div>

<div class="card-footer text-center text-muted">

© 2026 Smart Event Campus | Universitas Potensi Utama

</div>

</div>

</div>

</div>

</div>

</body>

</html>