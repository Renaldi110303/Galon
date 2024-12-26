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

$table = $_GET['table'];
$id = $_GET['id'];

// Hapus data berdasarkan ID
$query = "DELETE FROM $table WHERE id = $id";

if ($conn->query($query)) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
