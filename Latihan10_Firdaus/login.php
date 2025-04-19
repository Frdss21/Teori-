<?php
session_start();
include 'config.php';

// Jika ada sesi aktif, arahkan ke barang.php
if (isset($_SESSION['username'])) {
    header("Location: barang.php");
    exit();
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cancel'])) {
        $message = "Login dibatalkan!";
    } elseif (isset($_POST['oke'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

        // Simpan username dan password ke tabel users
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $query)) {
            $_SESSION['username'] = $username; // Simpan username ke sesi
            header("Location: barang.php"); // Arahkan ke halaman barang
            exit();
        } else {
            $message = "Error menyimpan data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Data PBW Firdaus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login - Data PBW Firdaus</h2>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required placeholder="Masukkan username">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Masukkan password">
            
            <div class="button-group">
                <button type="submit" name="oke" class="btn btn-primary">Oke</button>
                <button type="submit" name="cancel" class="btn btn-cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>
</html>