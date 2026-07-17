<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Smart Event Campus</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php include "assets/navbar.php"; ?>

<!-- ================= HERO ================= -->

<section class="hero">

<div class="container">

<div class="row align-items-center" style="min-height:90vh;">

<div class="col-lg-7 text-white">

<h1 class="display-3 fw-bold">

SMART EVENT CAMPUS

</h1>

<p class="lead mt-4">

Selamat datang di <strong>Smart Event Campus</strong>,
website resmi Universitas Potensi Utama yang
menyediakan informasi kegiatan akademik dan
kemahasiswaan seperti seminar, workshop,
pelatihan, lomba, dan berbagai event kampus lainnya.

</p>

<div class="mt-4">

<a href="event.php" class="btn btn-warning btn-lg me-3">

<i class="fa-solid fa-calendar-days"></i>

Lihat Event

</a>

<a href="tentang.php" class="btn btn-outline-light btn-lg">

<i class="fa-solid fa-circle-info"></i>

Tentang Kami

</a>

</div>

</div>

</div>

</div>

</section>

<?php
include "config/koneksi.php";

$event = mysqli_query($conn,"
SELECT *
FROM event
ORDER BY tanggal ASC
LIMIT 3
");
?>

<section class="py-5 bg-light">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Event Terbaru

</h2>

<p>

Kegiatan terbaru Universitas Potensi Utama.

</p>

</div>

<div class="row">

<?php while($e=mysqli_fetch_assoc($event)){ ?>

<div class="col-lg-4">

<div class="card shadow h-100">

<div class="card-body">

<span class="badge bg-primary">

<?= htmlspecialchars($e['jenis_event']) ?>

</span>

<h4 class="mt-3">

<?= htmlspecialchars($e['nama_event']) ?>

</h4>

<hr>

<p>

<i class="fa-solid fa-calendar"></i>

<?= date("d F Y",strtotime($e['tanggal'])) ?>

</p>

<p>

<i class="fa-solid fa-location-dot"></i>

<?= htmlspecialchars($e['lokasi']) ?>

</p>

<a href="detail.php?id=<?=$e['id_event']?>"

class="btn btn-primary w-100">

Lihat Detail

</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

</section>

<!-- ================= FITUR ================= -->

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Layanan Smart Event Campus

</h2>

<p>

Menyediakan informasi kegiatan kampus secara cepat dan mudah.

</p>

</div>

<div class="row">

<div class="col-md-4">

<div class="card shadow h-100 text-center">

<div class="card-body">

<i class="fa-solid fa-calendar-check fa-4x text-primary mb-4"></i>

<h4>Informasi Event</h4>

<p>

Melihat informasi seminar, workshop, pelatihan,
dan lomba mahasiswa.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow h-100 text-center">

<div class="card-body">

<i class="fa-solid fa-bullhorn fa-4x text-success mb-4"></i>

<h4>Pengumuman</h4>

<p>

Memberikan informasi kegiatan terbaru yang
diselenggarakan oleh Universitas Potensi Utama.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow h-100 text-center">

<div class="card-body">

<i class="fa-solid fa-users fa-4x text-danger mb-4"></i>

<h4>Mahasiswa</h4>

<p>

Memudahkan mahasiswa memperoleh informasi
kegiatan kampus secara online.

</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================= STATISTIK ================= -->
<section class="bg-light py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">
        Universitas Potensi Utama dalam Angka
      </h2>
      <p>
        Data berdasarkan informasi resmi Universitas Potensi Utama tahun 2026.
      </p>
    </div>

    <div class="row text-center">
      <div class="col-md-3 mb-4">
        <i class="fa-solid fa-user-graduate fa-3x text-primary mb-3"></i>
        <h1 class="fw-bold text-primary">
          6.000+
        </h1>
        <h5>Mahasiswa Aktif</h5>
      </div>

      <div class="col-md-3 mb-4">
        <i class="fa-solid fa-building-columns fa-3x text-success mb-3"></i>
        <h1 class="fw-bold text-success">
          6
        </h1>
        <h5>Fakultas</h5>
      </div>

      <div class="col-md-3 mb-4">
        <i class="fa-solid fa-book-open fa-3x text-warning mb-3"></i>
        <h1 class="fw-bold text-warning">
          16
        </h1>
        <h5>Program Studi</h5>
      </div>

      <div class="col-md-3 mb-4">
        <i class="fa-solid fa-chalkboard-user fa-3x text-danger mb-3"></i>
        <h1 class="fw-bold text-danger">
          170+
        </h1>
        <h5>Tenaga Pengajar</h5>
      </div>
    </div>
  </div>
</section>

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="text-primary fw-bold">

Mengapa Smart Event Campus?

</h2>

</div>

<div class="row">

<div class="col-md-3 text-center">

<i class="fa-solid fa-clock fa-4x text-primary mb-3"></i>

<h5>Informasi Cepat</h5>

<p>Update kegiatan kampus secara realtime.</p>

</div>

<div class="col-md-3 text-center">

<i class="fa-solid fa-mobile-screen-button fa-4x text-success mb-3"></i>

<h5>Mudah Diakses</h5>

<p>Dapat dibuka melalui laptop maupun smartphone.</p>

</div>

<div class="col-md-3 text-center">

<i class="fa-solid fa-shield-halved fa-4x text-warning mb-3"></i>

<h5>Aman</h5>

<p>Data dikelola langsung oleh Administrator Kampus.</p>

</div>

<div class="col-md-3 text-center">

<i class="fa-solid fa-users fa-4x text-danger mb-3"></i>

<h5>Terintegrasi</h5>

<p>Semua informasi kegiatan berada dalam satu sistem.</p>

</div>

</div>

</div>

</section>

<!-- ================= KEUNGGULAN ================= -->

<section class="bg-light py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Keunggulan Smart Event Campus

</h2>

<p>

Sistem informasi yang dirancang untuk memudahkan mahasiswa memperoleh informasi kegiatan kampus.

</p>

</div>

<div class="row text-center">

<div class="col-md-3 mb-4">

<i class="fa-solid fa-calendar-check fa-4x text-primary mb-3"></i>

<h5>Event Lengkap</h5>

<p>

Seminar, Workshop, Pelatihan dan Lomba tersedia dalam satu sistem.

</p>

</div>

<div class="col-md-3 mb-4">

<i class="fa-solid fa-bolt fa-4x text-warning mb-3"></i>

<h5>Informasi Cepat</h5>

<p>

Informasi kegiatan selalu diperbarui oleh administrator kampus.

</p>

</div>

<div class="col-md-3 mb-4">

<i class="fa-solid fa-laptop fa-4x text-success mb-3"></i>

<h5>Akses Online</h5>

<p>

Dapat diakses kapan saja melalui komputer maupun smartphone.

</p>

</div>

<div class="col-md-3 mb-4">

<i class="fa-solid fa-user-shield fa-4x text-danger mb-3"></i>

<h5>Terpercaya</h5>

<p>

Semua data dikelola langsung oleh Universitas Potensi Utama.

</p>

</div>

</div>

</div>

</section>

<!-- ================= TESTIMONI ================= -->
<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="fw-bold text-primary">

Testimoni Mahasiswa

</h2>

</div>

<div class="row">

<div class="col-md-4">

<div class="card shadow h-100">

<div class="card-body">

★★★★★

<p>

"Website ini sangat membantu saya mengetahui jadwal seminar."

</p>

<b>- Mahasiswa Informatika</b>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow h-100">

<div class="card-body">

★★★★★

<p>

"Informasi lomba menjadi lebih mudah ditemukan."

</p>

<b>- Mahasiswa Sistem Informasi</b>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow h-100">

<div class="card-body">

★★★★★

<p>

"Tampilannya modern dan mudah digunakan."

</p>

<b>- Mahasiswa Teknik Komputer</b>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- ================= CTA ================= -->

<section class="py-5 text-center">

<div class="container">

<h2 class="fw-bold text-primary">

Jangan Lewatkan Event Terbaru!

</h2>

<p>

Temukan berbagai seminar, workshop, pelatihan,
dan lomba yang diselenggarakan Universitas Potensi Utama.

</p>

<a href="event.php" class="btn btn-primary btn-lg">

<i class="fa-solid fa-arrow-right"></i>

Lihat Semua Event

</a>

</div>

</section>

<!--=========== FOOTER ============-->
<footer class="bg-primary text-white pt-5 pb-3">

<div class="container">

<div class="row">

<div class="col-md-4">

<h4>Smart Event Campus</h4>

<p>

Website informasi kegiatan Universitas Potensi Utama.

</p>

</div>

<div class="col-md-4">

<h4>Kontak</h4>

<p>

<i class="fa-solid fa-location-dot"></i>

Jl. KL Yos Sudarso KM. 6,5 Medan

</p>

<p>

<i class="fa-solid fa-phone"></i>

(061) 6640525

</p>

<p>

<i class="fa-solid fa-envelope"></i>

info@potensi-utama.ac.id

</p>

</div>

<div class="col-md-4">

<h4>Media Sosial</h4>

<p>

<i class="fab fa-facebook"></i> Universitas Potensi Utama

</p>

<p>

<i class="fab fa-instagram"></i> @potensiutama

</p>

<p>

<i class="fab fa-youtube"></i> Universitas Potensi Utama

</p>

</div>

</div>

<hr>

<div class="text-center">

© 2026 Smart Event Campus - Universitas Potensi Utama

</div>

</div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>