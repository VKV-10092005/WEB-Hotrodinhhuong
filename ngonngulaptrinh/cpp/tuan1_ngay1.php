<?php
require '../../site.php';
load_top();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc nghiệm C và C++</title>
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
    <h1>Ngôn ngữ C và C++ - Bài trắc nghiệm</h1>

    <div class="section">
        <h2>🌟 Phần 1: Lý thuyết</h2>
		<h2>Ngôn ngữ C</h2>
		<p>Ngôn ngữ C được phát triển vào năm 1972 bởi Dennis Ritchie tại phòng thí nghiệm của Bell Telephone, nó là ngôn ngữ chủ yếu dùng để lập trình hệ thống (ngôn ngữ để viết hệ điều hành). Và mục tiêu chính của Ritchie là tạo ra một ngôn ngữ tối giản, dễ biên dịch, cho phép truy cập một cách dễ dàng vào bộ nhớ, tạo ra các dòng code hiệu quả và độc lập (không phụ thuộc vào các chương trình khác). Đối với ngôn ngữ cấp cao, nó được thiết kế để cung cấp cho lập trình viên nhiều quyền kiểm soát, trong khi vẫn khuyến khích tính độc lập của chương trình (nghĩa là code sẽ không cần phải viết lại cho mỗi nền tảng khác nhau).</p>
		<p>Vào năm 1973, C đã hoạt động một cách hiệu quả và linh hoạt đến nỗi mà Ritchie và Ken Thompson đã viết lại hầu hết hệ điều hành Unix bằng C. Không giống như lắp ráp, sản xuất các chương trình chỉ có thể chạy trên các CPU cụ thể, C còn có tính di động tuyệt vời, cho phép Unix dễ dàng biên dịch lại trên nhiều loại máy tính khác nhau và chạy khá nhanh.</p>
		<p>Năm 1983, Viện Tiêu chuẩn Quốc gia Hoa Kỳ (ANSI) đã thành lập một ủy ban để thiết lập một số tiêu chuẩn chính thức cho C. Năm 1989, họ đã hoàn thành và phát hành tiêu chuẩn C89, được gọi là ANSI C.</p>
		<p>Vào năm 1990, Tổ chức Tiêu chuẩn Quốc tế (ISO) đã thông qua ANSI C (với một vài sửa đổi nhỏ). Phiên bản C này được gọi là C90.</p>
		<p>Năm 1999, ủy ban ANSI đã phát hành phiên bản mới của C có tên C99. Nó đã áp dụng nhiều tính năng vào compilers dưới dạng các phần mở rộng hoặc đã được triển khai trong C++. Và thế là C++ ra đời.</p>
		<h3>C++</h3>
		<p>C++ được phát triển bởi Bjarne Stroustrup tại Bell Labs, nó có thể hiểu như một phần mở rộng của C, bắt đầu từ năm 1979. C++ bổ sung nhiều tính năng mới cho ngôn ngữ C, và có lẽ nó được coi là thay thế cho C. Thực chất thì C++ nổi tiếng và được dùng nhiều là vì nó là một ngôn ngữ hướng đối tượng.</p>
		<p>Ba bản cập nhật lớn cho ngôn ngữ C++ là: C++ 11, C++ 14 và C++ 17 và được phê chuẩn vào năm 2011, 2014 và 2017, mỗi lần cập nhật là một lần thêm chức năng mới. Đặc biệt, C++ 11 đã bổ sung một số lượng lớn các khả năng mới và tại thời điểm này được coi là một nền tảng cơ sở mới.</p>
		<h3>Triết lý cốt lõi của C và C++</h3>
		<p>Triết lý cơ bản của C và C++ có thể được tóm tắt là tin tưởng vào lập trình viên – điều này thật tuyệt vời và nguy hiểm. C++ được thiết kế để cho phép lập trình viên có thể tự do làm những gì họ muốn. Tuy nhiên, sự tự do này cũng đi kèm với nhiều cạm bẫy và lỗi (BUG) mà lập trình viên mới có thể gặp phải nếu không hiểu rõ những gì mình đang làm.</p>
		<h3>Ứng dụng của C++</h3>
		<ul>
			<li>Video games</li>
			<li>Các hệ thống được vận hành trong thời gian thực (ví dụ: Các hệ thống vận chuyển, sản xuất, v.v.)</li>
			<li>Các ứng dụng tài chính hiệu suất cao (ví dụ: Các giao dịch tần suất cao)</li>
			<li>Ứng dụng đồ họa và mô phỏng</li>
			<li>Ứng dụng văn phòng</li>
			<li>Phần mềm nhúng</li>
			<li>Xử lý âm thanh và video</li>
		</ul>
</div>



    <div class="section">
        <h2>💡 Phần 2: Ví dụ minh họa</h2>
        <pre>
#include &lt;stdio.h&gt;

