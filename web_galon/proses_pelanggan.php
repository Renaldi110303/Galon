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
$nama_lengkap = $_POST['nama_lengkap'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$jenis_pelanggan = $_POST['jenis_pelanggan'];
$tanggal_bergabung = $_POST['tanggal_bergabung'];

// Query untuk memasukkan data pelanggan ke tabel
$sql = "INSERT INTO pelanggan (nama_lengkap, nomor_telepon, alamat, jenis_pelanggan, tanggal_bergabung)
        VALUES ('$nama_lengkap', '$nomor_telepon', '$alamat', '$jenis_pelanggan', '$tanggal_bergabung')";

if ($conn->query($sql) === TRUE) {
    echo "Data pelanggan berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>