<?php
session_start();
require '../../site.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctAnswers = [
        'q1' => 'Đường bộ',
        'q2' => 'Vận tải và hạ tầng',
        'q3' => 'Kỹ thuật xây dựng công trình giao thông',
        'q4' => 'Quy hoạch đô thị',
        'q5' => 'Logistics'
    ];

    $score = 0;
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["q$i"]) && $_POST["q$i"] === $correctAnswers["q$i"]) {
            $score++;
        }
    }

    $_SESSION['gtvt_ngay1_hoan_thanh'] = ($score === 5);
    $_SESSION['gtvt_ngay1_diem'] = $score;
}

load_top();
?>

<div class="content">
    <h2>Tuần 1 - Ngày 1: Giới thiệu ngành Giao thông Vận tải</h2>
    <form method="POST" id="quiz-form">
        <div>
            <p>1. Loại hình giao thông phổ biến nhất tại Việt Nam là gì?</p>
            <input type="radio" name="q1" value="Hàng không" required> Hàng không<br>
            <input type="radio" name="q1" value="Đường thủy"> Đường thủy<br>
            <input type="radio" name="q1" value="Đường bộ"> Đường bộ<br>
            <input type="radio" name="q1" value="Đường sắt"> Đường sắt<br>
        </div>

        <div>
            <p>2. Ngành Giao thông Vận tải gồm hai lĩnh vực chính là gì?</p>
            <input type="radio" name="q2" value="Xây dựng và kiến trúc" required> Xây dựng và kiến trúc<br>
            <input type="radio" name="q2" value="Vận tải và hạ tầng"> Vận tải và hạ tầng<br>
            <input type="radio" name="q2" value="Nông nghiệp và công nghiệp"> Nông nghiệp và công nghiệp<br>
            <input type="radio" name="q2" value="Y tế và giáo dục"> Y tế và giáo dục<br>
        </div>

        <div>
            <p>3. Một chuyên ngành quan trọng trong GTVT là?</p>
            <input type="radio" name="q3" value="Điện tử viễn thông" required> Điện tử viễn thông<br>
            <input type="radio" name="q3" value="Kỹ thuật xây dựng công trình giao thông"> Kỹ thuật xây dựng công trình giao thông<br>
            <input type="radio" name="q3" value="Công nghệ sinh học"> Công nghệ sinh học<br>
            <input type="radio" name="q3" value="Kỹ thuật cơ khí"> Kỹ thuật cơ khí<br>
        </div>

        <div>
            <p>4. Ngành GTVT có liên quan đến lĩnh vực nào dưới đây?</p>
            <input type="radio" name="q4" value="Quản trị nhân sự" required> Quản trị nhân sự<br>
            <input type="radio" name="q4" value="Quy hoạch đô thị"> Quy hoạch đô thị<br>
            <input type="radio" name="q4" value="Tài chính ngân hàng"> Tài chính ngân hàng<br>
            <input type="radio" name="q4" value="Kỹ thuật điện"> Kỹ thuật điện<br>
        </div>

        <div>
            <p>5. Lĩnh vực hậu cần vận tải còn được gọi là gì?</p>
            <input type="radio" name="q5" value="Logistics" required> Logistics<br>
            <input type="radio" name="q5" value="Agriculture"> Agriculture<br>
            <input type="radio" name="q5" value="Tourism"> Tourism<br>
            <input type="radio" name="q5" value="Banking"> Banking<br>
        </div>

        <button type="submit" class="btn">Nộp bài</button>
    </form>

    <?php if (isset($_SESSION['gtvt_ngay1_diem'])): ?>
        <div id="results" style="margin-top:20px;">
            <p>Bạn đã trả lời đúng <?= $_SESSION['gtvt_ngay1_diem'] ?> / 5 câu.</p>
            <?php if ($_SESSION['gtvt_ngay1_hoan_thanh']): ?>
                <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp (Ngày 2)</a>
            <?php else: ?>
                <button class="btn" onclick="document.getElementById('quiz-form').reset(); this.parentElement.style.display='none';">Làm lại bài</button>
                <p style="color:red;">Bạn cần đạt 5/5 câu mới được sang ngày tiếp theo.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php load_bottom(); ?>
