<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_galon"; // Ganti dengan nama database yang digunakan

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_galon = $_POST['jenis_galon'];
$jumlah_galon = $_POST['jumlah_galon'];
$harga_per_galon = $_POST['harga_per_galon'];
$total_harga = $_POST['total_harga'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$catatan = $_POST['catatan'];

// Query untuk memasukkan data transaksi ke tabel
$sql = "INSERT INTO penjualan (nama_pelanggan, jenis_galon, jumlah_galon, harga_per_galon, total_harga, metode_pembayaran, catatan)
        VALUES ('$nama_pelanggan', '$jenis_galon', $jumlah_galon, $harga_per_galon, $total_harga, '$metode_pembayaran', '$catatan')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href = 'penjualan.php';
              </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>