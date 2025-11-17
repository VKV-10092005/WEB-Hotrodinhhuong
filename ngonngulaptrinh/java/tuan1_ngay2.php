<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Java Ngày 2 - Biến và Kiểu dữ liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .section {
            margin-bottom: 30px;
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
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<h1>Ngôn ngữ Java - Ngày 2: Biến và Kiểu dữ liệu</h1>

<div class="section">
    <h2>📘 Biến trong Java</h2>
    <p>Biến (variable) là vùng bộ nhớ được đặt tên, dùng để lưu trữ dữ liệu tạm thời trong chương trình.</p>
    <p>Cú pháp khai báo: <code>kiểu_dữ_liệu tên_biến = giá_trị;</code></p>

    <pre>
int age = 20;
String name = "An";
double score = 9.5;
    </pre>

    <h2>🔠 Các kiểu dữ liệu cơ bản</h2>
    <ul>
        <li><strong>int</strong> – số nguyên (ví dụ: 1, 2, -10)</li>
        <li><strong>double</strong> – số thực (ví dụ: 3.14, -2.5)</li>
        <li><strong>char</strong> – ký tự đơn (ví dụ: 'A', 'b')</li>
        <li><strong>boolean</strong> – chỉ có true hoặc false</li>
        <li><strong>String</strong> – chuỗi văn bản (ví dụ: "Xin chào")</li>
    </ul>
</div>

<div class="section">
    <h2>💡 Ví dụ</h2>
    <pre>
public class Demo {
    public static void main(String[] args) {
        int age = 25;
        String name = "Lan";
        boolean isStudent = true;

        System.out.println(name + " - " + age + " tuổi");
        System.out.println("Sinh viên: " + isStudent);
    }
}
    </pre>
</div>

<div class="section">
    <h2>📝 Trắc nghiệm</h2>
    <form id="quiz-form">
        <div class="question">
            <p><strong>Câu 1:</strong> Kiểu dữ liệu dùng để lưu chữ là gì?</p>
            <label><input type="radio" name="q1" value="String"> String</label><br>
            <label><input type="radio" name="q1" value="int"> int</label><br>
            <label><input type="radio" name="q1" value="boolean"> boolean</label><br>
            <label><input type="radio" name="q1" value="double"> double</label>
        </div>

        <div class="question">
            <p><strong>Câu 2:</strong> Đâu là một biến hợp lệ trong Java?</p>
            <label><input type="radio" name="q2" value="int age = 20;"> int age = 20;</label><br>
            <label><input type="radio" name="q2" value="age int = 20;"> age int = 20;</label><br>
            <label><input type="radio" name="q2" value="int = age 20;"> int = age 20;</label><br>
            <label><input type="radio" name="q2" value="int:age 20;"> int:age 20;</label>
        </div>

        <div class="question">
            <p><strong>Câu 3:</strong> Giá trị đúng của kiểu boolean là?</p>
            <label><input type="radio" name="q3" value="true và false"> true và false</label><br>
            <label><input type="radio" name="q3" value="yes và no"> yes và no</label><br>
            <label><input type="radio" name="q3" value="1 và 0"> 1 và 0</label><br>
            <label><input type="radio" name="q3" value="on và off"> on và off</label>
        </div>

        <div class="question">
            <p><strong>Câu 4:</strong> Kiểu dữ liệu nào sau đây dùng để lưu số thực?</p>
            <label><input type="radio" name="q4" value="double"> double</label><br>
            <label><input type="radio" name="q4" value="int"> int</label><br>
            <label><input type="radio" name="q4" value="char"> char</label><br>
            <label><input type="radio" name="q4" value="boolean"> boolean</label>
        </div>

        <div class="question">
            <p><strong>Câu 5:</strong> Biến <code>char grade = 'A';</code> có kiểu dữ liệu là gì?</p>
            <label><input type="radio" name="q5" value="char"> char</label><br>
            <label><input type="radio" name="q5" value="String"> String</label><br>
            <label><input type="radio" name="q5" value="int"> int</label><br>
            <label><input type="radio" name="q5" value="boolean"> boolean</label>
        </div>

        <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
    </form>

    <div id="results" class="hidden">
        <p id="score"></p>
        <button id="retry" class="btn" onclick="retryQuiz()">Làm lại</button>
        <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
        <div id="answer-key-container" class="hidden">
            <ul>
                <li><strong>Câu 1:</strong> String</li>
                <li><strong>Câu 2:</strong> int age = 20;</li>
                <li><strong>Câu 3:</strong> true và false</li>
                <li><strong>Câu 4:</strong> double</li>
                <li><strong>Câu 5:</strong> char</li>
            </ul>
        </div>
        <div id="next-day" class="hidden">
            <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp Ngày 3</a>
        </div>
    </div>
</div>

<script>
    const correctAnswers = {
        q1: 'String',
        q2: 'int age = 20;',
        q3: 'true và false',
        q4: 'double',
        q5: 'char'
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
            <?php $_SESSION['ngay2_java_hoan_thanh'] = true; ?>
        } else {
            document.getElementById('retry').classList.remove('hidden');
        }
    }

    function retryQuiz() {
        document.forms['quiz-form'].reset();
        document.getElementById('results').classList.add('hidden');
        document.getElementById('answer-key-container').classList.add('hidden');
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
