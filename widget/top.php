<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: dangnhap.php');
    exit();
}

// Lấy tên người dùng
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Định Hướng Bản Thân</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS riêng -->
    <link rel="stylesheet" href="CSS/style.css">

    <!-- JS nếu cần -->
    <script src="style/js/script.js"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #ffffff;
        }

        .top {
            background: linear-gradient(to right, #00aaff, #33ccff); /* Màu xanh dương nhạt */
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .top .left h2 {
            margin: 0;
            font-size: 24px;
        }

        .top .left p {
            margin: 0;
            font-size: 14px;
            color: #e0f7ff; /* xanh nhạt hơn cho phụ đề */
        }

        .top a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }

        .top a:hover {
            text-decoration: underline;
        }

        .top .right {
            text-align: right;
        }

        .top .right p {
            margin: 0;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="top">
        <div class="left">
            <h2>🌟 Định Hướng Bản Thân</h2>
            <p>Khám phá tính cách & phát triển tương lai</p>
            <a href="/VKV/dinh-huong/trangchinh.php">🏠 Trang chủ</a>
        </div>

        <div class="right">
            <p>👋 Xin chào, <strong><?php echo htmlspecialchars($user); ?></strong></p>
            <a href="/VKV/dinh-huong/dangxuat.php">🚪 Đăng xuất</a>
        </div>
    </div>
</body>
</html>
