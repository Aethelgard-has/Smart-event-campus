<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit();
}

include "../config/koneksi.php";

$query = mysqli_query($conn, "SELECT * FROM event ORDER BY tanggal DESC");

$total = mysqli_num_rows($query);

function tanggalIndonesia($tanggal)
{
    $bulan = array(
        1 => "Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember"
    );

    $pecah = explode("-", $tanggal);

    return $pecah[2]." ".$bulan[(int)$pecah[1]]." ".$pecah[0];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Kelola Data Event</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold text-primary">

<i class="fa-solid fa-calendar-days"></i>

Kelola Data Event

</h2>

<p class="text-muted">

Total Event :
<strong><?= $total; ?></strong>

</p>

</div>

<div>

<a href="../dashboard.php" class="btn btn-secondary">

<i class="fa-solid fa-arrow-left"></i>

Dashboard

</a>

<a href="tambah.php" class="btn btn-primary">

<i class="fa-solid fa-plus"></i>

Tambah Event

</a>

</div>

</div>

<div class="card shadow border-0">

<div class="card-header bg-primary text-white">

<h5 class="mb-0">

<i class="fa-solid fa-list"></i>

Daftar Event Kampus

</h5>

</div>

<div class="card-body">

<?php if($total>0){ ?>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle">

<thead class="table-primary text-center">

<tr>

<th width="5%">No</th>

<th>Nama Event</th>

<th>Jenis Event</th>

<th>Tanggal</th>

<th>Lokasi</th>

<th>Penyelenggara</th>

<th width="22%">Aksi</th>

</tr>

</thead>

<tbody>

<?php
$no=1;

while($data=mysqli_fetch_assoc($query)){

switch($data['jenis_event']){

case "Seminar":
$badge="primary";
break;

case "Workshop":
$badge="success";
break;

case "Pelatihan":
$badge="warning";
break;

case "Lomba":
$badge="danger";
break;

default:
$badge="secondary";
}
?>

<tr>

<td class="text-center"><?= $no++; ?></td>

<td>

<strong><?= htmlspecialchars($data['nama_event']); ?></strong>

</td>

<td class="text-center">

<span class="badge bg-<?= $badge; ?>">

<?= htmlspecialchars($data['jenis_event']); ?>

</span>

</td>

<td>

<?= tanggalIndonesia($data['tanggal']); ?>

</td>

<td>

<?= htmlspecialchars($data['lokasi']); ?>

</td>

<td>

<?= htmlspecialchars($data['penyelenggara']); ?>

</td>

<td class="text-center">

<a href="../detail.php?id=<?= $data['id_event']; ?>" class="btn btn-info btn-sm text-white">

<i class="fa-solid fa-eye"></i>

</a>

<a href="edit.php?id=<?= $data['id_event']; ?>" class="btn btn-warning btn-sm">

<i class="fa-solid fa-pen"></i>

</a>

<a href="hapus.php?id=<?= $data['id_event']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Yakin ingin menghapus event ini?')">

<i class="fa-solid fa-trash"></i>

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php }else{ ?>

<div class="alert alert-warning text-center">

<i class="fa-solid fa-circle-exclamation"></i>

Belum ada data event.

</div>

<?php } ?>

</div>

</div>

<div class="text-center mt-4 text-muted">

© 2026 Smart Event Campus | Universitas Potensi Utama

</div>

</div>

</body>

</html>