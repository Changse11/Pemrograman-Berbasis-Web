<?php
include 'koneksi.php';

$search_user = $_GET['username'] ?? '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$limit = 10;
$offset = ($page - 1) * $limit;

if (!empty($search_user)) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username LIKE ?");
    $param = "%" . $search_user . "%";
    $stmt->bind_param("s", $param);
} else {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user");
}

$stmt->execute();
$stmt->bind_result($total_data);
$stmt->fetch();
$stmt->close();

$total_pages = ceil($total_data / $limit);

if (!empty($search_user)) {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username LIKE ? LIMIT ? OFFSET ?");
    $stmt->bind_param("sii", $param, $limit, $offset);
} else {
    $stmt = $conn->prepare("SELECT * FROM user LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();
?>