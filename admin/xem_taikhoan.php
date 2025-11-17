<?php
require '../site.php';
load_top();


// Kiểm tra quyền admin
if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

// Kiểm tra quyền
$user = $_SESSION['user'];
$sql = "SELECT quyen FROM thongtintk WHERE tendangnhap = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen);
$stmt->fetch();
$stmt->close();

if ($quyen !== 'admin') {
    echo "<p style='color:red;'>❌ Bạn không có quyền truy cập.</p>";
    exit;
}

// Xử lý xóa nếu có POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['xoa_user'])) {
    $user_xoa = $_POST['xoa_user'];
    $stmt = $conn->prepare("DELETE FROM thongtintk WHERE tendangnhap = ?");
    $stmt->bind_param("s", $user_xoa);
    $stmt->execute();
    echo "<p style='color:green;'>✅ Đã xóa tài khoản $user_xoa.</p>";
    $stmt->close();
}

// Lấy danh sách tài khoản
$result = mysqli_query($conn, "SELECT tendangnhap, tenkhachhang, diachiemail, ngaysinh, nganh_nghe, quyen FROM thongtinTK");

echo "<h2>📄 Danh sách tài khoản</h2>";
echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background: #f0f0f0;'><th>Tên đăng nhập</th><th>Tên người dùng</th><th>Email</th><th>Ngày sinh</th><th>Ngành</th><th>Quyền</th><th>Hành động</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['tendangnhap']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tenkhachhang']) . "</td>";
    echo "<td>" . htmlspecialchars($row['diachiemail']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ngaysinh']) . "</td>";
    echo "<td>" . htmlspecialchars($row['nganh_nghe']) . "</td>";
    echo "<td>" . htmlspecialchars($row['quyen']) . "</td>";
    echo "<td>
        <a href='sua_taikhoan.php?user=" . urlencode($row['tendangnhap']) . "'>✏️ Sửa</a> |
        <form method='POST' style='display:inline;' onsubmit=\"return confirm('Bạn chắc chắn muốn xóa?');\">
            <input type='hidden' name='xoa_user' value='" . htmlspecialchars($row['tendangnhap']) . "'>
            <button type='submit' style='background:none; border:none; color:red; cursor:pointer;'>🗑️ Xóa</button>
        </form>
    </td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
load_footer();

?>
