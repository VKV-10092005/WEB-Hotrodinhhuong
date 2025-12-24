<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db.php';

session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi Mật Khẩu</title>
    <link rel="stylesheet" href="CSS/cssDoiMatKhau.css">
</head>
<body>

<div class="container">
    <h2>🔐 Đổi mật khẩu</h2>
    <?php
    // BƯỚC 1: Kiểm tra thông tin cá nhân
    if (!isset($_SESSION['xac_thuc_doi_mk'])):
    ?>

    <form method="POST">
        <table>
            <tr>
                <td><label for="tendn"><b>Tên đăng nhập</b></label></td>
                <td><input type="text" name="tendn" required></td>
            </tr>
            <tr>
                <td><label for="hoten"><b>Họ tên</b></label></td>
                <td><input type="text" name="hoten" required></td>
            </tr>
            <tr>
                <td><label for="ngaysinh"><b>Ngày sinh</b></label></td>
                <td><input type="date" name="ngaysinh" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" name="xacnhan" value="Xác nhận">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['xacnhan'])) {
        $tendn = $_POST['tendn'];
        $hoten = $_POST['hoten'];
        $ngaysinh = $_POST['ngaysinh'];

        $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong") or die("Không kết nối CSDL");
        mysqli_set_charset($conn, "utf8mb4");

        $tendn = mysqli_real_escape_string($conn, $tendn);
        $hoten = mysqli_real_escape_string($conn, $hoten);
        $ngaysinh = mysqli_real_escape_string($conn, $ngaysinh);

        $sql = "SELECT * FROM thongtinTK WHERE tendangnhap='$tendn' AND tenkhachhang='$hoten' AND ngaysinh='$ngaysinh'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $_SESSION['xac_thuc_doi_mk'] = $tendn;
            echo "<script>window.location.href = 'doimatkhau.php';</script>";
        } else {
            echo "<p class='message error'>❌ Thông tin không trùng khớp!</p>";
        }

        mysqli_close($conn);
    }
    ?>

    <?php else: ?>
    <!-- BƯỚC 2: Hiện form đổi mật khẩu -->
    <form method="POST">
        <table>
            <tr>
                <td><label><b>Mật khẩu mới</b></label></td>
                <td><input type="password" name="newpass" required></td>
            </tr>
            <tr>
                <td><label><b>Nhập lại mật khẩu</b></label></td>
                <td><input type="password" name="confirmpass" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" name="doimk" value="Đổi mật khẩu">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['doimk'])) {
        $newpass = $_POST['newpass'];
        $confirmpass = $_POST['confirmpass'];

        // Kiểm tra định dạng mật khẩu mới
        if (!preg_match('/[A-Z]/', $newpass) || !preg_match('/[^a-zA-Z0-9]/', $newpass) || strlen($newpass) < 8) {
            echo "<p class='message error'>❌ Mật khẩu mới phải có ít nhất 8 ký tự, một chữ hoa và một ký tự đặc biệt!</p>";
        } elseif ($newpass !== $confirmpass) {
            echo "<p class='message error'>❌ Mật khẩu nhập lại không khớp!</p>";
        } else {
            $tendn = $_SESSION['xac_thuc_doi_mk'];
            $hash = password_hash($newpass, PASSWORD_DEFAULT);

            $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
            mysqli_set_charset($conn, "utf8mb4");

            $sql = "UPDATE dangnhap SET matkhau='$hash' WHERE tendangnhap='$tendn'";
            if (mysqli_query($conn, $sql)) {
                echo "<p class='message success'>✅ Mật khẩu đã được cập nhật thành công! <a href='dangnhap.php'>Đăng nhập</a></p>";
                unset($_SESSION['xac_thuc_doi_mk']);
            } else {
                echo "<p class='message error'>❌ Lỗi: " . mysqli_error($conn) . "</p>";
            }

            mysqli_close($conn);
        }
    }
    ?>
    <?php endif; ?>
</div>

</body>
</html>

