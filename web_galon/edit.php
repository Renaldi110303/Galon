<?php
include 'menu.php';
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

// Ambil data berdasarkan ID
$query = "SELECT * FROM $table WHERE id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $columns = array_keys($data); // Dapatkan nama kolom
    $update_values = [];

    foreach ($columns as $col) {
        if ($col != 'id') {
            $update_values[] = "$col = '" . $_POST[$col] . "'";
        }
    }

    $update_query = "UPDATE $table SET " . implode(', ', $update_values) . " WHERE id = $id";

    if ($conn->query($update_query)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form method="POST">
        <?php
        foreach ($data as $key => $value) {
            if ($key != 'id') {
                echo "<label for='$key'>$key</label><br>";
                echo "<input type='text' name='$key' value='$value'><br><br>";
            }
        }
        ?>
        <button type="submit">Simpan</button>
        <a href="dashboard.php">Kembali</a>
    </form>
</body>
</html>
