<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngành Kinh tế - Ngày 1: Giới thiệu ngành Kinh tế</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        .section {
            margin-bottom: 30px;
        }
        .hidden {
            display: none;
        }
        .btn {
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn:hover {
            opacity: 0.9;
        }
        ul {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Ngành Kinh tế - Ngày 1: Giới thiệu ngành Kinh tế</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
        <p><strong>Ngành Kinh tế</strong> là ngành học nghiên cứu cách con người và xã hội sử dụng các nguồn lực khan hiếm để sản xuất, phân phối và tiêu dùng hàng hóa, dịch vụ.</p>
        <p><strong>Vai trò của ngành Kinh tế:</strong></p>
        <ul>
            <li>Giúp phân tích và dự báo các xu hướng kinh tế.</li>
            <li>Hỗ trợ ra quyết định kinh doanh và hoạch định chính sách.</li>
            <li>Thúc đẩy phát triển bền vững và sử dụng hiệu quả nguồn lực.</li>
        </ul>
        <p><strong>Các lĩnh vực chính trong ngành Kinh tế:</strong></p>
        <ul>
            <li>Kinh tế vi mô: nghiên cứu hành vi của cá nhân, doanh nghiệp.</li>
            <li>Kinh tế vĩ mô: nghiên cứu tổng thể nền kinh tế.</li>
            <li>Tài chính - Ngân hàng.</li>
            <li>Kinh tế quốc tế.</li>
            <li>Quản trị kinh doanh.</li>
            <li>Kinh tế phát triển.</li>
        </ul>
        <p><strong>Ứng dụng thực tế:</strong> Phân tích thị trường, lập kế hoạch tài chính, đánh giá chính sách công, tham gia kinh doanh và đầu tư.</p>
    </div>

    <div class="section">
        <h2>💡 Phần 2: Ví dụ minh họa</h2>
        <p><strong>Bài tập đơn giản:</strong> Viết một đoạn văn ngắn (3-4 câu) giải thích tại sao ngành Kinh tế lại quan trọng trong cuộc sống.</p>
        <textarea rows="5" cols="80" placeholder="Viết đoạn văn của bạn ở đây..."></textarea>
    </div>

    <h2>📝 Phần 3: Trắc nghiệm</h2>
    <form id="quiz-form">
        <div class="question">
            <p><strong>Câu 1:</strong> Ngành Kinh tế nghiên cứu điều gì?</p>
            <label><input type="radio" name="q1" value="a" /> Cách sử dụng nguồn lực khan hiếm để sản xuất và phân phối hàng hóa</label><br />
            <label><input type="radio" name="q1" value="b" /> Cách lập trình phần mềm</label><br />
            <label><input type="radio" name="q1" value="c" /> Thiết kế đồ họa</label><br />
            <label><input type="radio" name="q1" value="d" /> Lập trình hệ thống</label>
        </div>

        <div class="question">
            <p><strong>Câu 2:</strong> Kinh tế vi mô nghiên cứu điều gì?</p>
            <label><input type="radio" name="q2" value="a" /> Hành vi của cá nhân và doanh nghiệp</label><br />
            <label><input type="radio" name="q2" value="b" /> Tổng thể nền kinh tế</label><br />
            <label><input type="radio" name="q2" value="c" /> Tài chính quốc tế</label><br />
            <label><input type="radio" name="q2" value="d" /> Phân tích dữ liệu lớn</label>
        </div>

        <div class="question">
            <p><strong>Câu 3:</strong> Một trong những ứng dụng của ngành Kinh tế là gì?</p>
            <label><input type="radio" name="q3" value="a" /> Phân tích thị trường và hành vi người tiêu dùng</label><br />
            <label><input type="radio" name="q3" value="b" /> Thiết kế website</label><br />
            <label><input type="radio" name="q3" value="c" /> Lập trình game</label><br />
            <label><input type="radio" name="q3" value="d" /> Xử lý ảnh</label>
        </div>

        <div class="question">
            <p><strong>Câu 4:</strong> Kinh tế vĩ mô nghiên cứu điều gì?</p>
            <label><input type="radio" name="q4" value="a" /> Hành vi cá nhân</label><br />
            <label><input type="radio" name="q4" value="b" /> Tổng thể nền kinh tế như GDP, lạm phát</label><br />
            <label><input type="radio" name="q4" value="c" /> Thiết kế đồ họa</label><br />
            <label><input type="radio" name="q4" value="d" /> Tài chính cá nhân</label>
        </div>

        <div class="question">
            <p><strong>Câu 5:</strong> Lĩnh vực nào sau đây không thuộc ngành Kinh tế?</p>
            <label><input type="radio" name="q5" value="a" /> Tài chính - Ngân hàng</label><br />
            <label><input type="radio" name="q5" value="b" /> Quản trị kinh doanh</label><br />
            <label><input type="radio" name="q5" value="c" /> Kỹ thuật phần mềm</label><br />
            <label><input type="radio" name="q5" value="d" /> Kinh tế quốc tế</label>
        </div>

        <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
    </form>

    <div id="results" class="hidden">
        <p id="score"></p>
        <button id="retry" class="btn" onclick="retryQuiz()">Làm lại bài</button>
        <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
        <div id="answer-key-container" class="hidden">
            <ul>
                <li><strong>Câu 1:</strong> a</li>
                <li><strong>Câu 2:</strong> a</li>
                <li><strong>Câu 3:</strong> a</li>
                <li><strong>Câu 4:</strong> b</li>
                <li><strong>Câu 5:</strong> c</li>
            </ul>
        </div>
        <div id="next-day" class="hidden">
            <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp (Ngày 2)</a>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: 'a',
            q2: 'a',
            q3: 'a',
            q4: 'b',
            q5: 'c'
        };

        function submitQuiz() {
            const form = document.forms['quiz-form'];
            let score = 0;
            for (let i = 1; i <= 5; i++) {
                const qName = 'q' + i;
                const options = form[qName];
                let answered = false;
                for (let option of options) {
                    if (option.checked) {
                        answered = true;
                        if (option.value === correctAnswers[qName]) {
                            score++;
                        }
                    }
                }
                if (!answered) {
                    alert(`Vui lòng trả lời câu hỏi ${i}`);
                    return;
                }
            }
            document.getElementById('results').classList.remove('hidden');
            document.getElementById('score').innerText = `Bạn đã trả lời đúng ${score} / 5 câu.`;

            if (score === 5) {
                document.getElementById('next-day').classList.remove('hidden');
                // Đánh dấu hoàn thành Ngày 1 (ví dụ với PHP session)
                <?php $_SESSION['ngay1_hoan_thanh'] = true; ?>
            } else {
                document.getElementById('retry').classList.remove('hidden');
            }
        }

        function retryQuiz() {
            const form = document.forms['quiz-form'];
            form.reset();
            document.getElementById('results').classList.add('hidden');
            document.getElementById('answer-key-container').classList.add('hidden');
            document.getElementById('next-day').classList.add('hidden');
            document.getElementById('retry').classList.add('hidden');
        }

        function toggleAnswerKey() {
            const answerKey = document.getElementById('answer-key-container');
            answerKey.classList.toggle('hidden');
        }
    </script>
</body>
</html>

<?php
include '../../quaylai.php';
load_footer();
?>
