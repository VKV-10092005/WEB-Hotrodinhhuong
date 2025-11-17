<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày 1 - Ngôn ngữ C</title>
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
        .correct {
            color: green;
        }
        .incorrect {
            color: red;
        }
        .question {
            margin-bottom: 20px;
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
    <!--<a href="../../quatrinh.php" class="btn">⬅️ Quay lại quá trình học</a>-->
    <h1>Ngôn ngữ lập trình C - Ngày 1</h1>

    <div class="section">
        <h2>📘 Giới thiệu về C</h2>
        <p>Ngôn ngữ C là một trong những ngôn ngữ lập trình lâu đời và có ảnh hưởng nhất trong lịch sử lập trình. Được phát triển bởi Dennis Ritchie vào năm 1972 tại Bell Labs, C được thiết kế để viết hệ điều hành UNIX – một trong những hệ điều hành có ảnh hưởng lớn trong thời kỳ đầu của máy tính hiện đại.</p>
        <p>C mang tính tối giản, hiệu suất cao và cung cấp cho lập trình viên quyền truy cập trực tiếp vào bộ nhớ – một điểm mạnh khiến nó trở nên lý tưởng cho lập trình hệ thống, trình điều khiển thiết bị, và phần mềm nhúng.</p>
        <p>Với cú pháp đơn giản nhưng mạnh mẽ, C là nền tảng cho nhiều ngôn ngữ hiện đại khác như C++, Java, C#, Objective-C, và thậm chí cả Python.</p>
    </div>

    <div class="section">
        <h2>🔧 Cấu trúc cơ bản của chương trình C</h2>
        <pre>
#include &lt;stdio.h&gt;

int main() {
    printf("Xin chào thế giới!\n");
    return 0;
}
        </pre>
        <p>Đây là chương trình "Hello World" bằng ngôn ngữ C. Nó bao gồm:</p>
        <ul>
            <li><code>#include &lt;stdio.h&gt;</code>: Thư viện tiêu chuẩn để sử dụng hàm <code>printf()</code>.</li>
            <li><code>int main()</code>: Hàm chính – nơi chương trình bắt đầu thực thi.</li>
            <li><code>return 0;</code>: Kết thúc chương trình với mã trạng thái 0 (thành công).</li>
        </ul>
    </div>

    <div class="section">
        <h2>📝 Trắc nghiệm nhanh</h2>
        <form id="quiz-form">
            <div class="question">
                <p><strong>Câu 1:</strong> Ai là người phát triển ngôn ngữ lập trình C?</p>
                <label><input type="radio" name="q1" value="Dennis Ritchie"> Dennis Ritchie</label><br>
                <label><input type="radio" name="q1" value="Ken Thompson"> Ken Thompson</label><br>
                <label><input type="radio" name="q1" value="James Gosling"> James Gosling</label><br>
                <label><input type="radio" name="q1" value="Guido van Rossum"> Guido van Rossum</label>
            </div>

            <div class="question">
                <p><strong>Câu 2:</strong> Ngôn ngữ C được phát triển vào năm nào?</p>
                <label><input type="radio" name="q2" value="1972"> 1972</label><br>
                <label><input type="radio" name="q2" value="1985"> 1985</label><br>
                <label><input type="radio" name="q2" value="1990"> 1990</label><br>
                <label><input type="radio" name="q2" value="2000"> 2000</label>
            </div>

            <div class="question">
                <p><strong>Câu 3:</strong> Hàm nào được dùng để in ra màn hình trong C?</p>
                <label><input type="radio" name="q3" value="print()"> print()</label><br>
                <label><input type="radio" name="q3" value="echo()"> echo()</label><br>
                <label><input type="radio" name="q3" value="printf()"> printf()</label><br>
                <label><input type="radio" name="q3" value="cout"> cout</label>
            </div>

            <div class="question">
                <p><strong>Câu 4:</strong> File header tiêu chuẩn dùng để nhập/xuất trong C là gì?</p>
                <label><input type="radio" name="q4" value="iostream"> iostream</label><br>
                <label><input type="radio" name="q4" value="stdio.h"> stdio.h</label><br>
                <label><input type="radio" name="q4" value="stdlib.h"> stdlib.h</label><br>
                <label><input type="radio" name="q4" value="conio.h"> conio.h</label>
            </div>

            <div class="question">
                <p><strong>Câu 5:</strong> Trong chương trình C, hàm <code>main()</code> dùng để?</p>
                <label><input type="radio" name="q5" value="Khởi tạo biến"> Khởi tạo biến</label><br>
                <label><input type="radio" name="q5" value="Chạy chương trình chính"> Chạy chương trình chính</label><br>
                <label><input type="radio" name="q5" value="Đóng chương trình"> Đóng chương trình</label><br>
                <label><input type="radio" name="q5" value="Hiển thị dữ liệu"> Hiển thị dữ liệu</label>
            </div>

            <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
        </form>

        <div id="results" class="hidden">
            <p id="score"></p>
            <button id="retry" class="btn" onclick="retryQuiz()">Làm lại</button>
            <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
            <div id="answer-key-container" class="hidden">
                <ul>
                    <li><strong>Câu 1:</strong> Dennis Ritchie</li>
                    <li><strong>Câu 2:</strong> 1972</li>
                    <li><strong>Câu 3:</strong> printf()</li>
                    <li><strong>Câu 4:</strong> stdio.h</li>
                    <li><strong>Câu 5:</strong> Chạy chương trình chính</li>
                </ul>
            </div>
            <div id="next-day" class="hidden">
                <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp Ngày 2</a>
            </div>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: 'Dennis Ritchie',
            q2: '1972',
            q3: 'printf()',
            q4: 'stdio.h',
            q5: 'Chạy chương trình chính'
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
                // Đánh dấu hoàn thành Ngày 1
                <?php $_SESSION['ngay1_C_hoan_thanh'] = true; ?>
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
