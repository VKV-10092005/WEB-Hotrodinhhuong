<?php
session_start();
require 'site.php';
load_top();

$career = ["CNTT", "Marketing", "Kinh doanh", "Thiết kế", "Quản trị", "Tài chính", "Giáo dục", "Y tế"];

$questions = $_SESSION['questions_for_test'] ?? null;// lay ds cau hoi
$is_new_submit = !empty($_POST);
$scores = ["EI" => 0, "LS" => 0, "JP" => 0, "TF" => 0];
$max_scores = ["EI" => 0, "LS" => 0, "JP" => 0, "TF" => 0];
$career_suggestions = "";

if ($is_new_submit && $questions) {
    foreach ($questions as $index => $q) {
        $dim = $q['dimension'];
        $max_scores[$dim]++;
        if (($_POST["answer$index"] ?? null) === "agree") {
            $scores[$dim]++;
        }
    }

    // EI: Hướng nội ↔ Hướng ngoại
    // LS: Lý trí ↔ Cảm xúc
    // JP: Có kế hoạch ↔ Linh hoạt
    // TF: Cảm thông ↔ Phân tích

    function suggest_careers($scores, $max_scores) {
        $percentEI = $max_scores['EI'] > 0 ? ($scores['EI'] / $max_scores['EI'] * 100) : 0;
        $percentLS = $max_scores['LS'] > 0 ? ($scores['LS'] / $max_scores['LS'] * 100) : 0;
        $percentJP = $max_scores['JP'] > 0 ? ($scores['JP'] / $max_scores['JP'] * 100) : 0;
        $percentTF = $max_scores['TF'] > 0 ? ($scores['TF'] / $max_scores['TF'] * 100) : 0;

        $suggestions = [];
        if ($percentEI >= 60) $suggestions[] = "Marketing, Bán hàng, Quan hệ công chúng";
        else $suggestions[] = "Nghiên cứu, Lập trình, Viết lách";

        if ($percentLS >= 60) $suggestions[] = "Kỹ thuật, Phân tích dữ liệu, Kế toán";
        else $suggestions[] = "Thiết kế, Nghệ thuật, Giáo dục";

        if ($percentJP >= 60) $suggestions[] = "Quản lý dự án, Quản trị kinh doanh, Ngân hàng";
        else $suggestions[] = "Nghệ thuật sáng tạo, Khởi nghiệp, Nghiên cứu linh hoạt";

        if ($percentTF >= 60) $suggestions[] = "Tâm lý học, Y tế, Giáo dục";
        else $suggestions[] = "Luật, Khoa học máy tính, Kỹ thuật";

        return implode(", ", array_unique($suggestions));//loai bo gt trung lap,chuyển mảng thành chuổi ngăn cách ','
    }

    $career_suggestions = suggest_careers($scores, $max_scores);

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
        if ($conn) {
            mysqli_set_charset($conn, "utf8mb4");
            $update = $conn->prepare("UPDATE dangnhap SET da_lam_kiem_tra = 1 WHERE id = ?");
            $update->bind_param("i", $user_id);
            $update->execute();
            $update->close();

            $tendangnhap = $_SESSION['tendangnhap'] ?? null;
            $stmt = $conn->prepare("INSERT INTO KetQuaKiemTra (
                user_id, tendangnhap,
                diem_EI, tong_EI,
                diem_LS, tong_LS,
                diem_JP, tong_JP,
                diem_TF, tong_TF,
                goi_y_nganh,
                ngay_lam
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_DATE)
            ON DUPLICATE KEY UPDATE
                tendangnhap = VALUES(tendangnhap),
                diem_EI = VALUES(diem_EI), tong_EI = VALUES(tong_EI),
                diem_LS = VALUES(diem_LS), tong_LS = VALUES(tong_LS),
                diem_JP = VALUES(diem_JP), tong_JP = VALUES(tong_JP),
                diem_TF = VALUES(diem_TF), tong_TF = VALUES(tong_TF),
                goi_y_nganh = VALUES(goi_y_nganh),
                ngay_lam = CURRENT_DATE");
            $stmt->bind_param("isiiiiiiiss",
                $user_id, $tendangnhap,
                $scores['EI'], $max_scores['EI'],
                $scores['LS'], $max_scores['LS'],
                $scores['JP'], $max_scores['JP'],
                $scores['TF'], $max_scores['TF'],
                $career_suggestions
            );
            $stmt->execute();
            $stmt->close();
            mysqli_close($conn);
        }
    }
} else {
    if (!isset($_SESSION['user_id'])) die("Bạn chưa đăng nhập");

    $user_id = $_SESSION['user_id'];
    $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
    if (!$conn) die("Lỗi kết nối cơ sở dữ liệu.");

    mysqli_set_charset($conn, "utf8mb4");
    $stmt = $conn->prepare("SELECT diem_EI, tong_EI, diem_LS, tong_LS, diem_JP, tong_JP, diem_TF, tong_TF, goi_y_nganh FROM KetQuaKiemTra WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo '<div style="max-width: 600px; margin: 50px auto; padding: 20px; background: #fff3cd; border: 1px solid #ffeeba; border-radius: 8px; font-family: Arial, sans-serif; text-align: center;">
                <h2>⚠️ Bạn chưa làm bài kiểm tra tính cách</h2>
                <p>Vui lòng quay lại trang làm bài kiểm tra để hoàn thành bài kiểm tra trước khi xem kết quả.</p>
                <a href="kiemtra.php" style="display: inline-block; margin-top: 20px; padding: 12px 25px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">
                    Quay lại làm bài kiểm tra
                </a>
              </div>';
        exit;
    }

    $stmt->bind_result(
        $scores['EI'], $max_scores['EI'],
        $scores['LS'], $max_scores['LS'],
        $scores['JP'], $max_scores['JP'],
        $scores['TF'], $max_scores['TF'],
        $career_suggestions
    );
    $stmt->fetch();
    $stmt->close();
    mysqli_close($conn);
}

