<?php
require '../site.php';
load_top();
session_start();

if (!isset($_SESSION['user'])) exit("⚠️ Vui lòng đăng nhập");

$conn = mysqli_connect("sql111.byetcluster.com", "if0_38745006", "vkv10092005", "if0_38745006_hotrodinhhuong");
mysqli_set_charset($conn, "utf8mb4");

$id = $_GET['id'] ?? null;
$tuan = $ngay = $noidung = '';

if ($id) {
    $stmt = $conn->prepare("SELECT tuan, ngay, noidung FROM noidung_lotrinh WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($tuan, $ngay, $noidung);
    $stmt->fetch();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuan = $_POST['tuan'];
    $ngay = $_POST['ngay'];
    $noidung = $_POST['noidung'];

    if ($id) {
        $stmt = $conn->prepare("UPDATE noidung_lotrinh SET tuan=?, ngay=?, noidung=? WHERE id=?");
        $stmt->bind_param("sssi", $tuan, $ngay, $noidung, $id);
    } else {
        $id_lotrinh = $_POST['id_lotrinh'];
        $stmt = $conn->prepare("INSERT INTO noidung_lotrinh (id_lotrinh, tuan, ngay, noidung) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id_lotrinh, $tuan, $ngay, $noidung);
    }
    $stmt->execute();
    echo "<p style='color:green;'>✅ Đã lưu nội dung.</p>";
    echo "<a href='chitiet_lotrinh.php?id=" . ($_POST['id_lotrinh'] ?? '') . "'>⬅️ Quay lại</a>";
    $stmt->close();
    exit;
}
?>

<h2><?= $id ? '✏️ Sửa Nội dung' : '➕ Thêm Nội dung' ?></h2>
<form method="POST">
    <?php if (!$id): ?>
    <input type="hidden" name="id_lotrinh" value="<?= htmlspecialchars($_GET['id_lotrinh']) ?>">
    <?php endif; ?>
    <label>Tuần: <input name="tuan" value="<?= htmlspecialchars($tuan) ?>" required></label><br><br>
    <label>Ngày: <input name="ngay" value="<?= htmlspecialchars($ngay) ?>" required></label><br><br>
    <label>Nội dung:<br>
        <textarea name="noidung" rows="6" cols="60" required><?= htmlspecialchars($noidung) ?></textarea>
    </label><br><br>
    <button type="submit">💾 Lưu</button>
</form>
