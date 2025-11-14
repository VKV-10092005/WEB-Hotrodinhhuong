<?php
require '../site.php';
load_top();
session_start();

if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$user = $_SESSION['user'];
$stmt = $conn->prepare("SELECT quyen FROM thongtinTK WHERE tendangnhap = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen);
$stmt->fetch();
$stmt->close();

if ($quyen !== 'admin') {
    echo "<p style='color:red;'>❌ Bạn không có quyền truy cập.</p>";
    exit;
}

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM lotrinh WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "<p style='color:green;'>✅ Đã xóa lộ trình có ID $id.</p>";
    $stmt->close();
}

echo "<p><a href='quanly_lotrinh.php'>⬅️ Quay lại danh sách</a></p>";
mysqli_close($conn);
load_footer();
load_bottom();
?>
