<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$message = '';

// Insert
if (isset($_POST['insert'])) {
    $kode_barang = mysqli_real_escape_string($conn, $_POST['kode_barang']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "INSERT INTO barang (kode_barang, nama, alamat) VALUES ('$kode_barang', '$nama', '$alamat')";
    if (mysqli_query($conn, $query)) {
        $message = "Data berhasil ditambahkan!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Update
if (isset($_POST['update'])) {
    $kode_barang = mysqli_real_escape_string($conn, $_POST['kode_barang']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "UPDATE barang SET nama='$nama', alamat='$alamat' WHERE kode_barang='$kode_barang'";
    if (mysqli_query($conn, $query)) {
        $message = "Data berhasil diperbarui!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Delete dari form
if (isset($_POST['delete'])) {
    $kode_barang = mysqli_real_escape_string($conn, $_POST['kode_barang']);
    $query = "DELETE FROM barang WHERE kode_barang='$kode_barang'";
    if (mysqli_query($conn, $query)) {
        $message = "Data berhasil dihapus!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// Fetch data
$result = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang - Data PBW Firdaus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Barang - Data PBW Firdaus</h2>
        <div class="logout-link">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        
        <!-- Form Insert/Update/Delete -->
        <form method="POST" action="">
            <label for="kode_barang">Kode Barang:</label>
            <input type="text" id="kode_barang" name="kode_barang" required placeholder="Masukkan kode barang">
            
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan nama barang">
            
            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required placeholder="Masukkan alamat"></textarea>
            
            <div class="button-group">
                <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
        </form>

        <!-- Table Data -->
        <table>
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['kode_barang']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>