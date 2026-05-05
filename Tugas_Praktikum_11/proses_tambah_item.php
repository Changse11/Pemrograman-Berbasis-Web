<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_item = $_POST['nama_item'];
    $game      = $_POST['game'];
    $rarity    = $_POST['rarity'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO item (nama_item, game, rarity, harga, stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $nama_item, $game, $rarity, $harga, $stok);

    if ($stmt->execute()) {
        echo "<script>
            alert('Item berhasil ditambahkan!');
            window.location.href = 'tambah_item.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambahkan item: " . addslashes($stmt->error) . "');
            window.location.href = 'tambah_item.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>