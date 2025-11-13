<?php
require '../site.php';
load_top();
session_start();

// Kiểm tra quyền admin
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

// Nếu có ID truyền vào thì là sửa
$id = $_GET['id'] ?? null;
$nganh = $ngonngu = $tieude = '';

if ($id) {
    $stmt = $conn->prepare("SELECT nganh, ngonngu, tieude FROM lotrinh WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($nganh, $ngonngu, $tieude);
    $stmt->fetch();
    $stmt->close();
}

// Xử lý lưu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nganh = $_POST['nganh'];
    $ngonngu = $_POST['ngonngu'];
    $tieude = $_POST['tieude'];

    if ($id) {
        $stmt = $conn->prepare("UPDATE lotrinh SET nganh = ?, ngonngu = ?, tieude = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nganh, $ngonngu, $tieude, $id);
        $stmt->execute();
        echo "<p style='color:green;'>✅ Đã cập nhật lộ trình.</p>";
        $stmt->close();
    } else {
        $stmt = $conn->prepare("INSERT INTO lotrinh (nganh, ngonngu, tieude) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nganh, $ngonngu, $tieude);
        $stmt->execute();
        echo "<p style='color:green;'>✅ Đã thêm lộ trình mới.</p>";
        $stmt->close();
    }

    echo "<p><a href='quanly_lotrinh.php'>⬅️ Quay lại quản lý lộ trình</a></p>";
    mysqli_close($conn);
    load_footer();
    load_bottom();
    exit;
}
?>

<h2><?= $id ? '✏️ Sửa Lộ trình' : '➕ Thêm Lộ trình' ?></h2>
<form method="POST">
    <label>Ngành: <input type="text" name="nganh" value="<?= htmlspecialchars($nganh) ?>" required></label><br><br>
    <label>Ngôn ngữ: <input type="text" name="ngonngu" value="<?= htmlspecialchars($ngonngu) ?>" required></label><br><br>
    <label>Tiêu đề: <input type="text" name="tieude" value="<?= htmlspecialchars($tieude) ?>" required></label><br><br>
    <button type="submit">💾 <?= $id ? 'Lưu thay đổi' : 'Thêm mới' ?></button>
</form>

<p><a href="quanly_lotrinh.php">⬅️ Quay lại danh sách</a></p>

<?php
mysqli_close($conn);
load_footer();
load_bottom();
?>
