<?php
require '../../site.php';
load_top();
//load_menu();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tài nguyên học tập - Mạng Máy Tính</title>
</head>
<body>
<div class="container" style="padding: 20px;">

    <h2>📘 Tài nguyên học tập - Mạng Máy Tính</h2>

    <h3>🌟 Giới thiệu sơ lược về ngành Mạng Máy Tính</h3>
    <p><b>Mạng Máy Tính</b> là ngành chuyên nghiên cứu về thiết kế, triển khai và quản lý các hệ thống mạng máy tính, từ mạng LAN, WAN đến mạng diện rộng Internet. Ngành học tập trung vào việc kết nối các thiết bị, truyền tải dữ liệu và đảm bảo an toàn thông tin trong môi trường mạng.</p>

    <p>Người học sẽ được trang bị kiến thức về các giao thức mạng (TCP/IP, HTTP, FTP…), thiết kế và quản lý mạng, bảo mật mạng, cấu hình các thiết bị mạng như router, switch và kiến thức về điện toán đám mây.</p>

    <p>Ngành Mạng Máy Tính đòi hỏi bạn phải có <b>tư duy logic, khả năng xử lý sự cố, kỹ năng lập trình cơ bản</b> và sự kiên nhẫn trong công việc.</p>

    <h3>⚙️ Cách học hiệu quả và điểm cần nỗ lực:</h3>
    <ul>
        <li><b>Hiểu sâu các giao thức mạng:</b> TCP/IP, DNS, DHCP, HTTP, HTTPS, VPN, v.v.</li>
        <li><b>Thực hành cấu hình thiết bị mạng:</b> Router, Switch, Firewall thông qua các phần mềm mô phỏng như Cisco Packet Tracer, GNS3.</li>
        <li><b>Rèn luyện kỹ năng bảo mật mạng:</b> Tìm hiểu về tường lửa, mã hóa, chống tấn công DDoS, xác thực người dùng.</li>
        <li><b>Cập nhật xu hướng công nghệ mới:</b> Điện toán đám mây, mạng 5G, mạng IoT.</li>
        <li><b>Phát triển kỹ năng lập trình cơ bản:</b> Python, Shell Script để tự động hóa quản lý mạng.</li>
    </ul>

    <h3>💼 Cơ hội nghề nghiệp ngành Mạng Máy Tính</h3>
    <ul>
        <li>Kỹ sư mạng (Network Engineer)</li>
        <li>Quản trị mạng (Network Administrator)</li>
        <li>Chuyên gia bảo mật mạng (Network Security Specialist)</li>
        <li>Kỹ sư hệ thống (System Engineer)</li>
        <li>Chuyên viên hỗ trợ kỹ thuật (Technical Support Engineer)</li>
    </ul>

    <h3>📚 Tài liệu học tập cần cho ngành Mạng Máy Tính</h3>
    <ul>
        <li><a href="https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/entry/ccna.html" target="_blank">Cisco CCNA Certification</a></li>
        <li><a href="https://www.udemy.com/course/complete-networking-fundamentals-course-ccna-start/" target="_blank">Complete Networking Fundamentals Course (Udemy)</a></li>
        <li><a href="https://www.coursera.org/learn/computer-networking" target="_blank">Computer Networking (Coursera)</a></li>
        <li><a href="https://www.juniper.net/documentation/en_US/junos/topics/concept/junos-overview.html" target="_blank">Juniper Networks Documentation</a></li>
    </ul>

    <h3>📖 Sách tham khảo nâng cao</h3>
    <ul>
        <li>Computer Networking: A Top-Down Approach – Kurose & Ross</li>
        <li>Network Warrior – Gary A. Donahue</li>
        <li>TCP/IP Illustrated – W. Richard Stevens</li>
        <li>CCNA Routing and Switching Study Guide – Todd Lammle</li>
    </ul>

    <h3>🌟 Cộng đồng và nguồn cập nhật</h3>
    <ul>
        <li><a href="https://www.reddit.com/r/networking/" target="_blank">Reddit - Networking</a></li>
        <li><a href="https://networkengineering.stackexchange.com/" target="_blank">Network Engineering Stack Exchange</a></li>
        <li><a href="https://packetlife.net/" target="_blank">PacketLife.net</a></li>
        <li><a href="https://www.spiceworks.com/networking/" target="_blank">Spiceworks Networking Community</a></li>
    </ul>
	<h3>📚 Tài liệu PDF</h3>
    <?php
    $conn = new mysqli("localhost", "root", "123456", "tainguyenhoctap");
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT filename FROM tailieu WHERE chuyennganh = 'mmt' ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li><a href='../uploads/tainguyen_mmt/{$row['filename']}' target='_blank'>📄 {$row['filename']}</a></li>";
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
