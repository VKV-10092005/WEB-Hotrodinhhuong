<?php
require 'site.php';
load_top();
//load_menu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Trang Dự Án - Web Hỗ Trợ Định Hướng Bản Thân</title>
  <link rel="stylesheet" href="CSS/cssDuAn.css" />
</head>
<body>
  <header>
    <h1>Web Hỗ Trợ Định Hướng Bản Thân</h1>
  </header>
  <main>
    <section id="gioi-thieu">
      <h2>🎯 Giới thiệu dự án</h2>
      <p><span class="highlight">Tên dự án:</span> Web Hỗ Trợ Định Hướng Bản Thân</p>
      <p><span class="highlight">Mục tiêu:</span> Giúp người dùng khám phá tính cách, xác định ngành nghề phù hợp, xây dựng lộ trình học tập rõ ràng và theo dõi tiến độ phát triển bản thân.</p>
    </section>

    <section id="chuc-nang">
      <h2>🔧 Các chức năng chính</h2>
      <ul>
        <li><strong>Trang kiểm tra tính cách & sở thích nghề nghiệp:</strong> Trắc nghiệm MBTI/RIASEC, phân tích kết quả, gợi ý ngành nghề phù hợp.</li>
        <li><strong>Trang kết quả & phân tích:</strong> Đề xuất ngành nghề dựa trên kết quả, cho phép người dùng chọn hoặc nhập ngành nghề mong muốn.</li>
        <li><strong>Trang lộ trình phát triển kỹ năng:</strong> Hiển thị kỹ năng cần học theo ngành, nội dung giảng dạy chi tiết theo ngày/tuần, tài nguyên học tập kèm theo.</li>
        <li><strong>Trang theo dõi tiến độ:</strong> Lưu tiến độ học tập, tính phần trăm hoàn thành, đánh giá và ghi nhận kết quả học.</li>
        <li><strong>Chế độ offline:</strong> Cho phép truy cập nội dung đã lưu khi không có mạng.</li>
      </ul>
    </section>

    <section id="cong-nghe">
      <h2>💻 Công nghệ sử dụng</h2>
      <ul>
        <li>Front-end: HTML, CSS, JavaScript, ReactJS</li>
        <li>Back-end: NodeJS / ExpressJS</li>
        <li>Cơ sở dữ liệu: MongoDB / Firebase</li>
        <li>Tính năng offline: Service Worker (PWA)</li>
        <li>Triển khai: Vercel / Firebase Hosting</li>
      </ul>
    </section>

    <section id="gia-tri">
      <h2>💡 Giá trị mang lại</h2>
      <ul>
        <li>Giúp người học tiết kiệm thời gian tìm kiếm tài nguyên.</li>
        <li>Định hướng rõ ràng ngành học và phát triển bản thân.</li>
        <li>Theo dõi và đánh giá tiến độ học tập dễ dàng.</li>
        <li>Giao diện dễ sử dụng cho mọi lứa tuổi.</li>
      </ul>
    </section>

    <section id="doi-tuong">
      <h2>📌 Đối tượng sử dụng</h2>
      <ul>
        <li>Học sinh, sinh viên.</li>
        <li>Người đang tìm hướng đi nghề nghiệp.</li>
        <li>Người muốn học kỹ năng mới có định hướng rõ ràng.</li>
      </ul>
    </section>

    <section id="ke-hoach">
      <h2>📈 Kế hoạch phát triển trong tương lai</h2>
      <ul>
        <li>Tích hợp AI gợi ý lộ trình học tự động.</li>
        <li>Kết nối cộng đồng học tập & mentor.</li>
        <li>Hệ thống đánh giá năng lực người dùng theo từng kỹ năng.</li>
      </ul>
    </section>
  </main>
  <footer>
    &copy; 2025 Võ Kế Vương. All rights reserved.
  </footer>
</body>

</html>

<?php include 'quaylai.php'; ?>

<?php
load_footer();
?>
