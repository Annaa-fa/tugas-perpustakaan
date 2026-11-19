<?php
mysqli_report(MYSQLI_REPORT_OFF);

//parameter koneksi
$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

//membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

//memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal ".htmlspecialchars(mysqli_connect_error()));
}

//mengatur agar huruf dan simbol tersimpan dengan benar
mysqli_set_charset($koneksi, "utf8mb4");