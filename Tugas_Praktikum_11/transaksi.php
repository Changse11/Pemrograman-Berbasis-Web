<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'koneksi.php';
include 'nav.php';

$stmt_user = $conn->prepare("SELECT id_user, username FROM user");
$stmt_user->execute();
$user_result = $stmt_user->get_result();

$stmt_item = $conn->prepare("SELECT id_item, nama_item FROM item");
$stmt_item->execute();
$item_result = $stmt_item->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Buat Transaksi</title>
</head>

<body>

<div class="container mt-4">
    <h2>Buat Transaksi Baru</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($_GET['message']) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="proses_transaksi.php">

        <div class="mb-3">
            <label class="form-label">Pilih User</label>
            <select class="form-select" name="id_user" required>
                <option value="">Pilih User</option>
                <?php while ($row = $user_result->fetch_assoc()): ?>
                    <option value="<?= $row['id_user'] ?>">
                        <?= htmlspecialchars($row['username']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <h4>Item</h4>

        <div class="mb-3">
            <label class="form-label">Pilih Item</label>
            <select class="form-select" name="item_id" required>
                <option value="">Pilih Item</option>
                <?php while ($row = $item_result->fetch_assoc()): ?>
                    <option value="<?= $row['id_item'] ?>">
                        <?= htmlspecialchars($row['nama_item']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Buat Transaksi
        </button>

    </form>
</div>

</body>
</html>