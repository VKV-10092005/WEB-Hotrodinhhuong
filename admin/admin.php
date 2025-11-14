<?php
require '../site.php';
session_start();
load_top();

// Kiểm tra đăng nhập và quyền admin
if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$user = $_SESSION['user'];
$sql = "SELECT quyen FROM thongtintk WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen);
$stmt->fetch();
$stmt->close();
$conn->close();

if ($quyen !== 'admin') {
    echo "<p style='color:red;'>❌ Bạn không có quyền truy cập trang quản trị.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="../CSS/cssAdmin.css">
</head>
<body>

<div class="container-admin">
    <h2>👑 Trang Quản Trị</h2>
    <p>Chào <strong><?= htmlspecialchars($user) ?></strong>! Bạn đang truy cập trang quản trị.</p>

    <ul>
        <li><a href="xem_taikhoan.php">📄 Danh sách tài khoản</a></li> 
        <!-- <li><a href="">🚰️ Quản lý lộ trình</a></li>  quanly_lotrinh.php -->
        <!-- <li><a href="">📊 Thống kê</a></li>   thongke.php -->
        <!-- <li><a href="">🔐 Phân quyền người dùng</a></li>phanquyen.php -->
        <!-- <li><a href="">👤 Hồ sơ quản trị</a></li> <li>hoso_admin.php -->
            <!-- <a href="">📝 Quản lý bài viết / thông báo</a>quanly_baiviet.php</li> -->
        <!-- <li><a href="">📬 Phản hồi người dùng</a></li>phanhoi.php -->
        <!-- <li><a href="">🕒 Nhật ký hoạt động</a></li>lichsu_hoatdong.php -->
        <!-- <li><a href="">💾 Sao lưu & Khôi phục dữ liệu</a></li>backup_restore.php -->
        <!-- <li><a href="">⚙️ Cài đặt hệ thống</a></li>caidat_hethong.php -->
    </ul>
</div>

</body>
</html>

<?php
load_footer();
load_bottom();
?>
