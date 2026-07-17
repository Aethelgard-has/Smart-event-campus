<?php
session_start();
include "../config/koneksi.php";

// Cek Login
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Tambah Event | Smart Event Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body style="background:#f4f6f9;">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h4 class="mb-0">

<i class="fa-solid fa-calendar-plus"></i>

Tambah Data Event

</h4>

</div>

<div class="card-body">

<form action="simpan.php" method="POST">

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
placeholder="Masukkan nama event"
required>

</div>

<!-- Jenis -->

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-layer-group text-primary"></i>

Jenis Event

</label>

<select
name="jenis_event"
class="form-select"
required>

<option value="">-- Pilih Jenis Event --</option>

<option value="Seminar">Seminar</option>

<option value="Workshop">Workshop</option>

<option value="Pelatihan">Pelatihan</option>

<option value="Lomba">Lomba</option>

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
placeholder="Contoh : Aula Universitas Potensi Utama"
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
placeholder="Contoh : BEM Fakultas Informatika"
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
placeholder="Masukkan deskripsi lengkap mengenai event..."
required></textarea>

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
name="simpan"
class="btn btn-success">

<i class="fa-solid fa-floppy-disk"></i>

Simpan Event

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