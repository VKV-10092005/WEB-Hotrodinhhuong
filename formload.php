<?php
require 'site.php';
load_top();
//load_menu();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload Tài Liệu PDF</title>
</head>
<body>

<h2><span style = "color: blue">📤 Upload Tài Liệu PDF</span></h2>

<form action="tainguyenhoctap/uploads/upload.php" method="post" enctype="multipart/form-data">
    <label> Chọn file PDF:</label>
    <input type="file" name="pdf_file" accept="application/pdf" required><br><br>

    <label>Chọn chuyên ngành:</label>
    <select name="chuyennganh" required>
        <option value="httt">Hệ Thống Thông Tin</option>
        <option value="cnpm">Công Nghệ Phần Mềm</option>
        <option value="khmt">Khoa Học Máy Tính</option>
        <option value="mmt">Mạng Máy Tính</option>
    </select>

    <input type="submit" name="upload" value="Tải lên">
</form>

</body>
</html>

<?php include 'quaylai.php'; ?>

<?php
load_footer();
?>
