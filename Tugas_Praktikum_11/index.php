<?php 
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'proses_index.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Daftar Item</title>
</head>

<body>

<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Daftar Item Game</h2>

    <form method="get" class="row g-3 mb-4">
        
        <div class="col-md-6">
            <label class="form-label">Cari Berdasarkan Nama Item</label>
            <input 
                type="text" 
                class="form-control"
                name="nama_item" 
                placeholder="Masukkan nama item"
                value="<?php echo htmlspecialchars($search_nama ?? ''); ?>">
        </div>

        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>

        <div class="col-md-2 align-self-end">
            <a href="index.php" class="btn btn-secondary">Reset</a>
        </div>

    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Item</th>
                <th>Game</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_item']; ?></td>
                    <td><?= htmlspecialchars($row['nama_item']); ?></td>
                    <td><?= htmlspecialchars($row['game']); ?></td>
                    <td>Rp<?= number_format($row['harga'], 0); ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
                        <a href="form_edit.php?id=<?= $row['id_item']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="proses_hapus.php?id=<?= $row['id_item']; ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <nav>
        <ul class="pagination">

            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="?page=<?= $page - 1 ?>&nama_item=<?= urlencode($search_nama ?? '') ?>">
                    Previous
                </a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" 
                       href="?page=<?= $i ?>&nama_item=<?= urlencode($search_nama ?? '') ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="?page=<?= $page + 1 ?>&nama_item=<?= urlencode($search_nama ?? '') ?>">
                    Next
                </a>
            </li>

        </ul>
    </nav>

</div>

</body>
</html>