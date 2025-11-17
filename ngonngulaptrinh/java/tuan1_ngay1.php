<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngôn ngữ Java - Ngày 1</title>
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
        #answer-key-container li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h1>Ngôn ngữ Java - Ngày 1: Giới thiệu</h1>


<div class="section">
    <h2>📖 Giới thiệu Java</h2>
    <p>Java là một ngôn ngữ lập trình hướng đối tượng, được phát triển bởi Sun Microsystems (nay là một phần của Oracle) vào năm 1995. Java được thiết kế với tiêu chí: "Viết một lần, chạy mọi nơi" (WORA - Write Once, Run Anywhere).</p>

    <p>Chương trình Java được biên dịch thành bytecode, sau đó chạy trên máy ảo Java (JVM), giúp chương trình có thể chạy trên nhiều nền tảng khác nhau mà không cần thay đổi mã nguồn.</p>

    <h3>Ứng dụng của Java</h3>
    <ul>
        <li>Phát triển ứng dụng Android</li>
        <li>Ứng dụng web (Java EE, Spring, JSP...)</li>
        <li>Ứng dụng desktop (Swing, JavaFX)</li>
        <li>Hệ thống nhúng, phần mềm doanh nghiệp</li>
        <li>Ngành tài chính, ngân hàng, bảo hiểm</li>
    </ul>
</div>

<div class="section">
    <h2>💡 Ví dụ chương trình đầu tiên</h2>
    <pre>
public class HelloWorld {
    public static void main(String[] args) {
        System.out.println("Xin chào, Java!");
    }
}
    </pre>
    <p>Đây là chương trình đầu tiên để in ra dòng chữ <strong>"Xin chào, Java!"</strong></p>
</div>

<div class="section">
    <h2>📝 Trắc nghiệm</h2>
    <form id="quiz-form">
        <div class="question">
            <p><strong>Câu 1:</strong> Java được phát hành lần đầu vào năm nào?</p>
            <label><input type="radio" name="q1" value="1995"> 1995</label><br>
            <label><input type="radio" name="q1" value="1985"> 1985</label><br>
            <label><input type="radio" name="q1" value="2000"> 2000</label><br>
            <label><input type="radio" name="q1" value="2010"> 2010</label>
        </div>

        <div class="question">
            <p><strong>Câu 2:</strong> Câu khẩu hiệu nổi tiếng của Java là gì?</p>
            <label><input type="radio" name="q2" value="Viết một lần, chạy mọi nơi"> Viết một lần, chạy mọi nơi</label><br>
            <label><input type="radio" name="q2" value="Viết nhiều lần, chạy một nơi"> Viết nhiều lần, chạy một nơi</label><br>
            <label><input type="radio" name="q2" value="Chạy mọi nơi, viết lại mỗi lần"> Chạy mọi nơi, viết lại mỗi lần</label><br>
            <label><input type="radio" name="q2" value="Không có câu khẩu hiệu"> Không có câu khẩu hiệu</label>
        </div>

        <div class="question">
            <p><strong>Câu 3:</strong> JVM là viết tắt của?</p>
            <label><input type="radio" name="q3" value="Java Virtual Machine"> Java Virtual Machine</label><br>
            <label><input type="radio" name="q3" value="Java Verified Method"> Java Verified Method</label><br>
            <label><input type="radio" name="q3" value="Java Visual Module"> Java Visual Module</label><br>
            <label><input type="radio" name="q3" value="Java View Manager"> Java View Manager</label>
        </div>

        <div class="question">
            <p><strong>Câu 4:</strong> Java là ngôn ngữ lập trình gì?</p>
            <label><input type="radio" name="q4" value="Hướng đối tượng"> Hướng đối tượng</label><br>
            <label><input type="radio" name="q4" value="Thủ tục"> Thủ tục</label><br>
            <label><input type="radio" name="q4" value="Hướng hàm"> Hướng hàm</label><br>
            <label><input type="radio" name="q4" value="Lắp ráp"> Lắp ráp</label>
        </div>

        <div class="question">
            <p><strong>Câu 5:</strong> Java được phát triển ban đầu bởi công ty nào?</p>
            <label><input type="radio" name="q5" value="Sun Microsystems"> Sun Microsystems</label><br>
            <label><input type="radio" name="q5" value="Microsoft"> Microsoft</label><br>
            <label><input type="radio" name="q5" value="IBM"> IBM</label><br>
            <label><input type="radio" name="q5" value="Google"> Google</label>
        </div>

        <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
    </form>

    <div id="results" class="hidden">
        <p id="score"></p>
        <button id="retry" class="btn" onclick="retryQuiz()">Làm lại</button>
        <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
        <div id="answer-key-container" class="hidden">
            <ul>
                <li><strong>Câu 1:</strong> 1995</li>
                <li><strong>Câu 2:</strong> Viết một lần, chạy mọi nơi</li>
                <li><strong>Câu 3:</strong> Java Virtual Machine</li>
                <li><strong>Câu 4:</strong> Hướng đối tượng</li>
                <li><strong>Câu 5:</strong> Sun Microsystems</li>
            </ul>
        </div>
        <div id="next-day" class="hidden">
            <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp Ngày 2</a>
        </div>
    </div>
</div>

<script>
    const correctAnswers = {
        q1: '1995',
        q2: 'Viết một lần, chạy mọi nơi',
        q3: 'Java Virtual Machine',
        q4: 'Hướng đối tượng',
        q5: 'Sun Microsystems'
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
            <?php $_SESSION['ngay1_java_hoan_thanh'] = true; ?>
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
