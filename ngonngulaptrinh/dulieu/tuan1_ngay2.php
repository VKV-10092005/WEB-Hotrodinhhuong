<?php
require '../../site.php';

load_top();
load_menu();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ngày 2: Kinh tế vi mô cơ bản</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; }
        .section { margin-bottom: 30px; }
        .hidden { display: none; }
        .btn { padding: 10px 15px; margin-right: 10px; border: none; background-color: #007BFF; color: white; cursor: pointer; }
        .btn-success { background-color: #28a745; }
        .btn:hover { opacity: 0.9; }
    </style>
</head>
<body>
<h1>Ngày 2: Kinh tế vi mô cơ bản</h1>

<div class="section">
    <h2>📘 Lý thuyết</h2>
    <p><strong>Kinh tế vi mô</strong> là một nhánh của kinh tế học nghiên cứu hành vi và quyết định của các cá nhân, hộ gia đình và doanh nghiệp trong việc sử dụng nguồn lực khan hiếm để tối đa hóa lợi ích của mình.</p>

    <p>Khác với kinh tế vĩ mô – nghiên cứu tổng thể nền kinh tế, kinh tế vi mô tập trung vào các thành phần nhỏ như thị trường hàng hóa, thị trường lao động, thị trường vốn,... và cách các yếu tố như giá cả, cung – cầu, chi phí, lợi nhuận ảnh hưởng đến các quyết định này.</p>

    <p>Dưới đây là một số khái niệm cốt lõi:</p>

    <ul>
        <li><strong>Cung và Cầu:</strong> Hai lực lượng chính quyết định giá cả và số lượng hàng hóa trên thị trường.</li>
        <li><strong>Cầu (Demand):</strong> Lượng hàng hóa người tiêu dùng sẵn sàng và có khả năng mua tại một mức giá nhất định.</li>
        <li><strong>Cung (Supply):</strong> Lượng hàng hóa người sản xuất sẵn sàng bán ra tại một mức giá nhất định.</li>
    </ul>

    <p><strong>Ví dụ:</strong> Khi giá của trái cây tăng lên, người tiêu dùng sẽ mua ít đi (cầu giảm), trong khi người trồng sẽ bán ra nhiều hơn (cung tăng). Khi cung vượt quá cầu, giá có xu hướng giảm trở lại → cân bằng thị trường.</p>

    <ul>
        <li><strong>Chi phí cơ hội:</strong> Giá trị của lựa chọn tốt nhất bị từ bỏ khi đưa ra một quyết định.</li>
        <li><strong>Lợi ích cận biên:</strong> Lợi ích thêm vào khi tiêu dùng thêm một đơn vị sản phẩm.</li>
        <li><strong>Chi phí cận biên:</strong> Chi phí thêm vào khi sản xuất thêm một đơn vị sản phẩm.</li>
    </ul>

    <p>Kinh tế vi mô cung cấp công cụ để:</p>
    <ul>
        <li>Hiểu hành vi tiêu dùng và sản xuất</li>
        <li>Dự đoán phản ứng của thị trường khi có thay đổi về giá hoặc thu nhập</li>
        <li>Tối ưu hóa sản xuất và phân bổ nguồn lực hiệu quả</li>
        <li>Phân tích tác động của chính sách giá trần, giá sàn, thuế và trợ cấp</li>
    </ul>

    <p><strong>Áp dụng:</strong> Trong Quản trị Kinh doanh, hiểu biết về kinh tế vi mô giúp doanh nghiệp ra quyết định hợp lý về định giá, sản lượng, nhân sự và phân phối hàng hóa.</p>
</div>

<h2>📝 Trắc nghiệm</h2>
<form id="quiz-form">
    <div class="question">
        <p><strong>Câu 1:</strong> Kinh tế vi mô nghiên cứu điều gì?</p>
        <label><input type="radio" name="q1" value="Hành vi của cá nhân và doanh nghiệp"> Hành vi của cá nhân và doanh nghiệp</label><br>
        <label><input type="radio" name="q1" value="Tình hình kinh tế toàn cầu"> Tình hình kinh tế toàn cầu</label><br>
        <label><input type="radio" name="q1" value="Chính sách ngoại giao quốc gia"> Chính sách ngoại giao quốc gia</label>
    </div>

    <div class="question">
        <p><strong>Câu 2:</strong> Khi giá một mặt hàng tăng, điều gì có thể xảy ra?</p>
        <label><input type="radio" name="q2" value="Cầu giảm, cung tăng"> Cầu giảm, cung tăng</label><br>
        <label><input type="radio" name="q2" value="Cầu và cung đều giảm"> Cầu và cung đều giảm</label><br>
        <label><input type="radio" name="q2" value="Không ảnh hưởng đến cung cầu"> Không ảnh hưởng đến cung cầu</label>
    </div>

    <div class="question">
        <p><strong>Câu 3:</strong> Chi phí cơ hội là gì?</p>
        <label><input type="radio" name="q3" value="Lựa chọn bị từ bỏ khi chọn một phương án khác"> Lựa chọn bị từ bỏ khi chọn một phương án khác</label><br>
        <label><input type="radio" name="q3" value="Chi phí đầu vào để sản xuất"> Chi phí đầu vào để sản xuất</label><br>
        <label><input type="radio" name="q3" value="Tiền lãi nhận được sau đầu tư"> Tiền lãi nhận được sau đầu tư</label>
    </div>

    <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
</form>

<div id="results" class="hidden">
    <p id="score"></p>
    <button id="retry" class="btn hidden" onclick="retryQuiz()">Làm lại bài</button>
    <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
    <div id="answer-key-container" class="hidden" style="margin-top: 10px;">
        <ul>
            <li><strong>Câu 1:</strong> Hành vi của cá nhân và doanh nghiệp</li>
            <li><strong>Câu 2:</strong> Cầu giảm, cung tăng</li>
            <li><strong>Câu 3:</strong> Lựa chọn bị từ bỏ khi chọn một phương án khác</li>
        </ul>
    </div>
    <div id="next-day" class="hidden" style="margin-top: 20px;">
        <a href="tuan1_ngay3.php" class="btn btn-success">▶️ Học tiếp (Ngày 3)</a>
    </div>
</div>

<script>
    const correctAnswers = {
        q1: "Hành vi của cá nhân và doanh nghiệp",
        q2: "Cầu giảm, cung tăng",
        q3: "Lựa chọn bị từ bỏ khi chọn một phương án khác"
    };

    function submitQuiz() {
        let score = 0;
        const form = document.forms['quiz-form'];
        for(let i = 1; i <= 3; i++) {
            const answer = form[`q${i}`].value;
            if(answer === correctAnswers[`q${i}`]) score++;
        }

        document.getElementById('results').classList.remove('hidden');
        document.getElementById('score').innerText = `Bạn đã trả lời đúng ${score} / 3 câu.`;

        if(score === 3) {
            document.getElementById('next-day').classList.remove('hidden');
            document.getElementById('retry').classList.add('hidden');
            <?php $_SESSION['ngay2_qtkd_done'] = true; ?>
        } else {
            document.getElementById('retry').classList.remove('hidden');
            document.getElementById('next-day').classList.add('hidden');
        }
    }

    function retryQuiz() {
        const form = document.forms['quiz-form'];
        form.reset();
        document.getElementById('results').classList.add('hidden');
        document.getElementById('answer-key-container').classList.add('hidden');
        document.getElementById('retry').classList.add('hidden');
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
