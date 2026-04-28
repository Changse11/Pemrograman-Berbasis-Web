<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        echo "<script>
            alert('User berhasil ditambahkan!');
            window.location.href = 'tambah_user.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan user: " . addslashes($stmt->error) . "');
            window.location.href = 'tambah_user.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>