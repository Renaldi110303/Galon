<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pelanggan</title>
</head>
<body>
    <h2>Form Manajemen Pelanggan</h2>
    <form action="proses_pelanggan.php" method="POST">
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" required><br><br>

        <label for="nomor_telepon">Nomor Telepon:</label>
        <input type="number" id="nomor_telepon" name="nomor_telepon" required><br><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required></textarea><br><br>

        <label for="jenis_pelanggan">Jenis Pelanggan:</label>
        <select id="jenis_pelanggan" name="jenis_pelanggan" required>
            <option value="Baru">Baru</option>
            <option value="Langganan">Langganan</option>
        </select><br><br>

        <label for="tanggal_bergabung">Tanggal Bergabung:</label>
        <input type="date" id="tanggal_bergabung" name="tanggal_bergabung" value="<?php echo date('Y-m-d'); ?>" required><br><br>

        <input type="submit" value="Simpan">
        
        <a href="dashboard.php" class="btn btn-primary">Kembali</a>
    </form>
</body>
</html>
