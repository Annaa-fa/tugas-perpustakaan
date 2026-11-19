<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        label.pilihan { display: inline; font-weight: normal; margin-right: 16px; }
        input[type="text"], select, textarea { width: 320px; padding: 6px; }
        button { margin-top: 16px; padding: 8px 20px; }
    </style>
</head>
<body>
    <h1>Form Anggota Perpustakaan</h1>

    <form method="POST" action="proses_anggota.php">
        <label for="no_anggota">Nomor Anggota : </label>
        <input type="text" id="no_anggota" name="no_anggota">

        <label for="nama_lengkap">Nama Lengkap : </label>
        <input type="text" id="nama_lengkap" name="nama_lengkap">

        <label for="email">Email : </label>
        <input type="text" id="email" name="email">

        <label for="no_hp">Nomor HP : </label>
        <input type="text" id="no_hp" name="no_hp">

        <label for="jenis_anggota">Jenis Anggota : </label>
        <select id="jenis_anggota" name="jenis_anggota">
        <option value="">-- Pilih Jenis Anggota --</option>
        <option value="Mahasiswa">Mahasiswa</option>
        <option value="Dosen">Dosen</option>
        <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
        </select>

        <label for="alamat">Alamat : </label>
        <textarea id="alamat" name="alamat" rows="4"></textarea>

        <button type="submit">Simpan</button>
    </form>

</body>
</html>