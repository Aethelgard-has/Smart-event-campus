<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

include "config/koneksi.php";

/* ===========================
   STATISTIK
=========================== */

$total_event = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM event"))['total'];

$total_seminar = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM event WHERE jenis_event='Seminar'"))['total'];

$total_workshop = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM event WHERE jenis_event='Workshop'"))['total'];

$total_lomba = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM event WHERE jenis_event='Lomba'"))['total'];

$total_pelatihan = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM event WHERE jenis_event='Pelatihan'"))['total'];

$event_terbaru = mysqli_query($conn,"
SELECT *
FROM event
ORDER BY tanggal DESC
LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Administrator</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<!-- ===========================
     NAVBAR
=========================== -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

<div class="container">

<a class="navbar-brand fw-bold" href="dashboard.php">

<i class="fa-solid fa-graduation-cap me-2"></i>

Smart Event Campus

</a>

<div class="d-flex align-items-center">

<span class="text-white me-3">

Halo,

<b><?= htmlspecialchars($_SESSION['username']); ?></b>

</span>

<a href="logout.php"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin logout?')">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</div>

</nav>

<!-- ===========================
     CONTENT
=========================== -->

<div class="container py-5">

<h2 class="fw-bold text-primary">

Dashboard Administrator

</h2>

<p class="text-muted">

Selamat datang di Sistem Informasi Smart Event Campus
Universitas Potensi Utama.

</p>

<!-- ===========================
     STATISTIK
=========================== -->

<div class="row g-4 mb-5">

<div class="col-md-6 col-lg">

<div class="card stat-card text-center">

<div class="card-body">

<i class="fa-solid fa-calendar-days fa-3x text-primary mb-3"></i>

<h2><?= $total_event; ?></h2>

<p>Total Event</p>

</div>

</div>

</div>

<div class="col-md-6 col-lg">

<div class="card stat-card text-center">

<div class="card-body">

<i class="fa-solid fa-users fa-3x text-success mb-3"></i>

<h2><?= $total_seminar; ?></h2>

<p>Seminar</p>

</div>

</div>

</div>

<div class="col-md-6 col-lg">

<div class="card stat-card text-center">

<div class="card-body">

<i class="fa-solid fa-laptop fa-3x text-warning mb-3"></i>

<h2><?= $total_workshop; ?></h2>

<p>Workshop</p>

</div>

</div>

</div>

<div class="col-md-6 col-lg">

<div class="card stat-card text-center">

<div class="card-body">

<i class="fa-solid fa-trophy fa-3x text-danger mb-3"></i>

<h2><?= $total_lomba; ?></h2>

<p>Lomba</p>

</div>

</div>

</div>

<div class="col-md-6 col-lg">

<div class="card stat-card text-center">

<div class="card-body">

<i class="fa-solid fa-chalkboard-user fa-3x text-info mb-3"></i>

<h2><?= $total_pelatihan; ?></h2>

<p>Pelatihan</p>

</div>

</div>

</div>

</div>

<!-- ===========================
     KONTEN
=========================== -->

<div class="row">

<div class="col-lg-8">

<div class="card shadow border-0 mb-4">

<div class="card-header bg-primary text-white">

<i class="fa-solid fa-chart-line me-2"></i>

Dashboard

</div>

<div class="card-body">

<h4>Selamat Datang Administrator</h4>

<p>

Melalui dashboard ini Administrator dapat mengelola seluruh data kegiatan Smart Event Campus Universitas Potensi Utama.

</p>

<ul>

<li>Menambah Data Event</li>

<li>Mengubah Data Event</li>

<li>Menghapus Data Event</li>

<li>Melihat Daftar Event</li>

<li>Mengelola Informasi Kampus</li>

</ul>

</div>

</div>

<div class="card shadow border-0">

<div class="card-header bg-success text-white">

<i class="fa-solid fa-clock-rotate-left me-2"></i>

5 Event Terbaru

</div>

<div class="table-responsive">

<table class="table table-hover mb-0">

<thead>

<tr>

<th>No</th>

<th>Nama Event</th>

<th>Tanggal</th>

<th>Jenis</th>

</tr>

</thead>

<tbody>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($event_terbaru)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($row['nama_event']); ?></td>

<td><?= date("d-m-Y", strtotime($row['tanggal'])); ?></td>

<td><?= htmlspecialchars($row['jenis_event']); ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

<!-- ===========================
     MENU KANAN
=========================== -->

<div class="col-lg-4">

<div class="card shadow border-0 mb-4">

<div class="card-header bg-success text-white">

Menu Cepat

</div>

<div class="card-body d-grid gap-3">

<a href="event/index.php" class="btn btn-primary">

<i class="fa-solid fa-calendar-plus me-2"></i>

Kelola Data Event

</a>

<a href="index.php" class="btn btn-success">

<i class="fa-solid fa-globe me-2"></i>

Lihat Website

</a>

<a href="logout.php"
class="btn btn-danger"
onclick="return confirm('Yakin ingin logout?')">

<i class="fa-solid fa-right-from-bracket me-2"></i>

Logout

</a>

</div>

</div>

<div class="card shadow border-0">

<div class="card-header bg-warning">

Informasi Administrator

</div>

<div class="card-body">

<p><strong>Username</strong></p>

<p><?= htmlspecialchars($_SESSION['username']); ?></p>

<hr>

<p>

Anda login sebagai Administrator Smart Event Campus Universitas Potensi Utama.

</p>

</div>

</div>

</div>

</div>

<footer class="text-center mt-5">

<hr>

<p class="text-muted">

© 2026 Smart Event Campus<br>
Universitas Potensi Utama

</p>

</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>