<?php
require '../../site.php';
load_top();


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra nếu chưa hoàn thành Ngày 1 thì không cho vào Ngày 2
if (!isset($_SESSION['ngay1_hoan_thanh']) || $_SESSION['ngay1_hoan_thanh'] !== true) {
    header('Location: tuan1_ngay1.php');
    exit;
}

$message = "";
$show_results = false;
$score = 0;
$correctAnswers = [
    'q3' => 'B',
    'q4' => 'B'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $score = 0;
    foreach ($correctAnswers as $key => $correct) {
        if (isset($_POST[$key]) && $_POST[$key] === $correct) {
            $score++;
        }
    }

    $_SESSION['ngay2_hoan_thanh'] = false;
    $show_results = true;

    if ($score === count($correctAnswers)) {
        $_SESSION['ngay2_hoan_thanh'] = true;
        $message = "✅ Bạn đã hoàn thành Ngày 2! Nhấn 'Học tiếp' để chuyển sang Ngày 3.";
    } else {
        $message = "❌ Vui lòng trả lời đúng tất cả câu hỏi trắc nghiệm.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày 2 - Lý thuyết về C++</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }
        .btn-success {
            background-color: green;
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
    </style>
</head>
<body>
    <h1>📘 Ngày 2: Lý thuyết về C++</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
        <p>C++ được phát triển bởi Bjarne Stroustrup tại Bell Labs như một phần mở rộng của ngôn ngữ C, bắt đầu từ năm 1979. C++ bổ sung nhiều tính năng mới cho ngôn ngữ C, đặc biệt là hỗ trợ lập trình hướng đối tượng.</p>
        <p>Ba bản cập nhật lớn cho ngôn ngữ C++ là: C++11, C++14 và C++17, được phê chuẩn vào các năm 2011, 2014 và 2017, mỗi lần cập nhật đều thêm các chức năng mới.</p>
        <p>Triết lý cơ bản của C++ là tin tưởng vào lập trình viên – cho phép họ tự do làm những gì họ muốn, nhưng cũng đòi hỏi họ phải hiểu rõ những gì mình đang làm để tránh lỗi.</p>
    </div>

    <div class="section">
        <h2>💡 Phần 2: Trắc nghiệm</h2>
        <form method="POST" action="">
            <p>1. C++ được phát triển bởi ai?</p>
            <label><input type="radio" name="q3" value="A" <?php if(isset($_POST['q3']) && $_POST['q3'] == 'A') echo 'checked'; ?>> A) Dennis Ritchie</label><br>
            <label><input type="radio" name="q3" value="B" <?php if(isset($_POST['q3']) && $_POST['q3'] == 'B') echo 'checked'; ?>> B) Bjarne Stroustrup</label><br>
            <label><input type="radio" name="q3" value="C" <?php if(isset($_POST['q3']) && $_POST['q3'] == 'C') echo 'checked'; ?>> C) Ken Thompson</label><br>

            <p>2. Tiêu chuẩn C++ đầu tiên được gọi là gì?</p>
            <label><input type="radio" name="q4" value="A" <?php if(isset($_POST['q4']) && $_POST['q4'] == 'A') echo 'checked'; ?>> A) C++11</label><br>
            <label><input type="radio" name="q4" value="B" <?php if(isset($_POST['q4']) && $_POST['q4'] == 'B') echo 'checked'; ?>> B) C++98</label><br>
            <label><input type="radio" name="q4" value="C" <?php if(isset($_POST['q4']) && $_POST['q4'] == 'C') echo 'checked'; ?>> C) C++03</label><br>

            <p>Bài tập tự luận: Nêu các ưu điểm của C++ trong phát triển phần mềm trò chơi:</p>
            <textarea name="bai_tap_2" rows="4" cols="50"><?php echo isset($_POST['bai_tap_2']) ? htmlspecialchars($_POST['bai_tap_2']) : ''; ?></textarea><br>

            <button type="submit">Nộp bài</button>
        </form>
    </div>

    <?php if ($show_results): ?>
        <div id="results">
            <p>Bạn đã trả lời đúng <?php echo $score; ?> / <?php echo count($correctAnswers); ?> câu hỏi trắc nghiệm.</p>
            <p><?php echo $message; ?></p>

            <?php if ($_SESSION['ngay2_hoan_thanh']): ?>
                <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp (Ngày 3)</a>
            <?php else: ?>
                <form method="POST" action="">
                    <button type="submit" name="retry">🔄 Làm lại bài</button>
                </form>
                <button onclick="toggleAnswerKey()">📖 Xem đáp án</button>
                <div id="answer-key-container" class="hidden">
                    <ul>
                        <li>Câu 1: B) Bjarne Stroustrup</li>
                        <li>Câu 2: B) C++98</li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script>
        function toggleAnswerKey() {
            const answerKey = document.getElementById('answer-key-container');
            if (answerKey.classList.contains('hidden')) {
                answerKey.classList.remove('hidden');
            } else {
                answerKey.classList.add('hidden');
            }
        }
    </script>
</body>
</html>

<?php
include '../../quaylai.php';
load_footer();
?>
