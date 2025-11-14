<?php
// db.php hoặc config.php

//$host = 'sql111.byetcluster.com';  // Host của bạn
//$user = 'if0_38745006';            // Tên người dùng MySQL
//$password = '';                    // Mật khẩu trống
//$database = 'if0_38745006_hotrodinhhuong'; // Tên cơ sở dữ liệu
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'hotrodinhhuong';
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

return $conn;
?>
 