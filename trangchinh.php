<?php
session_start(); // Bắt buộc phải có để sử dụng session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Kiểm tra xem user đã đăng nhập chưa (dùng session 'user' thống nhất với dangnhap.php và google-login.php)
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập thì chuyển hướng về trang đăng nhập
    header('Location: dangnhap.php');
    exit();
}

require 'site.php';
load_top();
load_header();
//load_menu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hỗ trợ định hướng phát triển bản thân</title>
    <meta name="google-site-verification" content="cbae83ef4a28b87b" />
    <link rel="stylesheet" href="CSS/cssTrangChinh.css">
</head>
<body>

<div class="container">
    <h1>⚡ Chào mừng bạn đến với Web Định Hướng Bản Thân ⚡</h1>
    <p class="intro">
        Cùng khám phá tính cách, định hướng ngành nghề và phát triển kỹ năng qua từng bước rõ ràng.  
        <br>Hành trình của bạn bắt đầu từ đây — hãy tự tin chinh phục tương lai!
    </p>

    <div class="buttons">
        <a href="batdau.php">🧠 Kiểm tra tính cách</a>
        <a href="ketqua.php">📄 Kết quả & Ngành nghề</a>
        <a href="lotrinh.php">📚 Lộ trình kỹ năng</a>
        <!-- <a href="quatrinh.php">🗓 Quá trình học tập</a>
		<a href="theodoitiendo.php">📝 Theo dõi tiến độ học tập</a>
        <a href="tainguyen.php">📦 Tài nguyên học tập</a>
        <a href="du-an-offline/offline.php">💡 Chế độ Offline</a>
        <a href="khoahoc.php">🔑 Đăng Ký khóa học</a> -->
    </div>
</div>

</body>
</html>

<?php include 'quaylai.php'; ?>
<?php load_footer(); ?>
