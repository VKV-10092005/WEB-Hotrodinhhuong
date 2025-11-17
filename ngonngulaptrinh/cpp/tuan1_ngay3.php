<?php
require '../../site.php';
load_top();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu chưa hoàn thành Ngày 2 thì không cho vào Ngày 3
if (!isset($_SESSION['ngay2_hoan_thanh']) || $_SESSION['ngay2_hoan_thanh'] !== true) {
    header('Location: tuan1_ngay2.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc nghiệm C và C++ - Ngày 3</title>
</head>
<body>
    <h1>Ngôn ngữ C và C++ - Bài trắc nghiệm Ngày 3</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
        <p>Hiện chưa có dữ liệu.</p>
    </div>

    <div class="section">
        <h2>💡 Phần 2: Ví dụ minh họa</h2>
        <p>Hiện chưa có dữ liệu.</p>
    </div>

    <h2>📝 Phần 3: Trắc Nghiệm</h2>
    <p>Hiện chưa có dữ liệu.</p>
</body>
</html>

<?php
include '../../quaylai.php';
load_footer();
?>
