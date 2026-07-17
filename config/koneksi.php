<?php

$host     = "sql306.infinityfree.com";
$username = "if0_42092528";
$password = "OnicEvos8";
$database = "if0_42092528_smart_event";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengatur charset UTF-8
mysqli_set_charset($conn, "utf8");

?>