<?php
session_start(); // Bắt đầu session nếu chưa có
session_unset(); // Xóa tất cả biến session
session_destroy(); // Hủy session

// Chuyển hướng về trang đăng nhập hoặc trang chủ
header("Location: dangnhap.php"); // Bạn có thể đổi sang trangchu.php nếu muốn
exit();
