<?php
session_start();

// Periksa apakah pengguna ingin logout
if(isset($_GET["logout"]) && $_GET["logout"] == true) {
    // Hapus semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Periksa apakah pengguna telah login atau belum
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Mendapatkan nama pengguna yang saat ini login
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dzaky</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<nav class="navbar">
    <span class="navbar-brand">Novel Inventory</span>
    <button id="toggleSidebar">Akun</button>
</nav>


<div class="container">
    <div class="sidebar">
        <p>Selamat datang, <?php echo $username; ?></p>
        <a href="?logout=true">Logout</a>
    </div>
    <div class="content">
        <h2><center>DAFTAR NOVEL</center></h2>
        <table class="my-table">
            <thead>
                <tr class="table-primary">           
                    <th>No</th>
                    <th>Judul Novel</th>
                    <th>Genre</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Sinopsis</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>judul 1</td>
                    <td>genre 1</td>
                    <td>tahun 1</td>
                    <td>jumlah halaman 1</td>
                    <td>sinopsis 1</td>
                    <td class="UD">
                        <button class="update">Update</button>
                        <button class="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>judul 2</td>
                    <td>genre 2</td>
                    <td>tahun 2</td>
                    <td>jumlah halaman 2</td>
                    <td>sinopsis 2</td>
                    <td class="UD">
                        <button class="update">Update</button>
                        <button class="delete">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button class="tambah">Tambah Data</button>
    </div>
</div>
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
    });
</script>
</body>
</html>