function analyze_dimension($dim, $score, $max) {
    $percent = $max > 0 ? ($score / $max * 100) : 0;
    switch ($dim) {
        case "EI": return $percent >= 60 ? "Bạn là người <b>hướng ngoại (E)</b>: năng động, thích giao tiếp, dễ hòa đồng." : "Bạn là người <b>hướng nội (I)</b>: thích sự yên tĩnh, làm việc một mình và tập trung vào nội tâm.";
        case "LS": return $percent >= 60 ? "Bạn thiên về <b>lý trí và phân tích (L)</b>: suy nghĩ logic và phân tích vấn đề rõ ràng." : "Bạn thiên về <b>cảm xúc và trực giác (S)</b>: tin vào cảm nhận và cảm xúc nhiều hơn.";
        case "JP": return $percent >= 60 ? "Bạn là người <b>có kế hoạch (J)</b>: lên kế hoạch rõ ràng và làm việc theo trật tự." : "Bạn là người <b>linh hoạt (P)</b>: dễ thích nghi, linh động và không cứng nhắc.";
        case "TF": return $percent >= 60 ? "Bạn là người <b>cảm thông (F)</b>: quan tâm tới cảm xúc, thấu hiểu người khác." : "Bạn là người <b>phân tích khách quan (T)</b>: đánh giá bằng lý trí và nguyên tắc.";
        default: return "";
    }
}

$analysis = [];
foreach ($scores as $dim => $score) {
    $analysis[$dim] = analyze_dimension($dim, $score, $max_scores[$dim]);
}
?>

