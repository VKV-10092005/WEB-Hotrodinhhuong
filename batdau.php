<?php
require 'site.php';
session_start();
load_top();
//load_menu();

$da_lam = false;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
    if ($conn) {
        mysqli_set_charset($conn, "utf8mb4");
        $stmt = $conn->prepare("SELECT da_lam_kiem_tra FROM dangnhap WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($da_lam);
        $stmt->fetch();
        $stmt->close();
        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Định Hướng Bản Thân</title>
   <link rel="stylesheet" href="CSS/cssBatDau.css">
</head>
<body>

<div class="header">
    <h1>🔍 Khám phá bản thân – Định hướng tương lai!</h1>
    <p>Công cụ giúp bạn hiểu rõ tính cách, sở thích và con đường phát triển nghề nghiệp phù hợp.</p>

    <div class="button-group">
        <?php if ($da_lam): ?>
            <p style="color:rgb(33, 32, 30); font-size: 16px;">⚠️ Bạn đã làm bài kiểm tra trước đó.</p>
            <a href="kiemtra.php"><button>🔁 Làm lại bài kiểm tra</button></a>
            <a href="ketqua.php"><button>📄 Xem lại kết quả</button></a>
        <?php else: ?>
            <a href="kiemtra.php"><button>🚀 Bắt đầu kiểm tra</button></a>
        <?php endif; ?>
    </div>
</div>

<?php include 'quaylai.php'; ?>

<?php load_footer(); ?>

</body>
</html>
