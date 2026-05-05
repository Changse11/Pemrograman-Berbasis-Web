<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Ambil user berdasarkan username
    $stmt = $conn->prepare("
        SELECT id_user, username, password
        FROM user
        WHERE username = ?
    ");

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // Cek password (plaintext)
        if ($password === $user['password']) {

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['login_Un51k4'] = true;

            header("Location: index.php");
            exit;

        } else {
            header("Location: login.php?message=Password salah");
            exit;
        }

    } else {
        header("Location: login.php?message=User tidak ditemukan");
        exit;
    }

    $stmt->close();
}
?>