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
$data_admin = mysqli_query($conn,"SELECT * FROM admin");
$data_pelanggan = mysqli_query($conn,"SELECT * FROM pelanggan");
$data_penjualan = mysqli_query($conn,"SELECT * FROM penjualan");
$data_transaksi = mysqli_query($conn,"SELECT * FROM transaksi");
 
// menghitung data barang
$jumlah_admin = mysqli_num_rows($data_admin);
$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
$jumlah_penjualan = mysqli_num_rows($data_penjualan);
$jumlah_transaksi = mysqli_num_rows($data_transaksi);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
    <style>

    .main {
        display: flex;
    }
   
    .content {
    width: 1500px;
    padding: 20px;
        
    }
    .content a {
        display: block;
    padding: 10px;
    text-decoration: none;
    color: black;
    margin-bottom: 10px;
    }
    
    .header {
    margin-bottom: 20px;
    }
    .header h1 {
        margin: 0;
        font-size: 24px;
    
    }
    
    .cards {
    display: flex;
    gap: 20px;
    }

    .card {
        flex: 1;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0 0 10px rgba(12, 12, 12, 0.1);
        text-align: center;
    }

    .card h2 {
        margin: 0;
        font-size: 18px;
        font-weight: normal;
    }

    .card p {
        font-size: 24px;
        margin: 10px 0 0 0;
    }
    </style>
</head>
    <body>
        <main class="main">
            <div class="content">
                <div class="header">
                    <h1>SELAMAT DATANG</h1>
                </div>    
                    <div class="cards">
                        <div class="card">
                            <h2>Pelanggan</h2>
                            <p><?php echo $jumlah_pelanggan; ?></p>
                            <a href="#">Show-></a>
                        </div>
                        <div class="card">
                            <h2>Penjualan</h2>
                            <p><?php echo $jumlah_penjualan; ?></p>
                            <a href="#">Show-></a>
                        </div>
                        <div class="card">
                            <h2>Transaksi</h2>
                            <p><?php echo $jumlah_transaksi; ?></p>
                            <a href="#">Show-></a>
                        </div>
                    </div>
            </div>
        </main>
    </body>
</html>