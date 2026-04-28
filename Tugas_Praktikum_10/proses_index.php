<?php
include 'koneksi.php';

$search_nama = $_GET['nama_item'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

if (!empty($search_nama)) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM item WHERE nama_item LIKE ?");
    $param = "%" . $search_nama . "%";
    $stmt->bind_param("s", $param);
} else {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM item");
}

$stmt->execute();
$stmt->bind_result($total_data);
$stmt->fetch();
$stmt->close();

$total_pages = ceil($total_data / $limit);

if (!empty($search_nama)) {
    $stmt = $conn->prepare("SELECT * FROM item WHERE nama_item LIKE ? LIMIT ? OFFSET ?");
    $stmt->bind_param("sii", $param, $limit, $offset);
} else {
    $stmt = $conn->prepare("SELECT * FROM item LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();
?>