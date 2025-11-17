<?php
require '../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ngành Trí Tuệ Nhân Tạo</title>
    <link rel="stylesheet" href="../cntt.css">
    <style>
        .chuyen-nganh-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
        }

        .nganh-box {
            background-color: #fce4ec;
            border: 2px solid #e91e63;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
<div class="container" style="padding: 20px;">
    <h2 style="color: #e91e63;">🧠 Ngành Trí Tuệ Nhân Tạo</h2>
    <img src="../logo/logo.png" width="90" style="display:block; margin: 10px auto;">

    <div style="font-style: italic; font-size: 15px;">
        <p><b>- Trí Tuệ Nhân Tạo (Artificial Intelligence - AI):</b> là ngành học nghiên cứu và phát triển các hệ thống có khả năng mô phỏng trí thông minh của con người như học hỏi, lập luận, giải quyết vấn đề, hiểu ngôn ngữ và cảm nhận môi trường.</p>

        <p><b>- Ngành Trí Tuệ Nhân Tạo</b> gồm nhiều chuyên ngành nhỏ, mỗi chuyên ngành tập trung vào một lĩnh vực ứng dụng cụ thể của AI:</p>
        <ul style="padding-left: 70px;">
            <li>Học Máy (Machine Learning)</li>
            <li>Thị Giác Máy Tính (Computer Vision)</li>
            <li>Xử Lý Ngôn Ngữ Tự Nhiên (Natural Language Processing - NLP)</li>
            <li>Robot và Điều Khiển Tự Động</li>
            <li>AI trong Trò Chơi và Mô phỏng</li>
        </ul>

        <p><b>- Nội dung học tập chính:</b> đại số tuyến tính, xác suất thống kê, Python, mô hình học máy, học sâu (deep learning), mạng nơ-ron nhân tạo, thị giác máy tính, xử lý ảnh, xử lý ngôn ngữ tự nhiên, mô phỏng, thuật toán AI,...</p>

        <p><b>- Cơ hội nghề nghiệp:</b> kỹ sư AI, chuyên viên học máy, nhà khoa học dữ liệu, chuyên viên NLP, kỹ sư thị giác máy tính, kỹ sư Robotics, AI Product Manager... Làm việc tại các công ty công nghệ, viện nghiên cứu, trung tâm dữ liệu, startup AI, v.v.</p>

        <p><b>- Vai trò và ý nghĩa:</b> AI đang tạo ra những thay đổi sâu rộng trong mọi lĩnh vực: y tế, giáo dục, tài chính, giao thông, công nghiệp, giải trí... Học ngành Trí Tuệ Nhân Tạo là nắm bắt cơ hội làm chủ công nghệ của tương lai, đóng góp vào sự phát triển của một xã hội thông minh hơn, tự động hóa hơn và hiệu quả hơn.</p>
    </div>

    <h3 style="margin-top: 30px;">📂 Các chuyên ngành trong ngành Trí Tuệ Nhân Tạo:</h3>

    <div class="chuyen-nganh-grid">
        <!-- <a href="ai/ml.php" class="nganh-box"> -->
            <a  class="nganh-box">
            <div style="font-size: 35px;">📊</div>
            <h4>Học Máy (Machine Learning)</h4>
        </a>
        <a class="nganh-box">
            <div style="font-size: 35px;">📷</div>
            <h4>Thị Giác Máy Tính</h4>
        </a>
        <a  class="nganh-box">
            <div style="font-size: 35px;">🗣️</div>
            <h4>Xử Lý Ngôn Ngữ Tự Nhiên</h4>
        </a>
        <a  class="nganh-box">
            <div style="font-size: 35px;">🤖</div>
            <h4>Robot & Điều Khiển</h4>
        </a>
        <a  class="nganh-box">
            <div style="font-size: 35px;">🎮</div>
            <h4>AI trong Trò Chơi</h4>
        </a>
    </div>
</div>

</body>
</html>

<?php 
include '../quaylai.php'; 
load_footer();
?>
