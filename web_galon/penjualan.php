<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Transaksi</title>
    <script>
        function hitungTotalHarga() {
            var hargaPerGalon = parseFloat(document.getElementById("harga_per_galon").value);
            var jumlahGalon = parseInt(document.getElementById("jumlah_galon").value);
            if (!isNaN(hargaPerGalon) && !isNaN(jumlahGalon)) {
                var totalHarga = hargaPerGalon * jumlahGalon;
                document.getElementById("total_harga").value = totalHarga.toFixed(2);
            }
        }
    </script>
</head>
<body>
    <h2>Form Manajemen Transaksi</h2>
    <form action="proses_penjualan.php" method="POST">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required><br><br>

        <label for="jenis_galon">Jenis Galon:</label>
        <select id="jenis_galon" name="jenis_galon" onchange="updateHargaGalon()" required>
            <option value="Isi ulang">Isi ulang</option>
            <option value="Baru">Baru</option>
        </select><br><br>

        <label for="jumlah_galon">Jumlah Galon:</label>
        <input type="number" id="jumlah_galon" name="jumlah_galon" min="1" required oninput="hitungTotalHarga()"><br><br>

        <label for="harga_per_galon">Harga per Galon:</label>
        <input type="number" id="harga_per_galon" name="harga_per_galon" required readonly><br><br>

        <label for="total_harga">Total Harga:</label>
        <input type="text" id="total_harga" name="total_harga" readonly><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <select id="metode_pembayaran" name="metode_pembayaran" required>
            <option value="Tunai">Tunai</option>
            <option value="Transfer">Transfer</option>
        </select><br><br>

        <label for="catatan">Catatan Tambahan:</label>
        <textarea id="catatan" name="catatan"></textarea><br><br>

        <input type="submit" value="Proses Transaksi">
        <a href="dashboard.php" class="btn btn-primary">Kembali</a>

    </form>

    <script>
        // Fungsi untuk mengupdate harga per galon berdasarkan jenis galon
        function updateHargaGalon() {
            var jenisGalon = document.getElementById("jenis_galon").value;
            var hargaGalon = (jenisGalon === "Isi ulang") ? 5000 : 10000; // Harga per galon (Isi ulang: 5000, Baru: 10000)
            document.getElementById("harga_per_galon").value = hargaGalon;
            hitungTotalHarga(); // Update total harga setelah harga galon berubah
        }

        // Inisialisasi harga per galon saat halaman dimuat
        window.onload = updateHargaGalon;
    </script>
</body>
</html>