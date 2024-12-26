<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_galon";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$periode = $_POST['periode'] ?? '';
$tanggal_awal = $_POST['tanggal_awal'] ?? '';
$tanggal_akhir = $_POST['tanggal_akhir'] ?? '';
$bulan = $_POST['bulan'] ?? '';
$tahun = $_POST['tahun'] ?? '';

// Validasi data (contoh sederhana)
if (empty($periode)) {
    echo "Periode harus dipilih.";
    exit;
}

// Jika ada kesalahan, tampilkan pesan kesalahan
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
} else {
    // Query untuk laporan berdasarkan periode yang dipilih
    if ($periode == 'Harian') {
        $sql = "SELECT * FROM penjualan WHERE DATE(tanggal) = '$tanggal_awal'";
    } elseif ($periode == 'Mingguan') {
        $sql = "SELECT * FROM penjualan WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    } elseif ($periode == 'Bulanan') {
        $sql = "SELECT * FROM penjualan WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Laporan Penjualan</h3>";
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Galon</th>
                <th>Jumlah Galon</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['tanggal'] . "</td>
                <td>" . $row['nama_pelanggan'] . "</td>
                <td>" . $row['jenis_galon'] . "</td>
                <td>" . $row['jumlah_galon'] . "</td>
                <td>" . $row['total_harga'] . "</td>
                <td>" . $row['metode_pembayaran'] . "</td>
            </tr>";
        }
        echo "</table>";
        // Tambahkan tombol Kembali dan Download PDF
        echo "<a href='dashboard.php' class='btn btn-primary'>Kembali</a>";
        echo "<button onclick='downloadPDF()'>Download PDF</button>";
    } else {
        echo "Tidak ada data penjualan untuk periode yang dipilih.";
    }
}

$conn->close();
?>