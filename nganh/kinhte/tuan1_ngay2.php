<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngành Kinh tế - Ngày 2: Các khái niệm cơ bản trong kinh tế học</title>
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
    <h1>Ngành Kinh tế - Ngày 2: Các khái niệm cơ bản trong kinh tế học</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
        <p><strong>1. Nhu cầu (Demand):</strong> Là lượng hàng hóa hoặc dịch vụ mà người tiêu dùng sẵn sàng và có khả năng mua ở các mức giá khác nhau trong một khoảng thời gian nhất định.</p>
        <p><strong>2. Cung cấp (Supply):</strong> Là lượng hàng hóa hoặc dịch vụ mà nhà sản xuất muốn và có thể bán ra thị trường ở các mức giá khác nhau trong cùng khoảng thời gian.</p>
        <p><strong>3. Giá cả (Price):</strong> Là số tiền cần thiết để đổi lấy một đơn vị hàng hóa hoặc dịch vụ.</p>
        <p><strong>4. Thị trường (Market):</strong> Là nơi gặp gỡ giữa người mua và người bán để trao đổi hàng hóa và dịch vụ.</p>
        <p><strong>5. Cân bằng thị trường (Market equilibrium):</strong> Là trạng thái khi lượng cầu bằng lượng cung tại một mức giá nhất định.</p>
    </div>

    <div class="section">
        <h2>💡 Phần 2: Ví dụ minh họa</h2>
        <p><strong>Ví dụ:</strong> Nếu giá một chiếc bánh mì tăng lên, người tiêu dùng có xu hướng mua ít hơn, đó là hiện tượng giảm cầu theo giá.</p>
        <p>Ngược lại, nếu giá giảm, cầu sẽ tăng lên.</p>
    </div>

    <h2>📝 Phần 3: Trắc nghiệm</h2>
    <form id="quiz-form">
        <div class="question">
            <p><strong>Câu 1:</strong> Nhu cầu là gì?</p>
            <label><input type="radio" name="q1" value="a" /> Lượng hàng hóa người tiêu dùng muốn mua ở các mức giá khác nhau</label><br />
            <label><input type="radio" name="q1" value="b" /> Lượng hàng hóa nhà sản xuất muốn bán</label><br />
            <label><input type="radio" name="q1" value="c" /> Giá cả của hàng hóa</label><br />
            <label><input type="radio" name="q1" value="d" /> Nơi mua bán hàng hóa</label>
        </div>

        <div class="question">
            <p><strong>Câu 2:</strong> Cung cấp là gì?</p>
            <label><input type="radio" name="q2" value="a" /> Nơi trao đổi hàng hóa</label><br />
            <label><input type="radio" name="q2" value="b" /> Lượng hàng hóa nhà sản xuất muốn bán ở các mức giá khác nhau</label><br />
            <label><input type="radio" name="q2" value="c" /> Giá cả hàng hóa</label><br />
            <label><input type="radio" name="q2" value="d" /> Lượng hàng hóa người tiêu dùng mua</label>
        </div>

        <div class="question">
            <p><strong>Câu 3:</strong> Cân bằng thị trường xảy ra khi nào?</p>
            <label><input type="radio" name="q3" value="a" /> Lượng cung lớn hơn lượng cầu</label><br />
            <label><input type="radio" name="q3" value="b" /> Lượng cầu lớn hơn lượng cung</label><br />
            <label><input type="radio" name="q3" value="c" /> Lượng cầu bằng lượng cung tại một mức giá</label><br />
            <label><input type="radio" name="q3" value="d" /> Giá cả hàng hóa bằng 0</label>
        </div>

        <div class="question">
            <p><strong>Câu 4:</strong> Giá cả là gì?</p>
            <label><input type="radio" name="q4" value="a" /> Nơi trao đổi hàng hóa</label><br />
            <label><input type="radio" name="q4" value="b" /> Số tiền cần thiết để đổi lấy một đơn vị hàng hóa</label><br />
            <label><input type="radio" name="q4" value="c" /> Lượng hàng hóa cung cấp</label><br />
            <label><input type="radio" name="q4" value="d" /> Lượng hàng hóa cầu</label>
        </div>

        <div class="question">
            <p><strong>Câu 5:</strong> Ví dụ về giảm cầu theo giá là gì?</p>
            <label><input type="radio" name="q5" value="a" /> Giá tăng, người tiêu dùng mua ít đi</label><br />
            <label><input type="radio" name="q5" value="b" /> Giá tăng, người tiêu dùng mua nhiều hơn</label><br />
            <label><input type="radio" name="q5" value="c" /> Giá giảm, người tiêu dùng mua ít đi</label><br />
            <label><input type="radio" name="q5" value="d" /> Giá giảm, người tiêu dùng mua ít hơn</label>
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
                <li><strong>Câu 2:</strong> b</li>
                <li><strong>Câu 3:</strong> c</li>
                <li><strong>Câu 4:</strong> b</li>
                <li><strong>Câu 5:</strong> a</li>
            </ul>
        </div>
        <div id="next-day" class="hidden">
            <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp (Ngày 3)</a>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: 'a',
            q2: 'b',
            q3: 'c',
            q4: 'b',
            q5: 'a'
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
                <?php $_SESSION['ngay2_hoan_thanh'] = true; ?>
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
