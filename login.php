<?php
session_start();

// Validasi login jika data telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lakukan validasi username dan password di sini
    // Contoh sederhana: jika username dan password sesuai, set session dan redirect ke halaman utama
    if ($_POST["username"] == "jek" && $_POST["password"] == "123") {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $_POST["username"]; // Set the username session variable
        header("Location: index.php"); // Ganti dengan nama file halaman utama Anda
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <!-- Tampilkan pesan kesalahan jika ada -->
        <?php if(isset($error_message)) { ?>
            <p><?php echo $error_message; ?></p>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
