<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu bro."));
    exit;
}
include 'koneksi.php';
include 'nav.php';

$id = $_GET['id'] ?? 0;

$stmt = $conn->prepare("SELECT * FROM user WHERE id_user = ?");
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
    <title>Edit User</title>
</head>

<body>

<div class="container mt-4">
    <h2>Edit Data User</h2>

    <form method="post" action="proses_edit_user.php">

        <input type="hidden" name="id" value="<?= $row['id_user'] ?>">

        <div class="mb-3">
            <label class="form-label">Username</label>
            <input 
                type="text" 
                class="form-control"
                name="username" 
                value="<?= htmlspecialchars($row['username'] ?? '') ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                class="form-control"
                name="email" 
                value="<?= htmlspecialchars($row['email'] ?? '') ?>" 
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Password (opsional)</label>
            <input 
                type="password" 
                class="form-control"
                name="password" 
                placeholder="Kosongkan jika tidak ingin mengubah password"
            >
        </div>

        <button type="submit" class="btn btn-success">
            Simpan Perubahan
        </button>

        <a href="user.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

</body>
</html>