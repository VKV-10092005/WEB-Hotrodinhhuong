<?php
// cập nhập file đăng nhập

// Bật hiển thị lỗi (chỉ dùng khi debug)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'site.php'; // các file fotter header menu,...
session_start(); // khởi động phiên làm việc bắt. đầu làm với session.
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

            <div class="signup-link">
                <p>
                    Chưa có tài khoản? 
                    <a href="dangky.php">Đăng ký ngay</a>
                    <span class="google-inline">
                        <a href="google-login.php" class="google-icon-btn" title="Đăng nhập bằng Google">
                            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google">
                        </a>
                    </span>
                </p>
            </div>

            <!-- Xử lý đăng nhập -->
            <?php
            if (isset($_POST['dn'])) { //xử lý dữ liệu từ form HTML bằng phương thức POST lấy các giá trị input
											// khi người dùng nhấn nút dn. phương thức này là mãng siêu toàn cục
                $tendn = trim($_POST['tk']);
                $matkh = trim($_POST['mk']);

                // Kết nối CSDL
                $conn = mysqli_connect("localhost", "root", "123456", "dinhhuongbanthan");
                if (!$conn) {
                    die("<p style='color:red;'>❌ Không kết nối được đến CSDL</p>");
                }
                mysqli_set_charset($conn, "utf8mb4"); // thiết lập tiếng việt trong mySQL

                // Lấy thông tin từ cả bảng dangnhap và thongtinTK
                $stmt = $conn->prepare("SELECT dn.id, dn.matkhau, dn.da_lam_kiem_tra, tk.tenkhachhang, tk.diachiemail
                                        FROM dangnhap dn
                                        LEFT JOIN thongtintk tk ON dn.id = tk.id
                                        WHERE dn.tendangnhap = ?");
										
                $stmt->bind_param("s", $tendn); // dùng chữ s vì là ten đăng nhập là 1 biến chuỗi.
												// liên kết tên đăng nhập biến truyền vào với tham số ?
				
                $stmt->execute(); // thực thi câu lệnh với tham số truyền vào
                $stmt->store_result(); // lưu toàn bộ kết quả truyền vào -> vào table (lưu vào bộ nhớ tạm )

                if ($stmt->num_rows === 0) { // đếm xem tên đăng nhập đã tồn tại hay chưa
                    echo "<p style='color:red; text-align:center;'>❌ Tài khoản không tồn tại!</p>";
                } else {
                    $stmt->bind_result($user_id, $matkhauDB, $da_lam, $tenkhachhang, $diachiemail);
                    $stmt->fetch();

                    if (password_verify($matkh, $matkhauDB)) { 
										// so sánh mật khẩu có trùng khớp hay không 
										//xem mật khẩu được mã hóa có trùng khớp với chuỗi truyền vào hay không
                        // Lưu session
                        $_SESSION['user'] = $tendn;
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['tendangnhap'] = $tendn; // có thể trùng với tên người dùng.
                        $_SESSION['hoten'] = $tenkhachhang;
                        $_SESSION['email'] = $diachiemail;
						
						// sau khi đăng nhập thành công thì lưu các thông tin về session. để kiểm tra quyền truy cập, hiển thị tên ở header
						//sesion là phiên làm việc 
						

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