<!-- 
Duyệt qua từng chiều tính cách (EI, LS, JP, TF)
Phân tích kết quả và lưu lại vào mảng $analysis để hiển thị lên giao diện web. -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Kết quả kiểm tra tính cách</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px;}
        .container { max-width: 700px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px #ccc;}
        h1, h2 { text-align: center; color: #333;}
        .result-block { background: #f1f8e9; padding: 15px; margin-bottom: 15px; border-radius: 6px; }
        .score { font-weight: bold; color: #2e7d32; }
        button { background: #28a745; color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #218838; }
        .form-section { margin-top: 30px; }
        .career-suggestions { background: #fff3cd; border: 1px solid #ffeeba; padding: 15px; border-radius: 6px; margin: 15px 0; color: #856404; }
        select, input[type="text"] { padding: 8px; width: 100%; max-width: 400px; margin-top: 10px; box-sizing: border-box;}
        label { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>📊 Kết quả bài kiểm tra tính cách</h1>
    <h2>Phân tích từng chiều tính cách</h2>
    <?php foreach ($scores as $dim => $score): ?>
        <div class="result-block">
            <p><b><?= htmlspecialchars($dim) ?>:</b> <span class="score"><?= $score ?>/<?= $max_scores[$dim] ?></span></p>
            <p><?= $analysis[$dim] ?></p>
        </div>
    <?php endforeach; ?>

    <h2>🎯 Gợi ý ngành nghề phù hợp với bạn</h2>
    <div class="career-suggestions"><?= $career_suggestions ?></div>

    <div class="form-section">
        <form action="lotrinh.php" method="post" id="formCareer">
            <label for="careerSelect">Chọn ngành nghề bạn muốn theo học hoặc làm việc:</label>
            <select id="careerSelect" name="nganh" required>
                <option value="" disabled selected>-- Chọn ngành nghề --</option>
                <?php foreach ($career as $c): ?>
                    <option value="<?= htmlspecialchars($c) ?>"><?= htmlspecialchars($c) ?></option>
                <?php endforeach; ?>
                <option value="Khác">Khác</option>
            </select>
            
            <input type="text" id="otherInput" name="nganh_khac" placeholder="Nhập ngành nghề khác" style="display:none;" />
            
            <div id="languageSelect" style="display:none; margin-top: 10px;">
                <label for="language">Chọn ngôn ngữ lập trình bạn muốn học:</label>
                <select name="ngonngu" id="language">
                    <option value="" disabled selected>-- Chọn ngôn ngữ --</option>
                    <option value="cpp">C++</option>
                    <option value="c">C</option>
                    <option value="Java">Java</option>
                    <option value="Python">Python</option>
                </select>
            </div>
            <br/><button type="submit">Xem lộ trình phát triển kỹ năng</button>
        </form>
    </div>
</div>

<script>
const careerSelect = document.getElementById('careerSelect');
const otherInput = document.getElementById('otherInput');
const languageSelect = document.getElementById('languageSelect');
const languageDropdown = document.getElementById('language');

function updateLanguageVisibility() {
    const val = careerSelect.value;//gt chon
    if (val === 'Khác') {
        otherInput.style.display = 'block';
        otherInput.required = true;
        languageSelect.style.display = 'none';
        languageDropdown.required = false;
    } else {
        otherInput.style.display = 'none';
        otherInput.required = false;
        otherInput.value = '';
        if (val === 'CNTT') {
            languageSelect.style.display = 'block';
            languageDropdown.required = true;
        } else {
            languageSelect.style.display = 'none';
            languageDropdown.required = false;
        }
    }
}

careerSelect.addEventListener('change', updateLanguageVisibility);

otherInput.addEventListener('input', function () {
    const val = this.value.trim().toLowerCase();
    if (val === 'cntt') {
        languageSelect.style.display = 'block';
        languageDropdown.required = true;
    } else {
        languageSelect.style.display = 'none';
        languageDropdown.required = false;
    }
});

document.getElementById('formCareer').addEventListener('submit', function (e) {
    if (careerSelect.value === 'Khác' && otherInput.value.trim() === '') {
        alert('Bạn vui lòng nhập ngành nghề khác.');
        e.preventDefault();
        return;
    }
    if (careerSelect.value === 'Khác') {
        careerSelect.name = 'nganh_khac';
        otherInput.name = 'nganh';
    }
});
</script>
</body>
</html>
<?php
include 'quaylai.php';
load_footer();
?>