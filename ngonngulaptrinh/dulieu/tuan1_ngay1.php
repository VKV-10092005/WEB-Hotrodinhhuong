<?php
require '../../site.php';

load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngày 1: Giới thiệu về lập trình và thuật toán</title>
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
<h1>Ngày 1: Tổng quan ngành Khoa học Máy tính</h1>

    <div class="section">
        <h2>🌟 Lý thuyết</h2>
        <p>Khoa học Máy tính (Computer Science - CS) là ngành học nghiên cứu về lý thuyết, thiết kế, phát triển và ứng dụng của các hệ thống tính toán.</p>
        <p>Ngành CS bao gồm nhiều lĩnh vực:</p>
        <ul>
            <li>Lập trình phần mềm</li>
            <li>Trí tuệ nhân tạo (AI) và học máy</li>
            <li>Phát triển game</li>
            <li>Phát triển ứng dụng di động</li>
            <li>Cơ sở dữ liệu và quản lý dữ liệu</li>
            <li>Hệ điều hành và mạng máy tính</li>
            <li>Robot và tự động hóa</li>
            <li>Bảo mật thông tin</li>
        </ul>
        <p>Cơ hội nghề nghiệp đa dạng như lập trình viên, kỹ sư phần mềm, nhà khoa học dữ liệu, chuyên viên an ninh mạng, kỹ sư AI, v.v.</p>
    </div>

<h2>📝 Trắc nghiệm</h2>
<form id="quiz-form">
    <div class="question">
        <p><strong>Câu 1:</strong> Lập trình là gì?</p>
        <label><input type="radio" name="q1" value="Viết mã lệnh cho máy tính"> Viết mã lệnh cho máy tính</label><br>
        <label><input type="radio" name="q1" value="Thiết kế phần cứng"> Thiết kế phần cứng</label><br>
        <label><input type="radio" name="q1" value="Chơi game"> Chơi game</label>
    </div>

    <div class="question">
        <p><strong>Câu 2:</strong> Thuật toán là gì?</p>
        <label><input type="radio" name="q2" value="Tập hợp các bước rõ ràng để giải quyết vấn đề"> Tập hợp các bước rõ ràng để giải quyết vấn đề</label><br>
        <label><input type="radio" name="q2" value="Một ngôn ngữ lập trình"> Một ngôn ngữ lập trình</label><br>
        <label><input type="radio" name="q2" value="Phần mềm máy tính"> Phần mềm máy tính</label>
    </div>

    <div class="question">
        <p><strong>Câu 3:</strong> Lập trình giúp gì cho thuật toán?</p>
        <label><input type="radio" name="q3" value="Biến thuật toán thành mã lệnh"> Biến thuật toán thành mã lệnh</label><br>
        <label><input type="radio" name="q3" value="Tạo ra phần cứng"> Tạo ra phần cứng</label><br>
        <label><input type="radio" name="q3" value="Chơi game"> Chơi game</label>
    </div>

    <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
</form>

<div id="results" class="hidden">
    <p id="score"></p>
    <button id="retry" class="btn hidden" onclick="retryQuiz()">Làm lại bài</button>
    <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
    <div id="answer-key-container" class="hidden" style="margin-top: 10px;">
        <ul>
            <li><strong>Câu 1:</strong> Viết mã lệnh cho máy tính</li>
            <li><strong>Câu 2:</strong> Tập hợp các bước rõ ràng để giải quyết vấn đề</li>
            <li><strong>Câu 3:</strong> Biến thuật toán thành mã lệnh</li>
        </ul>
    </div>
    <div id="next-day" class="hidden" style="margin-top: 20px;">
        <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp (Ngày 2)</a>
    </div>
</div>

<script>
    const correctAnswers = {
        q1: "Viết mã lệnh cho máy tính",
        q2: "Tập hợp các bước rõ ràng để giải quyết vấn đề",
        q3: "Biến thuật toán thành mã lệnh"
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
            <?php $_SESSION['ngay1_hoan_thanh'] = true; ?>
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
