<?php
require '../site.php';
load_top();
//load_menu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ngành Công Nghệ Thông Tin</title>
    <link rel="stylesheet" href="cntt.css">
    <style>
        .chuyen-nganh-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
        }

        .nganh-box {
            background-color: #f0f8ff;
            border: 2px solid #007BFF;
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
    <div id="if1f2">
        <h2 style="color: red;">Ngành Công Nghệ Thông Tin 💻</h2>
        <img src="logo/logo.png" width="90" style="display:block; margin: 10px auto;">
    </div>

    <div style="font-style: italic; font-size: 15px;">
        <p><b>- Công nghệ Thông tin (Information Technology - IT):</b> là ngành học nghiên cứu về việc sử dụng máy tính, phần mềm và mạng để thu thập, lưu trữ, xử lý và truyền tải thông tin. CNTT là một trong những ngành học phát triển nhanh nhất và đóng vai trò rất quan trọng trong xã hội hiện đại.</p>
        <p><b>- Công Nghệ Thông Tin</b> chia thành 4 chuyên ngành:</p>
        <ul style="padding-left: 70px;">
            <li>Công Nghệ Phần Mềm</li>
            <li>Trí Tuệ Nhân Tạo</li>
            <li>Hệ Thống Thông Tin</li>
            <li>Mạng Máy Tính</li>
        </ul>
        <p><b>- Nội dung học tập chính:</b> lập trình, thiết kế phần mềm, quản trị mạng, cơ sở dữ liệu, bảo mật thông tin, trí tuệ nhân tạo, phát triển ứng dụng web và 
            di động, điện toán đám mây, Big Data...</p>
        <p><b>- Cơ hội nghề nghiệp:</b> kỹ sư phần mềm, quản trị mạng, chuyên viên phân tích dữ liệu, kỹ sư bảo mật, phát triển ứng dụng, quản lý dự án CNTT, và nhiều 
            vị trí khác trong các công ty công nghệ, tổ chức tài chính, chính phủ, doanh nghiệp.</p>
        <p><b>- Ý nghĩa:</b> Công nghệ Thông tin không chỉ là ngành học của tương lai mà còn là sức mạnh thay đổi thế giới hôm nay. Từ việc kết nối con người khắp mọi 
            nơi đến việc tạo ra những giải pháp sáng tạo giúp giải quyết các thách thức lớn nhất của xã hội, CNTT mở ra vô vàn cơ hội cho những ai đam mê khám phá và sáng tạo. 
            Học CNTT là bạn đang góp phần xây dựng một thế giới thông minh, hiện đại và phát triển bền vững.</p>
    </div>

    <p>Dưới đây là các tài liệu và liên kết hữu ích cho ngành CNTT:</p>

    <p>🔗 Link tổng hợp các ngôn ngữ lập trình:</p>
    <ul>
        <li><a href="https://www.w3schools.com/" target="_blank">W3Schools</a></li>
    </ul>

    <h3>📘 Lập trình</h3>
    <ul>
        <p><b>- Lập trình:</b> là quá trình viết mã để hướng dẫn máy tính thực hiện các nhiệm vụ cụ thể. Đây là chìa khóa để xây dựng phần mềm, trang web, ứng dụng di động, trò chơi và trí tuệ nhân tạo...</p>
        <p>🔗 Một số Web minh họa:</p>
        <li><a href="https://cplusplus.com/doc/tutorial/" target="_blank">Học C++ từ cơ bản đến nâng cao</a></li>
        <li><a href="https://www.w3schools.com/php/" target="_blank">Học PHP cơ bản - W3Schools</a></li>
        <li><a href="https://www.learncpp.com/" target="_blank">LearnCPP.com</a></li>
        <li><a href="https://www.w3schools.com/js/" target="_blank">JavaScript - W3Schools</a></li>
    </ul>

    <h3>🗃 Cơ sở dữ liệu</h3>
    <ul>
        <p><b>- Cơ Sở Dữ Liệu:</b> là tập hợp có tổ chức các dữ liệu có liên quan, được lưu trữ và quản lý hiệu quả thông qua hệ quản trị như MySQL, SQL Server, Oracle, PostgreSQL...</p>
        <li><a href="https://www.mysqltutorial.org/" target="_blank">MySQL Tutorial</a></li>
        <li><a href="https://www.w3schools.com/sql/" target="_blank">SQL cơ bản - W3Schools</a></li>
    </ul>

    <h3>🕸️ Web Development</h3>
    <ul>
        <p><b>- Web Development:</b> là quá trình xây dựng các trang web gồm frontend (HTML, CSS, JS) và backend (PHP, Python, Node.js...). Đây là kỹ năng quan trọng trong thời đại số.</p>
        <li><a href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank">HTML - MDN</a></li>
        <li><a href="https://developer.mozilla.org/en-US/docs/Web/CSS" target="_blank">CSS - MDN</a></li>
    </ul>

    <h3>📚 Tài liệu Ngành</h3>
    <ul>
			<li><a href="https://sites.google.com/view/hophuclam-it-iuh/tai-lieu-hoc-tap/cntt?authuser=0" target="_blank">Nội dung cần biết</a></li>
		</ul>
</div>
<h3 style="margin-top: 40px;">📂 Chọn chuyên ngành bạn muốn tìm hiểu:</h3>

<div class="chuyen-nganh-grid">
    <a href="chuyennganh/cnpm.php" class="nganh-box" style="background-color: #e3f2fd;">
        <div style="font-size: 40px;">💻</div>
        <h4>Công Nghệ Phần Mềm</h4>
    </a>
    <a href="chuyennganh/ai.php" class="nganh-box" style="background-color: #fce4ec;">
        <div style="font-size: 40px;">🧠</div>
        <h4>Trí Tuệ Nhân Tạo</h4>
    </a>
    <a href="chuyennganh/httt.php" class="nganh-box" style="background-color: #e8f5e9;">
        <div style="font-size: 40px;">🗃️</div>
        <h4>Hệ Thống Thông Tin</h4>
    </a>
    <a href="chuyennganh/mmt.php" class="nganh-box" style="background-color: #fff3e0;">
        <div style="font-size: 40px;">🌐</div>
        <h4>Mạng Máy Tính</h4>
    </a>
</div>

</body>
</html>

<?php 
include '../quaylai.php'; 
load_footer();
?>