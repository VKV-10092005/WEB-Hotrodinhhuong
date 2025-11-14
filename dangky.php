<?php
// đã làm xong file đăng ký
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'site.php';

//session_start();
//load_top();
//load_header();
//load_menu();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Ký</title>
    <!-- Thêm liên kết tới file CSS -->
    <link rel="stylesheet" href="CSS/cssDangKy.css">
</head>
<body>

    <div class="container">
        <div class="form-box">
            <h2>Đăng ký tài khoản</h2>
            <form action="" method="POST">
                <table>
                    <!--<tr>
                         <td colspan="2" style="background-color: #007BFF; color: white; text-align: center; border-radius: 5px;">
                            <strong>Thông tin đăng nhập</strong>
                        </td>
                    </tr>-->
                    <tr>
                        <td><label for="tendn"><b>Tên đăng nhập</b></label></td>
                        <td><input type="text" id="tendn" name="tendn" placeholder="Tên đăng nhập" required></td>
                    </tr>
                    <tr>
                        <td><label for="matkhau"><b>Mật khẩu</b></label></td>
                        <td><input type="password" id="matkhau" name="matkhau" placeholder="Mật khẩu" required></td>
                    </tr>
                    <tr>
                        <td><label for="matkhau_lai"><b>Nhập lại mật khẩu</b></label></td>
                        <td><input type="password" id="matkhau_lai" name="matkhau_lai" placeholder="Nhập lại mật khẩu" required></td>
                    </tr>

                    <!--<tr>
                        <td colspan="2" style="background-color: #007BFF; color: white; text-align: center; border-radius: 5px;">
                            <strong>Thông tin cá nhân</strong>
                        </td>
                    </tr>-->
                    <tr>
                        <td><label for="hoten"><b>Họ tên</b></label></td>
                        <td><input type="text" id="hoten" name="hoten" placeholder="Họ tên đầy đủ"></td>
                    </tr>
                    <tr>
                        <td><label for="ngaysinh"><b>Ngày sinh</b></label></td>
                        <td><input type="date" id="ngaysinh" name="ngaysinh"></td>
                    </tr>
                    <tr>
                        <td><label><b>Giới tính</b></label></td>
                        <td>
                            <input type="radio" name="gioitinh" value="Nam" checked> Nam
                            <input type="radio" name="gioitinh" value="Nữ"> Nữ
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email"><b>Email</b></label></td>
                        <td><input type="email" id="email" name="email" placeholder="Email cá nhân"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" name="dangky" value="Đăng ký">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
            if (isset($_POST['dangky'])) {
                $tendn = $_POST['tendn'];
                $matkhau = $_POST['matkhau'];
                $matkhau_lai = $_POST['matkhau_lai'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $ngaysinh = $_POST['ngaysinh'];
                $gioitinh = $_POST['gioitinh'];

                if (!preg_match('/^[a-z0-9]+$/i', $tendn)) {
                    echo "<p class='message error'>❌ Tên đăng nhập chỉ được chứa chữ cái không dấu và số, không khoảng trắng hoặc ký tự đặc biệt!</p>";
                    exit;
                }
                //Kiểm tra mật khẩu có ít nhất 1 chữ hoa
                if (!preg_match('/[A-Z]/', $matkhau)) {
                    echo "<p class='message error'>❌ Mật khẩu phải có ít nhất 8 ký tự, một chữ cái viết hoa, một ký tự đặc biệt!</p>";
                    exit;
                }
                // Kiểm tra mật khẩu có ít nhất 1 ký tự đặc biệt
                if (!preg_match('/[^a-zA-Z0-9]/', $matkhau)) {
                    echo "<p class='message error'>❌ Mật khẩu phải có ít nhất 8 ký tự, một chữ cái viết hoa, một ký tự đặc biệt!</p>";
                    exit;
                }
                // Kiểm tra mật khẩu đủ độ dài tối thiểu
                if (strlen($matkhau) < 8) {
                    echo "<p class='message error'>❌ Mật khẩu phải có 8 ký tự, một chữ cái viết hoa, một ký tự đặc biệt!</p>";
                    exit;
                }
                if ($matkhau !== $matkhau_lai) {
                    echo "<p class='message error'>❌ Mật khẩu không trùng khớp!</p>";
                } else {
                    $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong") or die("Không kết nối được CSDL");
                    mysqli_set_charset($conn, "utf8mb4");

                    $tendn = mysqli_real_escape_string($conn, $tendn);
                    $sql_check = "SELECT * FROM thongtinTK WHERE tendangnhap='$tendn'";
                    $res = mysqli_query($conn, $sql_check);

                    if (mysqli_num_rows($res) > 0) {
                        echo "<p class='message error'>❌ Tên đăng nhập đã tồn tại!</p>";
                    } else {
                        // Mã hóa mật khẩu
                        $matkhau_hash = password_hash($matkhau, PASSWORD_DEFAULT);
                        //$matkhau_hash = $matkhau;
                        // Chuẩn hóa dữ liệu
                        $hoten = mysqli_real_escape_string($conn, $hoten);
                        $email = mysqli_real_escape_string($conn, $email);
                        $ngaysinh = mysqli_real_escape_string($conn, $ngaysinh);
                        $gioitinh = mysqli_real_escape_string($conn, $gioitinh);

                        // Thêm vào bảng thongtinTK
                        $sql_insert_info = "INSERT INTO thongtinTK (tendangnhap, tenkhachhang, ngaysinh, gioitinh, diachiemail)
                                            VALUES ('$tendn', '$hoten', '$ngaysinh', '$gioitinh', '$email')";

                        // Thêm vào bảng dangnhap
                        $sql_insert_login = "INSERT INTO dangnhap (tendangnhap, matkhau)
                                            VALUES ('$tendn', '$matkhau_hash')";
                        // $sql_insert_login = "INSERT INTO dangnhap (tendangnhap, matkhau)
                        //                     VALUES ('$tendn', '$matkhau')";

                        if (mysqli_query($conn, $sql_insert_info) && mysqli_query($conn, $sql_insert_login)) {
                            echo "<p class='message success'>✅ Đăng ký thành công! Bạn sẽ được chuyển hướng trong giây lát...</p>";
                            echo "<script>
                                    setTimeout(function() {
                                        window.location.href = 'dangnhap.php';
                                    }, 1000); // Chuyển hướng sau 1 giây
                                </script>";
                            exit;
                        } else {
                            echo "<p class='message error'>❌ Lỗi: " . mysqli_error($conn) . "</p>";
                        }
                    }

                    mysqli_close($conn);
                }
            }
            ?>
			<div class="register-options">
				<div style="display: flex; justify-content: center; gap: 5px;">
					<a href="google-register.php" class="google">
						<img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo">
						Google
					</a>

					<a href="facebook-register.php" class="facebook">
						<img src="https://www.facebook.com/images/fb_icon_325x325.png" alt="Facebook Logo">
						Facebook
					</a>

					<a href="dangky_sdt.php" class="phone">
						📱 Số điện thoại
					</a>
				</div>
				<div class="back-link">
					<p>Đã có tài khoản?<a href="dangnhap.php"> Đăng nhập</a></p>
				</div>

			</div>
			
        </div>
    </div>

</body>
	<?php include 'quaylai.php'; ?>
</html>


