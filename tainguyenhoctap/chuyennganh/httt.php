<?php
require '../../site.php';
load_top();
//load_menu();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tài nguyên học tập - Hệ Thống Thông Tin</title>
</head>
<body>
<div class="container" style="padding: 20px;">

    <h2>📘 Tài nguyên học tập - Hệ Thống Thông Tin</h2>

    <h3>🌟 Giới thiệu sơ lược về ngành Hệ Thống Thông Tin (HTTT)</h3>
    <p><b>Hệ Thống Thông Tin</b> là ngành nghiên cứu cách thiết kế, triển khai và quản lý các hệ thống công nghệ thông tin hỗ trợ hoạt động kinh doanh và quản lý trong tổ chức. Ngành học kết hợp giữa công nghệ phần cứng, phần mềm và kiến thức quản trị để tạo ra các giải pháp hiệu quả cho doanh nghiệp.</p>

    <p>Người học ngành này sẽ được trang bị kiến thức về cơ sở dữ liệu, phân tích hệ thống, quản trị mạng, an ninh thông tin, và phát triển phần mềm phục vụ quản lý thông tin. Bạn cũng sẽ học cách tích hợp công nghệ vào các quy trình và hoạt động kinh doanh.</p>

    <p>Để thành công trong ngành HTTT, bạn cần có <b>tư duy phân tích, kỹ năng quản lý dự án, khả năng làm việc nhóm</b> và luôn cập nhật công nghệ mới.</p>

    <p>Ngành HTTT mở ra nhiều cơ hội nghề nghiệp như chuyên viên phân tích hệ thống, quản trị mạng, quản lý dự án CNTT, chuyên gia bảo mật, kỹ sư phát triển phần mềm, và tư vấn công nghệ thông tin.</p>

    <h3>⚙️ Cách học hiệu quả và điểm cần nỗ lực:</h3>
    <ul>
        <li><b>Học kiến thức nền tảng:</b> Cơ sở dữ liệu, mạng máy tính, lập trình, và kiến thức quản trị.</li>
        <li><b>Rèn luyện kỹ năng phân tích và thiết kế hệ thống:</b> Học cách đọc và viết tài liệu phân tích yêu cầu, thiết kế luồng dữ liệu, mô hình hóa hệ thống.</li>
        <li><b>Thực hành trên dự án thực tế:</b> Tham gia dự án để hiểu cách tích hợp công nghệ và giải quyết vấn đề trong môi trường doanh nghiệp.</li>
        <li><b>Cập nhật công nghệ mới:</b> Luôn theo dõi xu hướng về điện toán đám mây, an ninh mạng, và hệ thống ERP.</li>
        <li><b>Kỹ năng mềm:</b> Giao tiếp, làm việc nhóm và quản lý thời gian rất quan trọng trong ngành này.</li>
    </ul>

    <h3>🌐 Tài liệu học tập cần cho ngành Hệ Thống Thông Tin</h3>
    <ul>
        <li><a href="https://www.coursera.org/specializations/information-systems" target="_blank">Specialization in Information Systems (Coursera)</a></li>
        <li><a href="https://www.edx.org/course/introduction-to-computer-science" target="_blank">Introduction to Computer Science (edX)</a></li>
        <li><a href="https://www.udemy.com/course/database-design/" target="_blank">Database Design and Management (Udemy)</a></li>
        <li><a href="https://docs.microsoft.com/en-us/learn/paths/azure-fundamentals/" target="_blank">Microsoft Azure Fundamentals</a></li>
        <li><a href="https://www.ibm.com/security" target="_blank">IBM Cybersecurity Resources</a></li>
    </ul>

    <h3>💼 Cơ hội nghề nghiệp ngành Hệ Thống Thông Tin</h3>
    <ul>
        <li>Chuyên viên phân tích hệ thống (System Analyst)</li>
        <li>Quản trị mạng và hệ thống (Network/System Administrator)</li>
        <li>Quản lý dự án CNTT (IT Project Manager)</li>
        <li>Chuyên gia an ninh mạng (Cybersecurity Specialist)</li>
        <li>Kỹ sư phát triển phần mềm (Software Developer)</li>
        <li>Tư vấn công nghệ thông tin (IT Consultant)</li>
    </ul>

    <h3>📚 Sách tham khảo nâng cao</h3>
    <ul>
        <li>Management Information Systems – Kenneth C. Laudon & Jane P. Laudon</li>
        <li>Systems Analysis and Design – Alan Dennis, Barbara Haley Wixom</li>
        <li>Computer Networking: A Top-Down Approach – Kurose & Ross</li>
        <li>Database System Concepts – Abraham Silberschatz</li>
    </ul>

    <h3>🌟 Cộng đồng và nguồn cập nhật</h3>
    <ul>
        <li><a href="https://www.reddit.com/r/sysadmin/" target="_blank">Reddit - Sysadmin</a></li>
        <li><a href="https://www.spiceworks.com/" target="_blank">Spiceworks Community</a></li>
        <li><a href="https://www.cisecurity.org/" target="_blank">Center for Internet Security</a></li>
        <li><a href="https://stackoverflow.com/questions/tagged/information-systems" target="_blank">Stack Overflow - Information Systems</a></li>
    </ul>
	
	    <h3>📚 Tài liệu PDF</h3>
    <?php
    $conn = new mysqli("localhost", "root", "123456", "tainguyenhoctap");
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT filename FROM tailieu WHERE chuyennganh = 'httt' ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='../uploads/tainguyen_httt/{$row['filename']}' target='_blank'>📄 {$row['filename']}</a></li>";
        }
    } else {
        echo "<p>⚠️ Chưa có tài liệu nào cho chuyên ngành này.</p>";
    }
    ?>
	

</div>
</body>
</html>
<?php
include '../../quaylai.php';
load_footer();
?>
