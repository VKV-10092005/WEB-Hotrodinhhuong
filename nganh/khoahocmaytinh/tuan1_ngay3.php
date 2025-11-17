<?php
require '../../site.php';

load_top();
load_menu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngày 3: Kinh tế vĩ mô cơ bản</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        .section { margin-bottom: 30px; }
        .hidden { display: none; }
        .btn { padding: 10px 15px; margin-right: 10px; border: none; background-color: #007BFF; color: white; cursor: pointer; }
        .btn-success { background-color: #28a745; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
<h1>Ngày 3: Kinh tế vĩ mô cơ bản</h1>

<div class="section">
    <h2>🌍 Lý thuyết</h2>
    <p><strong>Kinh tế vĩ mô</strong> (Macroeconomics) là ngành học nghiên cứu về nền kinh tế tổng thể, bao gồm các yếu tố như tổng sản phẩm quốc nội (GDP), lạm phát, thất nghiệp, chính sách tài khóa và chính sách tiền tệ. Khác với kinh tế vi mô – tập trung vào từng cá nhân, doanh nghiệp – kinh tế vĩ mô tập trung vào toàn bộ nền kinh tế quốc gia.</p>

    <p>Một số <strong>chỉ số kinh tế vĩ mô</strong> quan trọng:</p>
    <ul>
        <li><strong>GDP (Tổng sản phẩm quốc nội):</strong> Tổng giá trị tất cả hàng hóa và dịch vụ được sản xuất trong một quốc gia trong một khoảng thời gian nhất định.</li>
        <li><strong>Lạm phát:</strong> Mức độ tăng giá chung của hàng hóa và dịch vụ theo thời gian, ảnh hưởng đến sức mua của người dân.</li>
        <li><strong>Tỷ lệ thất nghiệp:</strong> Tỷ lệ người trong lực lượng lao động nhưng không có việc làm và đang tìm việc.</li>
        <li><strong>Cán cân thương mại:</strong> Chênh lệch giữa giá trị xuất khẩu và nhập khẩu của một quốc gia.</li>
    </ul>

    <p><strong>Chính sách kinh tế vĩ mô:</strong></p>
    <ul>
        <li><strong>Chính sách tài khóa:</strong> Liên quan đến thuế và chi tiêu của chính phủ để điều tiết nền kinh tế.</li>
        <li><strong>Chính sách tiền tệ:</strong> Do ngân hàng trung ương điều hành, nhằm kiểm soát cung tiền, lãi suất và tín dụng để ổn định kinh tế.</li>
    </ul>

    <p><strong>Ví dụ thực tế:</strong> Khi nền kinh tế suy thoái, chính phủ có thể tăng chi tiêu công để tạo việc làm, trong khi ngân hàng trung ương có thể giảm lãi suất để kích thích đầu tư và tiêu dùng. Đây là cách phối hợp giữa chính sách tài khóa và tiền tệ để phục hồi kinh tế.</p>

    <p><strong>Trong ngành Quản trị Kinh doanh</strong>, việc hiểu kinh tế vĩ mô giúp nhà quản lý dự báo xu hướng thị trường, điều chỉnh chiến lược kinh doanh phù hợp với các thay đổi kinh tế như suy thoái, lạm phát hay biến động tỷ giá.</p>
</div>

<h2>📝 Trắc nghiệm</h2>
<form id="quiz-form">
    <div class="question">
        <p><strong>Câu 1:</strong> Kinh tế vĩ mô nghiên cứu điều gì?</p>
        <label><input type="radio" name="q1" value="Nền kinh tế tổng thể"> Nền kinh tế tổng thể</label><br>
        <label><input type="radio" name="q1" value="Hành vi của từng cá nhân"> Hành vi của từng cá nhân</label><br>
        <label><input type="radio" name="q1" value="Chi phí sản xuất của từng doanh nghiệp"> Chi phí sản xuất của từng doanh nghiệp</label>
    </div>

    <div class="question">
        <p><strong>Câu 2:</strong> GDP đo lường điều gì?</p>
        <label><input type="radio" name="q2" value="Tổng giá trị hàng hóa và dịch vụ được sản xuất trong nước"> Tổng giá trị hàng hóa và dịch vụ được sản xuất trong nước</label><br>
        <label><input type="radio" name="q2" value="Thu nhập của từng người lao động"> Thu nhập của từng người lao động</label><br>
        <label><input type="radio" name="q2" value="Lượng tiền trong ngân hàng"> Lượng tiền trong ngân hàng</label>
    </div>

    <div class="question">
        <p><strong>Câu 3:</strong> Chính sách tiền tệ được điều hành bởi ai?</p>
        <label><input type="radio" name="q3" value="Ngân hàng trung ương"> Ngân hàng trung ương</label><br>
        <label><input type="radio" name="q3" value="Bộ Giáo dục"> Bộ Giáo dục</label><br>
        <label><input type="radio" name="q3" value="Các công ty tư nhân"> Các công ty tư nhân</label>
    </div>

    <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
</form>

<div id="results" class="hidden">
    <p id="score"></p>
    <button id="retry" class="btn hidden" onclick="retryQuiz()">Làm lại bài</button>
    <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
    <div id="answer-key-container" class="hidden" style="margin-top: 10px;">
        <ul>
            <li><strong>Câu 1:</strong> Nền kinh tế tổng thể</li>
            <li><strong>Câu 2:</strong> Tổng giá trị hàng hóa và dịch vụ được sản xuất trong nước</li>
            <li><strong>Câu 3:</strong> Ngân hàng trung ương</li>
        </ul>
    </div>
    <div id="next-day" class="hidden" style="margin-top: 20px;">
        <a href="tuan1_ngay4.php" class="btn btn-success">▶️ Học tiếp (Ngày 4)</a>
    </div>
</div>

<script>
    const correctAnswers = {
        q1: "Nền kinh tế tổng thể",
        q2: "Tổng giá trị hàng hóa và dịch vụ được sản xuất trong nước",
        q3: "Ngân hàng trung ương"
    };

    function submitQuiz() {
        let score = 0;
        const form = document.forms['quiz-form'];
        for(let i = 1; i <= 3; i++) {
            const answer = form[`q${i}`].value;
            if(answer === correctAnswers[`q${i}`]) score++;
        }

        document.getElementById('results').classList.remove('hidden');
        document.getElementById('score').innerText = `Bạn đã trả lời đúng ${score} / 3 câu.`;

        if(score === 3) {
            document.getElementById('next-day').classList.remove('hidden');
            document.getElementById('retry').classList.add('hidden');
            <?php $_SESSION['ngay3_qtkd_done'] = true; ?>
        } else {
            document.getElementById('retry').classList.remove('hidden');
            document.getElementById('next-day').classList.add('hidden');
        }
    }

    function retryQuiz() {
        const form = document.forms['quiz-form'];
        form.reset();
        document.getElementById('results').classList.add('hidden');
        document.getElementById('answer-key-container').classList.add('hidden');
        document.getElementById('retry').classList.add('hidden');
        document.getElementById('next-day').classList.add('hidden');
    }

    function toggleAnswerKey() {
        document.getElementById('answer-key-container').classList.toggle('hidden');
    }
</script>

</body>
</html>

<?php
include '../../quaylai.php';
load_footer();
?>
