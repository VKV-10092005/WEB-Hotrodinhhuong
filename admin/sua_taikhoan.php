<?php
require '../site.php';
load_top();


if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

// Kiểm tra quyền
$user = $_SESSION['user'];
$sql = "SELECT quyen FROM thongtintk WHERE tendangnhap = ?";
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

// Lấy user cần sửa
$user_sua = $_GET['user'] ?? '';
if (!$user_sua) {
    echo "<p style='color:red;'>❌ Không có tài khoản cần sửa.</p>";
    exit;
}

// Xử lý khi gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenkhachhang = $_POST['tenkhachhang'] ?? '';
    $email = $_POST['diachiemail'] ?? '';
    $ngaysinh = $_POST['ngaysinh'] ?? '';
    $nganh = $_POST['nganh_nghe'] ?? '';
    $quyen = $_POST['quyen'] ?? '';

    $stmt = $conn->prepare("UPDATE thongtintk SET tenkhachhang=?, diachiemail=?, ngaysinh=?, nganh_nghe=?, quyen=? WHERE tendangnhap=?");
    $stmt->bind_param("ssssss", $tenkhachhang, $email, $ngaysinh, $nganh, $quyen, $user_sua);
    $stmt->execute();
    echo "<p style='color:green;'>✅ Đã cập nhật tài khoản $user_sua.</p>";
    $stmt->close();
}

// Lấy thông tin cũ
$stmt = $conn->prepare("SELECT tenkhachhang, diachiemail, ngaysinh, nganh_nghe, quyen FROM thongtinTK WHERE tendangnhap = ?");
$stmt->bind_param("s", $user_sua);
$stmt->execute();
$stmt->bind_result($ten, $email, $ngaysinh, $nganh, $quyen);
$stmt->fetch();
$stmt->close();
?>

<h2>✏️ Sửa tài khoản: <?= htmlspecialchars($user_sua) ?></h2>
<form method="POST">
    <label>Tên người dùng: <input type="text" name="tenkhachhang" value="<?= htmlspecialchars($ten) ?>" required></label><br><br>
    <label>Email: <input type="email" name="diachiemail" value="<?= htmlspecialchars($email) ?>" required></label><br><br>
    <label>Ngày sinh: <input type="date" name="ngaysinh" value="<?= htmlspecialchars($ngaysinh) ?>" required></label><br><br>
    <label>Ngành: <input type="text" name="nganh_nghe" value="<?= htmlspecialchars($nganh) ?>"></label><br><br>
    <label>Quyền:
        <select name="quyen">
            <option value="nguoidung" <?= ($quyen === 'nguoidung' ? 'selected' : '') ?>>Người dùng</option>
            <option value="admin" <?= ($quyen === 'admin' ? 'selected' : '') ?>>Admin</option>
        </select>
    </label><br><br>
    <button type="submit">💾 Lưu thay đổi</button>
</form>

<p><a href="xem_taikhoan.php">⬅️ Quay lại danh sách</a></p>

<?php
mysqli_close($conn);
load_footer();

?>
