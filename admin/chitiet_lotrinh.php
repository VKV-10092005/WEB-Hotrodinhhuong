<?php
require '../site.php';
load_top();
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    echo "<p>⚠️ Bạn chưa đăng nhập.</p>";
    exit;
}

// Kết nối CSDL
$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$id_lotrinh = $_GET['id'] ?? null;
if (!$id_lotrinh) {
    echo "<p>❌ Thiếu ID lộ trình.</p>";
    exit;
}

// Lấy thông tin lộ trình
$stmt = $conn->prepare("SELECT nganh, ngonngu, tieude FROM lotrinh WHERE id = ?");
$stmt->bind_param("i", $id_lotrinh);
$stmt->execute();
$stmt->bind_result($nganh, $ngonngu, $tieude);
$stmt->fetch();
$stmt->close();

echo "<h2>📋 Chi tiết lộ trình: " . htmlspecialchars($tieude) . "</h2>";
echo "<p><strong>Ngành:</strong> " . htmlspecialchars($nganh) . " | <strong>Ngôn ngữ:</strong> " . htmlspecialchars($ngonngu) . "</p>";

// Kiểm tra quyền admin
$isAdmin = false;
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $stmt = $conn->prepare("SELECT quyen FROM thongtinTK WHERE tendangnhap = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($quyen);
    $stmt->fetch();
    $stmt->close();
    $isAdmin = ($quyen === 'admin');
}

// Hiển thị nội dung chi tiết
$stmt = $conn->prepare("SELECT id, tuan, ngay, tieude, noidung FROM noidung_lotrinh WHERE id_lotrinh = ? ORDER BY tuan, ngay");
$stmt->bind_param("i", $id_lotrinh);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<p>⚠️ Chưa có nội dung chi tiết cho lộ trình này.</p>";
} else {
    $currentWeek = -1;
    while ($row = $result->fetch_assoc()) {
        if ($row['tuan'] != $currentWeek) {
            $currentWeek = $row['tuan'];
            echo "<h3 style='color:#007bff;'>📅 Tuần $currentWeek</h3>";
        }
        echo "<div style='margin-left: 20px; padding: 10px; border-left: 3px solid #007bff; margin-bottom: 10px;'>";
        echo "<strong>Ngày {$row['ngay']}:</strong> " . htmlspecialchars($row['tieude']) . "<br>";
        echo "<div style='margin-top:5px;'>" . nl2br(htmlspecialchars($row['noidung'])) . "</div>";
        if ($isAdmin) {
            echo "<div style='margin-top: 5px;'>
                <a href='sua_noidung_lotrinh.php?id={$row['id']}' style='color:#007bff;'>✏️ Sửa</a> |
                <a href='xoa_noidung_lotrinh.php?id={$row['id']}&id_lotrinh=$id_lotrinh' style='color:red;' onclick=\"return confirm('Bạn chắc chắn muốn xóa nội dung này?')\">🗑️ Xóa</a>
            </div>";
        }
        echo "</div>";
    }
}
$stmt->close();

if ($isAdmin) {
    echo "<p><a href='sua_noidung_lotrinh.php?id_lotrinh=$id_lotrinh' style='color:green;'>➕ Thêm nội dung mới</a></p>";
}

mysqli_close($conn);
?>

<p><a href="quanly_lotrinh.php">⬅️ Quay lại danh sách lộ trình</a></p>

<?php
load_footer();
load_bottom();
?>
