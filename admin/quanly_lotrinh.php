<?php
require '../site.php';
load_top();
session_start();

// Kiểm tra quyền admin
if (!isset($_SESSION['user'])) {
    echo "<p>\u26a0\ufe0f B\u1ea1n ch\u01b0a \u0111\u0103ng nh\u1eadp.</p>";
    exit;
}

$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$user = $_SESSION['user'];
$stmt = $conn->prepare("SELECT quyen FROM thongtinTK WHERE tendangnhap = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($quyen);
$stmt->fetch();
$stmt->close();

if ($quyen !== 'admin') {
    echo "<p style='color:red;'>\u274c B\u1ea1n kh\u00f4ng c\u00f3 quy\u1ec1n truy c\u1eadp.</p>";
    exit;
}

// Hi\u1ec3n th\u1ecb danh s\u00e1ch l\u1ed9 tr\u00ecnh
$result = mysqli_query($conn, "SELECT * FROM lotrinh ORDER BY id DESC");

echo "<h2>\ud83d\udee0\ufe0f Qu\u1ea3n l\u00fd l\u1ed9 tr\u00ecnh</h2>";
echo "<p><a href='them_lotrinh.php'>➕ Th\u00eam l\u1ed9 tr\u00ecnh m\u1edbi</a></p>";
echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
echo "<tr style='background: #f0f0f0;'><th>ID</th><th>Ng\u00e0nh</th><th>Ng\u00f4n ng\u1eef</th><th>Ti\u00eau \u0111\u1ec1</th><th>Chi ti\u1ebft</th><th>H\u00e0nh \u0111\u1ed9ng</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['nganh']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ngonngu']) . "</td>";
    echo "<td>" . htmlspecialchars($row['tieude']) . "</td>";
    echo "<td><a href='chitiet_lotrinh.php?id=" . $row['id'] . "'>📋 Xem</a></td>";
    echo "<td>
        <a href='sua_taikhoan.php?id=" . $row['id'] . "'>✏️ Sửa</a> |
        <a href='xoa_lotrinh.php?id=" . $row['id'] . "' onclick=\"return confirm('Bạn chắc chắn muốn xoá?');\">🗑️ Xoá</a>
    </td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
load_footer();
load_bottom();
?>



