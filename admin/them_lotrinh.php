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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nganh = $_POST['nganh'];
    $ngonngu = $_POST['ngonngu'];
    $tieude = $_POST['tieude'];

    $stmt = $conn->prepare("INSERT INTO lotrinh (nganh, ngonngu, tieude) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nganh, $ngonngu, $tieude);
    $stmt->execute();
    echo "<p style='color:green;'>✅ Đã thêm lộ trình mới.</p>";
    $stmt->close();
    echo "<p><a href='quanly_lotrinh.php'>⬅️ Quay lại quản lý lộ trình</a></p>";
    load_footer();
    load_bottom();
    exit;
}
?>

<h2>➕ Thêm Lộ trình</h2>
<form method="POST">
    <label>Ngành: <input type="text" name="nganh" required></label><br><br>
    <label>Ngôn ngữ: <input type="text" name="ngonngu" required></label><br><br>
    <label>Tiêu đề: <input type="text" name="tieude" required></label><br><br>
    <button type="submit">💾 Thêm mới</button>
</form>
<p><a href="quanly_lotrinh.php">⬅️ Quay lại danh sách</a></p>
<?php
mysqli_close($conn);
load_footer();
load_bottom();
?>
