<?php
session_start();
if (!isset($_SESSION['user'])) exit("⚠️ Vui lòng đăng nhập");

$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$id = $_GET['id'] ?? null;
$id_lotrinh = $_GET['id_lotrinh'] ?? null;

if ($id) {
    $stmt = $conn->prepare("DELETE FROM noidung_lotrinh WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    echo "<p style='color:green;'>🗑️ Đã xóa nội dung.</p>";
}

echo "<a href='chitiet_lotrinh.php?id=$id_lotrinh'>⬅️ Quay lại</a>";
?>
