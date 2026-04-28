<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id       = $_POST['id'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($password)) {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE user SET 
            username = ?, 
            email = ?, 
            password = ?
            WHERE id_user = ?");

        $stmt->bind_param("sssi", $username, $email, $password_hash, $id);

    } else {
        $stmt = $conn->prepare("UPDATE user SET 
            username = ?, 
            email = ?
            WHERE id_user = ?");

        $stmt->bind_param("ssi", $username, $email, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
            alert('Data user berhasil diperbarui');
            window.location='user.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui user: " . addslashes($stmt->error) . "');
            window.location='user.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>