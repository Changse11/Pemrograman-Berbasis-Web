<?php 
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Item</title>
</head>

<body>

<div class="container mt-4">
    <h2>Tambah Item Baru</h2>

    <form method="post" action="proses_tambah_item.php">

        <div class="mb-3">
            <label class="form-label">Nama Item</label>
            <input type="text" class="form-control" name="nama_item" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Game</label>
            <input type="text" class="form-control" name="game">
        </div>

        <div class="mb-3">
            <label class="form-label">Rarity</label>
            <input type="text" class="form-control" name="rarity">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Tambah Item
        </button>

    </form>
</div>

</body>
</html>