<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: event.php");
    exit();
}

$id = (int) $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM event WHERE id_event='$id'");

if (mysqli_num_rows($query) == 0) {
    die("Data event tidak ditemukan.");
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= htmlspecialchars($data['nama_event']); ?> | Smart Event Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="index.php">

<i class="fa-solid fa-graduation-cap me-2"></i>

Smart Event Campus

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a class="nav-link" href="index.php">

<i class="fa-solid fa-house me-1"></i>

Beranda

</a>

</li>

<li class="nav-item">

<a class="nav-link active" href="event.php">

<i class="fa-solid fa-calendar-days me-1"></i>

Event

</a>

</li>

<li class="nav-item">

<a class="nav-link" href="tentang.php">

<i class="fa-solid fa-circle-info me-1"></i>

Tentang

</a>

</li>

<li class="nav-item ms-lg-3">

<a href="login.php" class="btn btn-warning fw-bold">

<i class="fa-solid fa-user-lock me-1"></i>

Login Admin

</a>

</li>

</ul>

</div>

</div>

</nav>

<!-- ================= HEADER ================= -->

<section class="bg-primary text-white py-5">

<div class="container text-center">

<h1 class="fw-bold">

<?= htmlspecialchars($data['nama_event']); ?>

</h1>

<p>

Informasi lengkap kegiatan Smart Event Campus Universitas Potensi Utama

</p>

</div>

</section>

<!-- ================= DETAIL ================= -->

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="card shadow border-0">

<div class="card-body p-5">

<div class="text-center mb-4">

<span class="badge bg-success fs-6 px-4 py-2">

<?= htmlspecialchars($data['jenis_event']); ?>

</span>

</div>

<div class="row">

<div class="col-md-6 mb-4">

<h6 class="text-primary">

<i class="fa-solid fa-calendar-days me-2"></i>

Tanggal

</h6>

<p>

<?= date('d F Y', strtotime($data['tanggal'])); ?>

</p>

</div>

<div class="col-md-6 mb-4">

<h6 class="text-primary">

<i class="fa-solid fa-location-dot me-2"></i>

Lokasi

</h6>

<p>

<?= htmlspecialchars($data['lokasi']); ?>

</p>

</div>

<div class="col-md-6 mb-4">

<h6 class="text-primary">

<i class="fa-solid fa-building me-2"></i>

Penyelenggara

</h6>

<p>

<?= htmlspecialchars($data['penyelenggara']); ?>

</p>

</div>

<div class="col-md-6 mb-4">

<h6 class="text-primary">

<i class="fa-solid fa-users me-2"></i>

Peserta

</h6>

<p>

Mahasiswa Universitas Potensi Utama

</p>

</div>

</div>

<hr>

<h4 class="text-primary">

Deskripsi Event

</h4>

<p class="mt-3" style="text-align:justify; line-height:30px;">

<?= nl2br(htmlspecialchars($data['deskripsi'])); ?>

</p>

<hr>

<div class="d-flex justify-content-between">

<a href="event.php" class="btn btn-secondary">

<i class="fa-solid fa-arrow-left me-2"></i>

Kembali

</a>

<a href="event.php" class="btn btn-primary">

<i class="fa-solid fa-calendar-days me-2"></i>

Lihat Event Lainnya

</a>

</div>

</div>

</div>

</div>

</div>

</div>

<!-- ================= FOOTER ================= -->

<footer class="bg-primary text-white text-center py-4 mt-5">

<h5>

Smart Event Campus

</h5>

<p class="mb-1">

Universitas Potensi Utama

</p>

<small>

© 2026 Smart Event Campus. All Rights Reserved.

</small>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>