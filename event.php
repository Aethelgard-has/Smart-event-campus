<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config/koneksi.php";

$cari = "";

if (isset($_GET['cari']) && $_GET['cari'] != "") {

    $cari = mysqli_real_escape_string($conn, $_GET['cari']);

    $query = mysqli_query($conn, "
        SELECT *
        FROM event
        WHERE nama_event LIKE '%$cari%'
        OR jenis_event LIKE '%$cari%'
        OR lokasi LIKE '%$cari%'
        OR penyelenggara LIKE '%$cari%'
        ORDER BY tanggal ASC
    ");

} else {

    $query = mysqli_query($conn, "
        SELECT *
        FROM event
        ORDER BY tanggal ASC
    ");
}

$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Event Kampus | Smart Event Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php include "assets/navbar.php"; ?>

<!-- HEADER -->

<section class="bg-primary text-white py-5">

<div class="container text-center">

<h1 class="fw-bold">

<i class="fa-solid fa-calendar-days me-2"></i>

Daftar Event Kampus

</h1>

<p class="mb-0">

Seminar, Workshop, Pelatihan, dan Lomba Universitas Potensi Utama

</p>

</div>

</section>

<!-- SEARCH -->

<div class="container py-4">

<form method="GET">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="input-group">

<input
type="text"
name="cari"
class="form-control"
placeholder="Cari nama event, jenis, lokasi atau penyelenggara..."
value="<?= htmlspecialchars($cari); ?>">

<button class="btn btn-primary" type="submit">

<i class="fa-solid fa-search"></i>

Cari

</button>

<a href="event.php" class="btn btn-secondary">

Reset

</a>

</div>

</div>

</div>

</form>

<div class="mt-3 text-center">

<strong><?= $total; ?></strong> Event ditemukan

</div>

</div>

<!-- LIST EVENT -->

<div class="container pb-5">

<div class="row">

<?php if($total > 0){ ?>

<?php while($data = mysqli_fetch_assoc($query)){ ?>

<div class="col-lg-4 col-md-6 mb-4">

<div class="card h-100 shadow border-0">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<span class="badge bg-primary">

<?= htmlspecialchars($data['jenis_event']); ?>

</span>

<small class="text-muted">

<?= date("d M Y", strtotime($data['tanggal'])); ?>

</small>

</div>

<h4 class="mt-3">

<?= htmlspecialchars($data['nama_event']); ?>

</h4>

<hr>

<p>

<i class="fa-solid fa-location-dot text-danger me-2"></i>

<?= htmlspecialchars($data['lokasi']); ?>

</p>

<p>

<i class="fa-solid fa-building text-primary me-2"></i>

<?= htmlspecialchars($data['penyelenggara']); ?>

</p>

<p class="text-muted">

<?= htmlspecialchars(mb_strimwidth($data['deskripsi'], 0, 120, "...")); ?>

</p>

<a href="detail.php?id=<?= $data['id_event']; ?>" class="btn btn-primary w-100">

<i class="fa-solid fa-circle-info me-1"></i>

Lihat Detail

</a>

</div>

</div>

</div>

<?php } ?>

<?php } else { ?>

<div class="col-12">

<div class="alert alert-warning text-center">

<i class="fa-solid fa-circle-exclamation me-2"></i>

Tidak ada event yang sesuai dengan pencarian.

</div>

</div>

<?php } ?>

</div>

</div>

<!-- FOOTER -->

<footer class="bg-primary text-white text-center py-4">

<div class="container">

<h5 class="fw-bold">

Smart Event Campus

</h5>

<p class="mb-1">

Universitas Potensi Utama

</p>

<small>

© 2026 Smart Event Campus. All Rights Reserved.

</small>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>