<?php

session_start();

include "../config/koneksi.php";

// Ambil data dari form login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Cari user berdasarkan username
$query = "SELECT id, name, username, password, role 
          FROM users 
          WHERE username = ?";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

// Cek apakah username ditemukan
if (mysqli_num_rows($result) === 1) {

    $user = mysqli_fetch_assoc($result);

    // Cek password
    if (password_verify($password, $user['password'])) {

        // Simpan data user ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Arahkan berdasarkan role
        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
            exit;
        } else {
            header("Location: ../user/home.php");
            exit;
        }

    } else {
        echo "Password salah.";
    }

} else {
    echo "Username tidak ditemukan.";
}

?>