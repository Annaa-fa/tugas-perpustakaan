<?php
require_once "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Proses Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            color: #1f3864;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        label.pilihan {
            display: inline;
            font-weight: normal;
            margin-right: 16px;
        }

        input[type="text"], select, textarea {
            width: 320px;
            padding: 6px;
        }

        button {
            margin-top: 16px;
            padding: 8px 20px;
        }
    </style>
</head>
<body>
    <?php

    $no_anggota = $nama_lengkap = $email = $no_hp = $jenis_anggota = $alamat = "";
    $err_no_anggota = $err_nama_lengkap = $err_email = $err_no_hp = $err_jenis_anggota = $err_alamat = "";
    $valid = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $no_anggota = isset($_POST["no_anggota"]) ? trim($_POST["no_anggota"]) : "";
        $nama_lengkap = isset($_POST["nama_lengkap"]) ? trim($_POST["nama_lengkap"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $no_hp = isset($_POST["no_hp"]) ? trim($_POST["no_hp"]) : "";
        $jenis_anggota = isset($_POST["jenis_anggota"]) ? trim($_POST["jenis_anggota"]) : "";
        $alamat = isset($_POST["alamat"]) ? trim($_POST["alamat"]) : "";

       if (empty($no_anggota)) {
            $err_no_anggota = "Nomor anggota tidak boleh kosong";
        }

        if (empty($nama_lengkap)) {
            $err_nama_lengkap = "Nama lengkap tidak boleh kosong";
        }

        if (empty($email)) {
            $err_email = "Email tidak boleh kosong";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err_email = "Format email tidak valid";
        }

        if (empty($no_hp)) {
            $err_no_hp = "Nomor HP tidak boleh kosong";
        } else if (!ctype_digit($no_hp)) {
            $err_no_hp = "Nomor HP hanya boleh berisi angka";
        }

        if (empty($jenis_anggota)) {
            $err_jenis_anggota = "Jenis anggota wajib dipilih";
        }

        if (empty($alamat)) {
            $err_alamat = "Alamat tidak boleh kosong";
        }

        if (empty($err_no_anggota) && empty($err_nama_lengkap) && empty($err_email) && empty($err_no_hp) && empty($err_jenis_anggota) && empty($err_alamat)) {
            $valid = true;
        }

        if ($valid) {
            $sql = "INSERT INTO anggota (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($koneksi, $sql);

            mysqli_stmt_bind_param($stmt, "ssssss", $no_anggota, $nama_lengkap, $email, $no_hp, $jenis_anggota, $alamat);

            if (mysqli_stmt_execute($stmt)) {
                echo "<h1>Data Anggota Berhasil Disimpan</h1>";
                echo "No Anggota : " . htmlspecialchars($no_anggota) . "<br>";
                echo "Nama Lengkap : " . htmlspecialchars($nama_lengkap) . "<br>";
                echo "Email : " . htmlspecialchars($email) . "<br>";
                echo "No HP : " . htmlspecialchars($no_hp) . "<br>";
                echo "Jenis Anggota : " . htmlspecialchars($jenis_anggota) . "<br>";
                echo "Alamat : " . htmlspecialchars($alamat) . "<br>";
            } else {
                echo "Gagal menyimpan ke database: " . mysqli_error($koneksi);
            }

            mysqli_stmt_close($stmt);

        } else {
            echo "<h3>Data Gagal Disimpan:</h3>";

            if (!empty($err_no_anggota)) echo "- $err_no_anggota <br>";
            if (!empty($err_nama_lengkap)) echo "- $err_nama_lengkap <br>";
            if (!empty($err_email)) echo "- $err_email <br>";
            if (!empty($err_no_hp)) echo "- $err_no_hp <br>";
            if (!empty($err_jenis_anggota)) echo "- $err_jenis_anggota <br>";
            if (!empty($err_alamat)) echo "- $err_alamat <br>";
        }

        echo '<br><a href="form_anggota.php">Kembali ke form</a>';
    }
?>
</body>
</html>