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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p>want to create an account? <a href="register.php">Register here</a></p>
        <p>
            <?php
            if (isset($_SESSION['error'])) {
                echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";
                unset($_SESSION['error']);
            }
            ?>
        </p>

        <?php 
        if(isset($_POST["login"])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT username, password FROM admin WHERE username = '$username' AND password = sha1('$password');";
            $result = mysqli_query($conn, $sql);

            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $_SESSION['admin'] = $username;
                header('location: dashboard.php');
                exit();
            } else {
                $_SESSION['error'] = "Username / Password tidak sesuai";
                header('location: login.php');
                exit();
            }
        }
        ?>
    </form>
</div>
</body>
</html>
