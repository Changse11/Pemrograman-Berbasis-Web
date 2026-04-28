<?php include 'proses_user.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Data User</title>
</head>

<body>

<?php include 'nav.php'; ?>

<div class="container mt-4">
    <h2>Data User</h2>

    <a href="tambah_user.php" class="btn btn-primary mb-3">
        Tambah User
    </a>

    <form method="get" class="row g-3 mb-4">
        
        <div class="col-md-6">
            <label class="form-label">Cari Username</label>
            <input 
                type="text" 
                class="form-control"
                name="username" 
                placeholder="Masukkan username"
                value="<?php echo htmlspecialchars($search_user ?? ''); ?>">
        </div>

        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary">
                Cari
            </button>
        </div>

        <div class="col-md-2 align-self-end">
            <a href="user.php" class="btn btn-secondary">
                Reset
            </a>
        </div>

    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id_user']; ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="form_edit_user.php?id=<?= $row['id_user']; ?>" class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="proses_hapus_user.php?id=<?= $row['id_user']; ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">
                        Data user tidak ditemukan
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="?page=<?= $page - 1 ?>&username=<?= urlencode($search_user ?? '') ?>">
                    Previous
                </a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" 
                       href="?page=<?= $i ?>&username=<?= urlencode($search_user ?? '') ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                <a class="page-link" 
                   href="?page=<?= $page + 1 ?>&username=<?= urlencode($search_user ?? '') ?>">
                    Next
                </a>
            </li>

        </ul>
    </nav>

</div>

</body>
</html>