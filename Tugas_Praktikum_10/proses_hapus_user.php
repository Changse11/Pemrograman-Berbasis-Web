<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM transaksi WHERE id_user = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($jumlah);
    $stmt->fetch();
    $stmt->close();

    if ($jumlah > 0) {
        echo "<script>
            alert('User tidak bisa dihapus karena sudah memiliki transaksi');
            window.location='user.php';
        </script>";
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM user WHERE id_user = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('User berhasil dihapus');
            window.location='user.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus user: " . addslashes($stmt->error) . "');
            window.location='user.php';
        </script>";
    }

    $stmt->close();

} else {
    echo "<script>
        alert('ID tidak valid');
        window.location='user.php';
    </script>";
}

$conn->close();
?>