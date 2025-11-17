<?php
require '../site.php';
load_top();
session_start();

// Kiểm tra đăng nhập và quyền admin
if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$user = $_SESSION['user'];
$sql = "SELECT quyen FROM thongtinTK WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen);
$stmt->fetch();
$stmt->close();

if ($quyen !== 'admin') {
    echo "<p style='color:red;'>❌ Bạn không có quyền truy cập.</p>";
    exit;
}

// Lấy ID lộ trình cần thêm nội dung
$id_lotrinh = $_GET['id'] ?? null;
if (!$id_lotrinh) {
    echo "<p>❌ Không có ID lộ trình.</p>";
    exit;
}

// Xử lý khi gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuan = $_POST['tuan'];
    $ngay = $_POST['ngay'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];

    $stmt = $conn->prepare("INSERT INTO noidung_lotrinh (id_lotrinh, tuan, ngay, tieude, noidung) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $id_lotrinh, $tuan, $ngay, $tieude, $noidung);
    $stmt->execute();
    $stmt->close();

    echo "<p style='color:green;'>✅ Đã thêm nội dung ngày học.</p>";
    echo "<p><a href='chitiet_lotrinh.php?id=$id_lotrinh'>⬅️ Xem chi tiết lộ trình</a></p>";
    mysqli_close($conn);
    load_footer();
    load_bottom();
    exit;
}
?>

<h2>➕ Thêm Nội Dung Lộ Trình</h2>
<form method="POST">
    <label>Tuần: <input type="number" name="tuan" required></label><br><br>
    <label>Ngày: <input type="number" name="ngay" required></label><br><br>
    <label>Tiêu đề bài học:<br>
        <input type="text" name="tieude" style="width: 100%;" required>
    </label><br><br>
    <label>Nội dung chi tiết:<br>
        <textarea name="noidung" rows="8" style="width:100%;" required></textarea>
    </label><br><br>
    <button type="submit">💾 Thêm nội dung</button>
</form>

<p><a href="chitiet_lotrinh.php?id=<?= htmlspecialchars($id_lotrinh) ?>">⬅️ Quay lại chi tiết lộ trình</a></p>

<?php
mysqli_close($conn);
load_footer();
load_bottom();
?>
