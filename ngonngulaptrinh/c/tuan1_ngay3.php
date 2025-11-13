<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày 3 - Câu lệnh điều kiện trong C</title>
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
    </style>
</head>
<body>
    <h1>Ngày 3 - Câu lệnh điều kiện trong ngôn ngữ C</h1>

    <div class="section">
        <h2>📌 Câu lệnh điều kiện là gì?</h2>
        <p>Câu lệnh điều kiện cho phép chương trình đưa ra quyết định dựa vào giá trị điều kiện đúng hoặc sai (true/false).</p>
        <p>Trong C, có 3 dạng chính:</p>
        <ul>
            <li><code>if</code></li>
            <li><code>if...else</code></li>
            <li><code>switch</code></li>
        </ul>
    </div>

    <div class="section">
        <h2>🧮 Câu lệnh <code>if</code></h2>
        <pre>
int x = 10;
if (x > 5) {
    printf("x lớn hơn 5\n");
}
        </pre>
        <p>Chỉ in ra nếu điều kiện đúng (x > 5).</p>
    </div>

    <div class="section">
        <h2>💡 Câu lệnh <code>if...else</code></h2>
        <pre>
int x = 3;
if (x > 5) {
    printf("x lớn hơn 5\n");
} else {
    printf("x không lớn hơn 5\n");
}
        </pre>
    </div>

    <div class="section">
        <h2>🔄 Câu lệnh <code>switch</code></h2>
        <pre>
int choice = 2;
switch (choice) {
    case 1:
        printf("Bạn chọn 1\n");
        break;
    case 2:
        printf("Bạn chọn 2\n");
        break;
    default:
        printf("Không hợp lệ\n");
}
        </pre>
        <p><code>switch</code> rất phù hợp cho các lựa chọn rẽ nhánh.</p>
    </div>

    <div class="section">
        <h2>📝 Trắc nghiệm</h2>
        <form id="quiz-form">
            <div class="question">
                <p><strong>Câu 1:</strong> Lệnh nào dùng để kiểm tra điều kiện trong C?</p>
                <label><input type="radio" name="q1" value="if"> if</label><br>
                <label><input type="radio" name="q1" value="loop"> loop</label><br>
                <label><input type="radio" name="q1" value="case"> case</label><br>
                <label><input type="radio" name="q1" value="print"> print</label>
            </div>

            <div class="question">
                <p><strong>Câu 2:</strong> Trong switch-case, từ khóa nào dùng để dừng lệnh?</p>
                <label><input type="radio" name="q2" value="stop"> stop</label><br>
                <label><input type="radio" name="q2" value="exit"> exit</label><br>
                <label><input type="radio" name="q2" value="break"> break</label><br>
                <label><input type="radio" name="q2" value="end"> end</label>
            </div>

            <div class="question">
                <p><strong>Câu 3:</strong> Điều kiện của <code>if</code> nằm ở đâu?</p>
                <label><input type="radio" name="q3" value="Trong dấu {}"> Trong dấu {}</label><br>
                <label><input type="radio" name="q3" value="Trong dấu []"> Trong dấu []</label><br>
                <label><input type="radio" name="q3" value="Trong dấu ()"> Trong dấu ()</label><br>
                <label><input type="radio" name="q3" value="Không cần"> Không cần</label>
            </div>

            <div class="question">
                <p><strong>Câu 4:</strong> Đoạn code sau sẽ in gì?</p>
                <pre>
int x = 4;
if (x == 4) {
    printf("OK");
}
                </pre>
                <label><input type="radio" name="q4" value="Không in gì"> Không in gì</label><br>
                <label><input type="radio" name="q4" value="In OK"> In OK</label><br>
                <label><input type="radio" name="q4" value="Lỗi biên dịch"> Lỗi biên dịch</label><br>
                <label><input type="radio" name="q4" value="In x"> In x</label>
            </div>

            <div class="question">
                <p><strong>Câu 5:</strong> Câu lệnh nào KHÔNG phải là câu điều kiện?</p>
                <label><input type="radio" name="q5" value="if"> if</label><br>
                <label><input type="radio" name="q5" value="switch"> switch</label><br>
                <label><input type="radio" name="q5" value="for"> for</label><br>
                <label><input type="radio" name="q5" value="if...else"> if...else</label>
            </div>

            <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
        </form>

        <div id="results" class="hidden">
            <p id="score"></p>
            <button id="retry" class="btn" onclick="retryQuiz()">Làm lại</button>
            <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
            <div id="answer-key-container" class="hidden">
                <ul>
                    <li><strong>Câu 1:</strong> if</li>
                    <li><strong>Câu 2:</strong> break</li>
                    <li><strong>Câu 3:</strong> Trong dấu ()</li>
                    <li><strong>Câu 4:</strong> In OK</li>
                    <li><strong>Câu 5:</strong> for</li>
                </ul>
            </div>
            <div id="next-day" class="hidden">
                <a href="tuan1_ngay4.php" class="btn btn-success">▶️ Học tiếp Ngày 4</a>
            </div>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: 'if',
            q2: 'break',
            q3: 'Trong dấu ()',
            q4: 'In OK',
            q5: 'for'
        };

        function submitQuiz() {
            let score = 0;
            const form = document.forms['quiz-form'];
            for (let i = 1; i <= 5; i++) {
                const answer = form[`q${i}`].value;
                if (answer === correctAnswers[`q${i}`]) {
                    score++;
                }
            }

            document.getElementById('results').classList.remove('hidden');
            document.getElementById('score').innerText = `Bạn trả lời đúng ${score} / 5 câu.`;

            if (score === 5) {
                document.getElementById('next-day').classList.remove('hidden');
                <?php $_SESSION['ngay3_C_hoan_thanh'] = true; ?>
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
