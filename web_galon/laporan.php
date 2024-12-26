<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <script>
        function hideElement(id) {
            document.getElementById(id).style.display = 'none';
        }
        function toggleDateFields() {
            var periode = document.querySelector('input[name="periode"]:checked').value;
            var tanggalAwal = document.getElementById("tanggal_awal");
            var tanggalAkhir = document.getElementById("tanggal_akhir");
            var bulan = document.getElementById("bulan");
            var tahun = document.getElementById("tahun");

            if (periode === "Harian" || periode === "Mingguan") {
                tanggalAwal.disabled = false;
                tanggalAkhir.disabled = false;
                bulan.disabled = true;
                tahun.disabled = true;
            } else if (periode === "Bulanan") {
                tanggalAwal.disabled = true;
                tanggalAkhir.disabled = true;
                bulan.disabled = false;
                tahun.disabled = false;
            }
        }
        function downloadPDF() {
        // Konversi tabel menjadi HTML
        var table = document.querySelector("table");
        var html = table.outerHTML;

        // Buat elemen a untuk mengunduh
        var element = document.createElement('a');
        var file = new Blob([html], {type: 'application/pdf'});
        element.href = URL.createObjectURL(file);
        element.download = 'laporan_penjualan.pdf';
        document.body.appendChild(element);
        element.click();
    }
    </script>
</head>
<body>
    <h2>Form Laporan Penjualan</h2>
    <form action="laporan_penjualan.php" method="POST">
        <label>Pilih Periode:</label><br>
        <input type="radio" id="harian" name="periode" value="Harian" onclick="toggleDateFields()" checked>
        <label for="harian">Harian</label>
        <input type="radio" id="mingguan" name="periode" value="Mingguan" onclick="toggleDateFields()">
        <label for="mingguan">Mingguan</label>
        <input type="radio" id="bulanan" name="periode" value="Bulanan" onclick="toggleDateFields()">
        <label for="bulanan">Bulanan</label><br><br>

        <label for="tanggal_awal">Tanggal Awal:</label>
        <input type="date" id="tanggal_awal" name="tanggal_awal" required><br><br>

        <label for="tanggal_akhir">Tanggal Akhir:</label>
        <input type="date" id="tanggal_akhir" name="tanggal_akhir" required><br><br>

        <label for="bulan">Bulan:</label>
        <select id="bulan" name="bulan" disabled>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
        </select><br><br>

        <label for="tahun">Tahun:</label>
        <select id="tahun" name="tahun" disabled>
            <?php
                $currentYear = date('Y');
                for ($year = $currentYear; $year >= 2000; $year--) {
                    echo "<option value='$year'>$year</option>";
                }
            ?>
        </select><br><br>

        <input type="submit" value="Tampilkan Laporan">
        <a href="dashboard.php" class="btn btn-primary">Kembali</a>
    </form>

    <script>
       
        window.onload = toggleDateFields;
    </script>
</body>
</html>
