<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Ngày 3 - Chưa có dữ liệu</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        text-align: center;
        color: #555;
    }
    .notice {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
        padding: 20px;
        border-radius: 8px;
        display: inline-block;
        font-size: 18px;
        margin-top: 50px;
    }
    a.btn {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    a.btn:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <div class="notice">
        <p>Ngày 3 hiện chưa có dữ liệu.</p>
        <a href="tuan1_ngay2.php" class="btn">◀️ Quay lại Ngày 2</a>
    </div>
</body>
</html>

<?php
include '../../quaylai.php';
load_footer();
?>
