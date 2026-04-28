<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id        = $_POST['id'];
    $nama_item = $_POST['nama_item'];
    $game      = $_POST['game'];
    $rarity    = $_POST['rarity'];
    $harga     = $_POST['harga'];
    $stok      = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE item SET 
        nama_item = ?, 
        game = ?, 
        rarity = ?, 
        harga = ?, 
        stok = ? 
        WHERE id_item = ?");

    $stmt->bind_param("sssiii", $nama_item, $game, $rarity, $harga, $stok, $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil diperbarui');
            window.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memperbarui data: " . addslashes($stmt->error) . "');
            window.location='index.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>