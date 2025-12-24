<?php
session_start();
require '../site.php';
load_top();

/* ================== CHECK ĐĂNG NHẬP ================== */
if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

/* ================== KẾT NỐI DB ================== */
$conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");
if (!$conn) die("❌ Lỗi kết nối CSDL");

/* ================== CHECK QUYỀN ADMIN ================== */
$user = $_SESSION['user'];
$sql = "SELECT quyen FROM thongtinTK WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen_dangnhap);
$stmt->fetch();
$stmt->close();

if ($quyen_dangnhap !== 'admin') {
    echo "<p style='color:red;'>❌ Bạn không có quyền truy cập.</p>";
    exit;
}

/* ================== USER CẦN SỬA ================== */
$user_sua = $_GET['user'] ?? '';
if ($user_sua === '') {
    echo "<p style='color:red;'>❌ Không có tài khoản cần sửa.</p>";
    exit;
}

/* ================== DANH SÁCH NGÀNH HỢP LỆ ================== */
$ds_nganh_hople = ['CNTT', 'Marketing', 'KinhDoanh', 'ThietKe'];

/* ================== XỬ LÝ SUBMIT ================== */
$loi = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenkhachhang = $_POST['tenkhachhang'] ?? '';
    $email        = $_POST['diachiemail'] ?? '';
    $ngaysinh     = $_POST['ngaysinh'] ?? '';
    $nganh        = $_POST['nganh_nghe'] ?? '';
    $nganh_moi    = trim($_POST['nganh_moi'] ?? '');
    $quyen        = $_POST['quyen'] ?? 'nguoidung';

    /* ===== XỬ LÝ NGÀNH ===== */
    if ($nganh === 'Khac') {
        if ($nganh_moi === '') {
            $loi = "❌ Vui lòng nhập ngành mới.";
        } elseif (!in_array($nganh_moi, $ds_nganh_hople)) {
            $loi = "❌ Ngành này chưa có, vui lòng chọn ngành khác.";
        } else {
            $nganh = $nganh_moi;
        }
    }

    if ($loi === '') {
        $sql = "UPDATE thongtinTK
                SET tenkhachhang=?, diachiemail=?, ngaysinh=?, nganh_nghe=?, quyen=?
                WHERE tendangnhap=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssss",
            $tenkhachhang,
            $email,
            $ngaysinh,
            $nganh,
            $quyen,
            $user_sua
        );
        $stmt->execute();
        $stmt->close();

        echo "<p style='color:green;'>✅ Đã cập nhật tài khoản <b>" . htmlspecialchars($user_sua) . "</b></p>";
    }
}

/* ================== LẤY DỮ LIỆU CŨ ================== */
$sql = "SELECT tenkhachhang, diachiemail, ngaysinh, nganh_nghe, quyen
        FROM thongtinTK WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_sua);
$stmt->execute();
$stmt->bind_result($ten, $email, $ngaysinh, $nganh, $quyen);
$stmt->fetch();
$stmt->close();

$ten = $ten ?? '';
$email = $email ?? '';
$ngaysinh = $ngaysinh ?? '';
$nganh = $nganh ?? '';
$quyen = $quyen ?? 'nguoidung';

function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>

<h2>✏️ Sửa tài khoản: <?= e($user_sua) ?></h2>

<?php if ($loi): ?>
    <p style="color:red;"><b><?= e($loi) ?></b></p>
<?php endif; ?>

<form method="POST">

    <label>Tên:
        <input type="text" name="tenkhachhang" value="<?= e($ten) ?>" required>
    </label><br><br>

    <label>Email:
        <input type="email" name="diachiemail" value="<?= e($email) ?>" required>
    </label><br><br>

    <label>Ngày sinh:
        <input type="date" name="ngaysinh" value="<?= e($ngaysinh) ?>">
    </label><br><br>

    <label>Ngành:
        <select name="nganh_nghe" id="nganh" onchange="toggleNganhMoi()">
            <option value="">-- Chọn ngành --</option>
            <option value="CNTT" <?= ($nganh==='CNTT'?'selected':'') ?>>CNTT</option>
            <option value="Marketing" <?= ($nganh==='Marketing'?'selected':'') ?>>Marketing</option>
            <option value="KinhDoanh" <?= ($nganh==='KinhDoanh'?'selected':'') ?>>Kinh doanh</option>
            <option value="ThietKe" <?= ($nganh==='ThietKe'?'selected':'') ?>>Thiết kế</option>
            <option value="Khac">Khác</option>
        </select>
    </label><br><br>

    <div id="nganh_moi_box" style="display:none;">
        <label>Nhập ngành khác:
            <input type="text" name="nganh_moi">
        </label><br><br>
    </div>

    <label>Quyền:
        <select name="quyen">
            <option value="nguoidung" <?= ($quyen==='nguoidung'?'selected':'') ?>>Người dùng</option>
            <option value="admin" <?= ($quyen==='admin'?'selected':'') ?>>Admin</option>
        </select>
    </label><br><br>

    <button type="submit">💾 Lưu</button>
</form>

<script>
function toggleNganhMoi() {
    const nganh = document.getElementById('nganh').value;
    document.getElementById('nganh_moi_box').style.display =
        (nganh === 'Khac') ? 'block' : 'none';
}
</script>

<p><a href="xem_taikhoan.php">⬅️ Quay lại</a></p>

<?php
mysqli_close($conn);
load_footer();
?>
