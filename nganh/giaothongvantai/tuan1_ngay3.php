<?php
session_start();
require '../../site.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctAnswers = [
        'q1' => 'Phát triển kinh tế',
        'q2' => 'Kết nối vùng miền',
        'q3' => 'Tăng năng suất vận chuyển',
        'q4' => 'Giảm chi phí logistics',
        'q5' => 'Tăng trưởng đô thị'
    ];

    $score = 0;
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["q$i"]) && $_POST["q$i"] === $correctAnswers["q$i"]) {
            $score++;
        }
    }

    $_SESSION['gtvt_ngay3_hoan_thanh'] = ($score === 5);
    $_SESSION['gtvt_ngay3_diem'] = $score;
}

load_top();
?>

<div class="content">
    <h2>Tuần 1 - Ngày 3: Vai trò của giao thông vận tải trong phát triển kinh tế – xã hội</h2>
    <form method="POST" id="quiz-form">
        <div>
            <p>1. Giao thông vận tải có vai trò gì với nền kinh tế?</p>
            <input type="radio" name="q1" value="Giải trí" required> Giải trí<br>
            <input type="radio" name="q1" value="Phát triển kinh tế"> Phát triển kinh tế<br>
            <input type="radio" name="q1" value="Tôn giáo"> Tôn giáo<br>
            <input type="radio" name="q1" value="Văn hóa nghệ thuật"> Văn hóa nghệ thuật<br>
        </div>

        <div>
            <p>2. Giao thông giúp điều gì giữa các vùng miền?</p>
            <input type="radio" name="q2" value="Phân chia lãnh thổ" required> Phân chia lãnh thổ<br>
            <input type="radio" name="q2" value="Cách ly dân cư"> Cách ly dân cư<br>
            <input type="radio" name="q2" value="Kết nối vùng miền"> Kết nối vùng miền<br>
            <input type="radio" name="q2" value="Tăng giá sản phẩm"> Tăng giá sản phẩm<br>
        </div>

        <div>
            <p>3. Một lợi ích về vận hành là gì?</p>
            <input type="radio" name="q3" value="Tăng ùn tắc" required> Tăng ùn tắc<br>
            <input type="radio" name="q3" value="Tăng chi phí"> Tăng chi phí<br>
            <input type="radio" name="q3" value="Tăng năng suất vận chuyển"> Tăng năng suất vận chuyển<br>
            <input type="radio" name="q3" value="Giảm năng suất"> Giảm năng suất<br>
        </div>

        <div>
            <p>4. Giao thông phát triển giúp doanh nghiệp như thế nào?</p>
            <input type="radio" name="q4" value="Tăng chi phí logistics" required> Tăng chi phí logistics<br>
            <input type="radio" name="q4" value="Giảm chi phí logistics"> Giảm chi phí logistics<br>
            <input type="radio" name="q4" value="Giảm vận tải hàng hóa"> Giảm vận tải hàng hóa<br>
            <input type="radio" name="q4" value="Tăng giá bán"> Tăng giá bán<br>
        </div>

        <div>
            <p>5. Một trong các ảnh hưởng tích cực đến đô thị là gì?</p>
            <input type="radio" name="q5" value="Tăng trưởng đô thị" required> Tăng trưởng đô thị<br>
            <input type="radio" name="q5" value="Gây tắc nghẽn"> Gây tắc nghẽn<br>
            <input type="radio" name="q5" value="Thu hẹp thành phố"> Thu hẹp thành phố<br>
            <input type="radio" name="q5" value="Làm giảm dân số"> Làm giảm dân số<br>
        </div>

        <button type="submit" class="btn">Nộp bài</button>
    </form>

    <?php if (isset($_SESSION['gtvt_ngay3_diem'])): ?>
        <div id="results" style="margin-top:20px;">
            <p>Bạn đã trả lời đúng <?= $_SESSION['gtvt_ngay3_diem'] ?> / 5 câu.</p>
            <?php if ($_SESSION['gtvt_ngay3_hoan_thanh']): ?>
                <a href="tuan1_ngay4.php" class="btn btn-success">▶️ Học tiếp (Ngày 4)</a>
            <?php else: ?>
                <button class="btn" onclick="document.getElementById('quiz-form').reset(); this.parentElement.style.display='none';">Làm lại bài</button>
                <p style="color:red;">Bạn cần đạt 5/5 câu mới được sang ngày tiếp theo.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php load_bottom(); ?>
