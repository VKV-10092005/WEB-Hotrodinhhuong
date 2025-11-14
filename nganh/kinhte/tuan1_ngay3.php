<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngành Kinh tế - Ngày 3</title>
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
    <h1>Ngành Kinh tế - Ngày 3</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
        <p>Phần lý thuyết ngày 3 đang được cập nhật. Vui lòng quay lại sau hoặc liên hệ để được hỗ trợ.</p>
    </div>

    <div class="section">
        <h2>💡 Phần 2: Ví dụ minh họa</h2>
        <p>Ví dụ minh họa sẽ được cập nhật sớm.</p>
    </div>

    <h2>📝 Phần 3: Trắc nghiệm</h2>
    <form id="quiz-form">
        <p>Trắc nghiệm sẽ được bổ sung trong thời gian tới.</p>
    </form>

    <div id="results" class="hidden">
        <p id="score"></p>
        <button id="retry" class="btn" onclick="retryQuiz()">Làm lại bài</button>
        <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
        <div id="answer-key-container" class="hidden">
            <!-- Đáp án sẽ được cập nhật -->
        </div>
        <div id="next-day" class="hidden">
            <!-- Link tiếp theo sẽ được bổ sung -->
        </div>
    </div>

    <script>
        function submitQuiz() {
            alert('Bài trắc nghiệm chưa có sẵn.');
        }
        function retryQuiz() {
            document.getElementById('results').classList.add('hidden');
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
