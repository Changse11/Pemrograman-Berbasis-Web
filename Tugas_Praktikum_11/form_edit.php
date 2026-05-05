<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'koneksi.php';
include 'nav.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM item WHERE id_item = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Item</title>
</head>

<body>

<div class="container mt-4">
    <h2>Edit Data Item</h2>

    <form method="post" action="proses_edit.php">

        <input type="hidden" name="id" value="<?= $row['id_item'] ?>">

        <div class="mb-3">
            <label class="form-label">Nama Item</label>
            <input 
                type="text" 
                class="form-control"
                name="nama_item" 
                value="<?= htmlspecialchars($row['nama_item'] ?? '') ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Game</label>
            <input 
                type="text" 
                class="form-control"
                name="game" 
                value="<?= htmlspecialchars($row['game'] ?? '') ?>"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Rarity</label>
            <input 
                type="text" 
                class="form-control"
                name="rarity" 
                value="<?= htmlspecialchars($row['rarity'] ?? '') ?>"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input 
                type="number" 
                class="form-control"
                name="harga" 
                value="<?= $row['harga'] ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input 
                type="number" 
                class="form-control"
                name="stok" 
                value="<?= $row['stok'] ?>" 
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Perubahan
        </button>

    </form>
</div>

</body>
</html>