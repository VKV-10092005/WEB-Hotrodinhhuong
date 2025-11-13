<?php
session_start();
require '../../site.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correctAnswers = [
        'q1' => 'Ô tô',
        'q2' => 'Đường cao tốc',
        'q3' => 'Đường sắt',
        'q4' => 'Bến cảng',
        'q5' => 'Đường hàng không'
    ];

    $score = 0;
    for ($i = 1; $i <= 5; $i++) {
        if (isset($_POST["q$i"]) && $_POST["q$i"] === $correctAnswers["q$i"]) {
            $score++;
        }
    }

    $_SESSION['gtvt_ngay2_hoan_thanh'] = ($score === 5);
    $_SESSION['gtvt_ngay2_diem'] = $score;
}

load_top();
?>

<div class="content">
    <h2>Tuần 1 - Ngày 2: Các phương tiện và hạ tầng giao thông</h2>
    <form method="POST" id="quiz-form">
        <div>
            <p>1. Phương tiện phổ biến nhất trong giao thông cá nhân tại Việt Nam là gì?</p>
            <input type="radio" name="q1" value="Tàu hỏa" required> Tàu hỏa<br>
            <input type="radio" name="q1" value="Máy bay"> Máy bay<br>
            <input type="radio" name="q1" value="Ô tô"> Ô tô<br>
            <input type="radio" name="q1" value="Tàu thủy"> Tàu thủy<br>
        </div>

        <div>
            <p>2. Tuyến đường dành cho xe chạy tốc độ cao gọi là gì?</p>
            <input type="radio" name="q2" value="Quốc lộ" required> Quốc lộ<br>
            <input type="radio" name="q2" value="Đường tỉnh"> Đường tỉnh<br>
            <input type="radio" name="q2" value="Đường cao tốc"> Đường cao tốc<br>
            <input type="radio" name="q2" value="Đường làng"> Đường làng<br>
        </div>

        <div>
            <p>3. Phương tiện nào chạy trên ray?</p>
            <input type="radio" name="q3" value="Xe buýt" required> Xe buýt<br>
            <input type="radio" name="q3" value="Tàu thủy"> Tàu thủy<br>
            <input type="radio" name="q3" value="Đường sắt"> Đường sắt<br>
            <input type="radio" name="q3" value="Xe máy"> Xe máy<br>
        </div>

        <div>
            <p>4. Hạ tầng phục vụ cho tàu biển cập bến là gì?</p>
            <input type="radio" name="q4" value="Sân bay" required> Sân bay<br>
            <input type="radio" name="q4" value="Nhà ga"> Nhà ga<br>
            <input type="radio" name="q4" value="Bến cảng"> Bến cảng<br>
            <input type="radio" name="q4" value="Trạm thu phí"> Trạm thu phí<br>
        </div>

        <div>
            <p>5. Sân bay là hạ tầng của loại hình giao thông nào?</p>
            <input type="radio" name="q5" value="Đường sắt" required> Đường sắt<br>
            <input type="radio" name="q5" value="Đường bộ"> Đường bộ<br>
            <input type="radio" name="q5" value="Đường thủy"> Đường thủy<br>
            <input type="radio" name="q5" value="Đường hàng không"> Đường hàng không<br>
        </div>

        <button type="submit" class="btn">Nộp bài</button>
    </form>

    <?php if (isset($_SESSION['gtvt_ngay2_diem'])): ?>
        <div id="results" style="margin-top:20px;">
            <p>Bạn đã trả lời đúng <?= $_SESSION['gtvt_ngay2_diem'] ?> / 5 câu.</p>
            <?php if ($_SESSION['gtvt_ngay2_hoan_thanh']): ?>
                <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp (Ngày 3)</a>
            <?php else: ?>
                <button class="btn" onclick="document.getElementById('quiz-form').reset(); this.parentElement.style.display='none';">Làm lại bài</button>
                <p style="color:red;">Bạn cần đạt 5/5 câu mới được sang ngày tiếp theo.</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php load_bottom(); ?>
