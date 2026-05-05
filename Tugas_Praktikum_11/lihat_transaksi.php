<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'koneksi.php';

$stmt = $conn->prepare("
    SELECT 
        t.id_transaksi,
        u.username,
        t.tanggal,
        t.total_harga
    FROM transaksi t
    JOIN user u ON t.id_user = u.id_user
    ORDER BY t.id_transaksi DESC
");

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Transaksi</title>
</head>

<body>

<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Daftar Transaksi</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>User</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id_transaksi'] ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>Rp<?= number_format($row['total_harga'], 0) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>