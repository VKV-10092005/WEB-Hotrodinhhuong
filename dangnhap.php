<?php
// Bật hiển thị lỗi (chỉ dùng khi debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'site.php';
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="CSS/cssDangNhap.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Đăng Nhập</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" name="tk" placeholder="Tài khoản" required>
                </div>
                <div class="input-group">
                    <input type="password" name="mk" placeholder="Mật khẩu" required>
                </div>
                <div class="remember-me">
                    <label><input type="checkbox" name="luumk"> Nhớ mật khẩu</label>
                </div>
                <div class="input-group">
                    <input type="submit" name="dn" value="Đăng nhập">
                </div>
            </form>

            <div class="signup-wrapper">
                <p>
                    <a href="doimatkhau.php">Quên mật khẩu</a> |
                    <a href="dangky.php">Đăng ký ngay</a>
                </p>
                <div class="google-inline">
                    <a href="google-login.php" class="google-icon-btn google" title="Google">
                        <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google">
                    </a>
                    <a href="fb-login.php" class="google-icon-btn facebook" title="Facebook">
                        <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
                    </a>
                    <a href="sdt-login.php" class="google-icon-btn phone" title="Số điện thoại">
                        <img src="https://cdn-icons-png.flaticon.com/512/597/597177.png" alt="Phone">
                    </a>
                </div>
            </div>

            <!-- Xử lý đăng nhập -->
            <?php
            if (isset($_POST['dn'])) {
                $tendn = trim($_POST['tk']);
                $matkh = trim($_POST['mk']);

                // Kết nối CSDL của Vương
                $conn = mysqli_connect("localhost", "root", "123456", "dinhhuongbanthan");
                if (!$conn) {
                    die("<p style='color:red;'>❌ Không kết nối được đến CSDL</p>");
                }
                mysqli_set_charset($conn, "utf8mb4");

                // Lấy thông tin từ cả bảng dangnhap và thongtinTK
                $stmt = $conn->prepare("SELECT dn.id, dn.matkhau, dn.da_lam_kiem_tra, tk.tenkhachhang, tk.diachiemail
                                        FROM dangnhap dn
                                        LEFT JOIN thongtintk tk ON dn.id = tk.id
                                        WHERE dn.tendangnhap = ?");
                $stmt->bind_param("s", $tendn);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 0) {
                    echo "<p style='color:red; text-align:center;'>❌ Tài khoản không tồn tại!</p>";
                } else {
                    $stmt->bind_result($user_id, $matkhauDB, $da_lam, $tenkhachhang, $diachiemail);
                    $stmt->fetch();

                    if (password_verify($matkh, $matkhauDB)) {
                        // Lưu session
                        $_SESSION['user'] = $tendn;
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['tendangnhap'] = $tendn;
                        $_SESSION['hoten'] = $tenkhachhang;
                        $_SESSION['email'] = $diachiemail;

                        // Điều hướng
                        if ($da_lam) {
                            header('Location: trangchinh.php');
                        } else {
                            header('Location: batdau.php');
                        }
                        exit();
                    } else {
                        echo "<p style='color:red; text-align:center;'>❌ Sai mật khẩu!</p>";
                    }
                }

                $stmt->close();
                mysqli_close($conn);
            }
            ?>
        </div>
    </div>
</body>
</html>