int main() {
    printf("Xin chào, C!\n");
    return 0;
}
        </pre>
        <p>Đây là chương trình đầu tiên in ra dòng chữ "Xin chào, C!"</p>
    </div>

    <h2>📝 Phần 3: Trắc Nghiệm</h2>
    <form id="quiz-form">
        <div class="question">
            <p><strong>Câu 1:</strong> C là ngôn ngữ được phát triển vào năm nào?</p>
            <label><input type="radio" name="q1" value="1972"> 1972</label><br>
            <label><input type="radio" name="q1" value="1980"> 1980</label><br>
            <label><input type="radio" name="q1" value="1990"> 1990</label><br>
            <label><input type="radio" name="q1" value="2000"> 2000</label>
        </div>

        <div class="question">
            <p><strong>Câu 2:</strong> Người phát triển ngôn ngữ C là ai?</p>
            <label><input type="radio" name="q2" value="Dennis Ritchie"> Dennis Ritchie</label><br>
            <label><input type="radio" name="q2" value="Ken Thompson"> Ken Thompson</label><br>
            <label><input type="radio" name="q2" value="Bjarne Stroustrup"> Bjarne Stroustrup</label><br>
            <label><input type="radio" name="q2" value="Guido van Rossum"> Guido van Rossum</label>
        </div>

        <div class="question">
            <p><strong>Câu 3:</strong> C++ ra đời vào năm nào?</p>
            <label><input type="radio" name="q3" value="1979"> 1979</label><br>
            <label><input type="radio" name="q3" value="1990"> 1990</label><br>
            <label><input type="radio" name="q3" value="1995"> 1995</label><br>
            <label><input type="radio" name="q3" value="2000"> 2000</label>
        </div>

        <div class="question">
            <p><strong>Câu 4:</strong> Ngôn ngữ C được thiết kế chủ yếu cho?</p>
            <label><input type="radio" name="q4" value="Lập trình hệ thống"> Lập trình hệ thống</label><br>
            <label><input type="radio" name="q4" value="Lập trình web"> Lập trình web</label><br>
            <label><input type="radio" name="q4" value="Lập trình ứng dụng di động"> Lập trình ứng dụng di động</label><br>
            <label><input type="radio" name="q4" value="Lập trình máy học"> Lập trình máy học</label>
        </div>

        <div class="question">
            <p><strong>Câu 5:</strong> C++ là ngôn ngữ gì?</p>
            <label><input type="radio" name="q5" value="Lập trình hướng đối tượng"> Lập trình hướng đối tượng</label><br>
            <label><input type="radio" name="q5" value="Lập trình hệ thống"> Lập trình hệ thống</label><br>
            <label><input type="radio" name="q5" value="Lập trình web"> Lập trình web</label><br>
            <label><input type="radio" name="q5" value="Lập trình đồ họa"> Lập trình đồ họa</label>
        </div>

        <button type="button" class="btn" onclick="submitQuiz()">Nộp bài</button>
    </form>

    <div id="results" class="hidden">
        <p id="score"></p>
        <button id="retry" class="btn" onclick="retryQuiz()">Làm lại bài</button>
        <button id="answer-key" class="btn" onclick="toggleAnswerKey()">Xem đáp án</button>
        <div id="answer-key-container" class="hidden">
            <ul>
                <li><strong>Câu 1:</strong> 1972</li>
                <li><strong>Câu 2:</strong> Dennis Ritchie</li>
                <li><strong>Câu 3:</strong> 1979</li>
                <li><strong>Câu 4:</strong> Lập trình hệ thống</li>
                <li><strong>Câu 5:</strong> Lập trình hướng đối tượng</li>
            </ul>
        </div>
        <div id="next-day" class="hidden">
            <a href="tuan1_ngay2.php" class="btn btn-success">▶️ Học tiếp (Ngày 2)</a>
        </div>
    </div>

    <script>
        const correctAnswers = {
            q1: '1972',
            q2: 'Dennis Ritchie',
            q3: '1979',
            q4: 'Lập trình hệ thống',
            q5: 'Lập trình hướng đối tượng'
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
            document.getElementById('score').innerText = `Bạn đã trả lời đúng ${score} / 5 câu.`;

            if (score === 5) {
                document.getElementById('next-day').classList.remove('hidden');
                // Đánh dấu hoàn thành Ngày 1
                <?php $_SESSION['ngay1_hoan_thanh'] = true; ?>
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
<form id="formHoanThanh" method="post" action="capnhat_tien_do.php">
  <input type="hidden" name="nganh" value="ngonngulaptrinh">
  <input type="hidden" name="ngonngu" value="cpp">
  <input type="hidden" name="tuan" value="1">
  <input type="hidden" name="ngay" value="1">
  <input type="hidden" name="hoanthanh" value="true">
  <input type="hidden" name="diem_tracnghiem" value="8">
  <button type="button" onclick="capNhatTienDo()">Hoàn thành bài học</button>
</form>

<script>
function capNhatTienDo() {
  const form = document.getElementById('formHoanThanh');
  const data = new FormData(form);
  
  fetch('capnhat_tien_do.php', {
    method: 'POST',
    body: data
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === 'success') {
      alert('Cập nhật tiến độ thành công');
      // Bạn có thể chuyển hướng sang bài tiếp theo hoặc mở khóa
      window.location.href = 'tuan1_ngay2.php';
    } else {
      alert('Lỗi: ' + data.message);
    }
  })
  .catch(err => alert('Lỗi kết nối: ' + err));
}
</script>

<?php
include '../../quaylai.php';
load_footer();
?>
