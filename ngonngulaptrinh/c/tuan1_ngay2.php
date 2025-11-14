<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày 2 - Biến và Toán tử trong C</title>
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
    <h1>Ngày 2 - Biến, Kiểu Dữ Liệu và Toán Tử trong C</h1>

    <div class="section">
        <h2>📌 Biến và Kiểu Dữ Liệu</h2>
        <p>Trong C, biến là vùng nhớ được đặt tên dùng để lưu trữ giá trị. Để sử dụng biến, bạn cần khai báo kiểu dữ liệu của nó trước.</p>
        <p>Một số kiểu dữ liệu cơ bản:</p>
        <ul>
            <li><code>int</code> – số nguyên</li>
            <li><code>float</code> – số thực đơn</li>
            <li><code>double</code> – số thực có độ chính xác cao</li>
            <li><code>char</code> – ký tự đơn</li>
        </ul>
        <pre>
int tuoi = 25;
float diem = 8.5;
char kyTu = 'A';
        </pre>
    </div>

    <div class="section">
        <h2>🧮 Toán Tử Cơ Bản</h2>
        <p>C hỗ trợ các toán tử toán học cơ bản như:</p>
        <ul>
            <li><code>+</code> Cộng</li>
            <li><code>-</code> Trừ</li>
            <li><code>*</code> Nhân</li>
            <li><code>/</code> Chia</li>
            <li><code>%</code> Chia lấy dư</li>
        </ul>
        <p>Ví dụ:</p>
        <pre>
int a = 10;
int b = 3;
int tong = a + b;      // 13
int hieu = a - b;      // 7
int tich = a * b;      // 30
int thuong = a / b;    // 3
int du = a % b;        // 1
        </pre>
    </div>

    <div class="section">
        <h2>💡 Ví dụ minh họa</h2>
        <pre>
#include &lt;stdio.h&gt;

int main() {
    int a = 5, b = 2;
    int tong = a + b;
    printf("Tổng là: %d\n", tong);
    return 0;
}
        </pre>
        <p>Chương trình này khai báo hai biến nguyên, cộng lại và in kết quả.</p>
    </div>

    <div class="section">
        <h2>📝 Trắc nghiệm</h2>
        <form id="quiz-form">
            <div class="question">
                <p><strong>Câu 1:</strong> Kiểu dữ liệu nào dùng để lưu số nguyên?</p>
                <label><input type="radio" name="q1" value="int"> int</label><br>
                <label><input type="radio" name="q1" value="char"> char</label><br>
                <label><input type="radio" name="q1" value="float"> float</label><br>
                <label><input type="radio" name="q1" value="double"> double</label>
            </div>

            <div class="question">
                <p><strong>Câu 2:</strong> Kết quả của biểu thức <code>7 % 3</code> là bao nhiêu?</p>
                <label><input type="radio" name="q2" value="1"> 1</label><br>
                <label><input type="radio" name="q2" value="2"> 2</label><br>
                <label><input type="radio" name="q2" value="0"> 0</label><br>
                <label><input type="radio" name="q2" value="3"> 3</label>
            </div>

            <div class="question">
                <p><strong>Câu 3:</strong> Biến nào dưới đây là hợp lệ?</p>
                <label><input type="radio" name="q3" value="int 1so;"> int 1so;</label><br>
                <label><input type="radio" name="q3" value="float diem_so;"> float diem_so;</label><br>
                <label><input type="radio" name="q3" value="char@ten;"> char@ten;</label><br>
                <label><input type="radio" name="q3" value="double$giatri;"> double$giatri;</label>
            </div>

            <div class="question">
                <p><strong>Câu 4:</strong> Hàm nào in ra màn hình trong C?</p>
                <label><input type="radio" name="q4" value="print()"> print()</label><br>
                <label><input type="radio" name="q4" value="echo()"> echo()</label><br>
                <label><input type="radio" name="q4" value="printf()"> printf()</label><br>
                <label><input type="radio" name="q4" value="cin"> cin</label>
            </div>

            <div class="question">
                <p><strong>Câu 5:</strong> Toán tử <code>*</code> dùng để làm gì?</p>
                <label><input type="radio" name="q5" value="Chia"> Chia</label><br>
                <label><input type="radio" name="q5" value="Nhân"> Nhân</label><br>
                <label><input type="radio" name="q5" value="Cộng"> Cộng</label><br>
                <label><input type="radio" name="q5" value="Trừ"> Trừ</label>
            </div>

            <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
        </form>

        <div id="results" class="hidden">
            <p id="score"></p>
            <button id="retry" class="btn" onclick="retryQuiz()">Làm lại</button>
            <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
            <div id="answer-key-container" class="hidden">
                <ul>
                    <li><strong>Câu 1:</strong> int</li>
                    <li><strong>Câu 2:</strong> 1</li>
                    <li><strong>Câu 3:</strong> float diem_so;</li>
                    <li><strong>Câu 4:</strong> printf()</li>
                    <li><strong>Câu 5:</strong> Nhân</li>
                </ul>
            </div>
            <div id="next-day" class="hidden">
                <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp Ngày 3</a>
            </div>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: 'int',
            q2: '1',
            q3: 'float diem_so;',
            q4: 'printf()',
            q5: 'Nhân'
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
                <?php $_SESSION['ngay2_C_hoan_thanh'] = true; ?>
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
