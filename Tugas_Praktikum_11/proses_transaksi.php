<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn->begin_transaction();

    try {
        $id_user = $_POST['id_user'];
        $item_id = $_POST['item_id'];
        $jumlah  = $_POST['jumlah'];
        $tanggal = date('Y-m-d');
        $total_harga = 0;

        $stmt = $conn->prepare("SELECT harga, stok FROM item WHERE id_item = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $stmt->bind_result($harga, $stok);
        $stmt->fetch();
        $stmt->close();

        if ($stok < $jumlah) {
            throw new Exception("Stok tidak cukup.");
        }

        $subtotal = $harga * $jumlah;
        $total_harga = $subtotal;

        $stmt = $conn->prepare("INSERT INTO transaksi (id_user, tanggal, total_harga) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $id_user, $tanggal, $total_harga);
        $stmt->execute();

        $id_transaksi = $conn->insert_id;

        $stmt = $conn->prepare("INSERT INTO detail_transaksi (id_transaksi, id_item, jumlah, subtotal) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiii", $id_transaksi, $item_id, $jumlah, $subtotal);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE item SET stok = stok - ? WHERE id_item = ?");
        $stmt->bind_param("ii", $jumlah, $item_id);
        $stmt->execute();

        $conn->commit();

        header("Location: transaksi.php?message=" . urlencode("Transaksi berhasil dibuat"));
        exit;

    } catch (Exception $e) {

        $conn->rollback();

        header("Location: transaksi.php?message=" . urlencode("Gagal: " . $e->getMessage()));
        exit;
    }
}
?>