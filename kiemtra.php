<?php
require 'site.php';
load_top();
//load_menu();

// 20 câu hỏi mẫu
$all_questions = [
    ["text" => "Tôi thích giao tiếp và hoạt động nhóm.", "dimension" => "EI"],
    ["text" => "Tôi thường suy nghĩ logic hơn là dựa vào cảm xúc.", "dimension" => "LS"],
    ["text" => "Tôi thích lên kế hoạch rõ ràng trước khi làm việc.", "dimension" => "JP"],
    ["text" => "Tôi thường quan tâm đến cảm xúc của người khác.", "dimension" => "TF"],
    ["text" => "Tôi cảm thấy thoải mái khi phải thuyết trình trước đám đông.", "dimension" => "EI"],
    ["text" => "Tôi thích làm việc dựa trên cảm nhận và linh cảm.", "dimension" => "TF"],
    ["text" => "Tôi ưu tiên hoàn thành công việc đúng hạn.", "dimension" => "JP"],
    ["text" => "Tôi hay tìm kiếm các giải pháp sáng tạo mới.", "dimension" => "LS"],
    ["text" => "Tôi thích sự yên tĩnh và làm việc một mình.", "dimension" => "EI"],
    ["text" => "Tôi thường phân tích chi tiết vấn đề trước khi quyết định.", "dimension" => "LS"],
    ["text" => "Tôi không thích sự thay đổi đột ngột, thích mọi thứ ổn định.", "dimension" => "JP"],
    ["text" => "Tôi dễ đồng cảm với người khác.", "dimension" => "TF"],
    ["text" => "Tôi thích thử nghiệm và sáng tạo nhiều ý tưởng mới.", "dimension" => "LS"],
    ["text" => "Tôi thường lập danh sách việc cần làm và ưu tiên rõ ràng.", "dimension" => "JP"],
    ["text" => "Tôi cảm thấy năng lượng tăng lên khi ở bên bạn bè.", "dimension" => "EI"],
    ["text" => "Tôi thường quyết định dựa trên các giá trị và cảm xúc cá nhân.", "dimension" => "TF"],
    ["text" => "Tôi thích phân tích và lý giải các vấn đề phức tạp.", "dimension" => "LS"],
    ["text" => "Tôi thích lên kế hoạch chi tiết và ít thay đổi.", "dimension" => "JP"],
    ["text" => "Tôi là người hướng ngoại và thích được chú ý.", "dimension" => "EI"],
    ["text" => "Tôi thích làm việc dựa trên trực giác và cảm xúc.", "dimension" => "TF"],
];

// Trộn và chọn 8 câu ngẫu nhiên
shuffle($all_questions);
$questions = array_slice($all_questions, 0, 8);

// Lưu mảng câu hỏi hiện tại vào session để trang kết quả xử lý chính xác
$_SESSION['questions_for_test'] = $questions;

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Kiểm tra tính cách</title>
    <link rel="stylesheet" href="CSS/cssKiemTra.css" />
</head>
<body>
    <div class="container">
        <h1>📝 Bài kiểm tra tính cách </h1>
        <form id="testForm" method="post" action="ketqua.php" onsubmit="return validateForm();">
            <div id="errorMessage" class="error" style="display:none;">Vui lòng chọn đáp án cho tất cả câu hỏi.</div>

            <?php foreach($questions as $index => $q): ?>
                <div class="question">
                    <p>Câu <?= $index + 1 ?>: <?= htmlspecialchars($q['text']) ?></p>
                    <label><input type="radio" name="answer<?= $index ?>" value="agree" required> Đồng ý</label>
                    <label><input type="radio" name="answer<?= $index ?>" value="disagree" required> Không đồng ý</label>
                </div>
            <?php endforeach; ?>

            <div style="text-align:center;">
                <button type="submit">Xem kết quả</button>
            </div>
        </form>
    </div>

<script>
    function validateForm() {
        const totalQuestions = <?= count($questions) ?>;
        for(let i=0; i < totalQuestions; i++) {
            const radios = document.getElementsByName('answer' + i);
            let answered = false;
            for(let r of radios) {
                if(r.checked) {
                    answered = true;
                    break;
                }
            }
            if(!answered) {
                document.getElementById('errorMessage').style.display = 'block';
                window.scrollTo(0,0);
                return false;
            }
        }
        return true;
    }
</script>
</body>
</html>

<?php include 'quaylai.php'; ?>

<?php
load_footer();
?>
