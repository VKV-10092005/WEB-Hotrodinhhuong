<?php
session_start();
require 'site.php';
load_top();

// 🧩 Xử lý reset hoặc đổi lộ trình
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'reset' || $_POST['action'] === 'change') {
        unset($_SESSION['nganh'], $_SESSION['ngonngu']);
        if (isset($_SESSION['user'])) {
            $tendangnhap = $_SESSION['user'];
            $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
            if ($conn) {
                mysqli_set_charset($conn, "utf8mb4");
                $stmt = $conn->prepare("UPDATE thongtinTK SET nganh_nghe = '', ngon_ngu = '' WHERE tendangnhap = ?");
                if ($stmt) {
                    $stmt->bind_param("s", $tendangnhap);
                    $stmt->execute();
                    $stmt->close();
                }
                mysqli_close($conn);
            }
        }
    }
}

// Đọc lại session sau xử lý
$nganh = $_SESSION['nganh'] ?? '';
$ngonngu = $_SESSION['ngonngu'] ?? '';
$nganh_khac = '';

// Nếu đã đăng nhập nhưng chưa có ngành thì lấy từ DB
if (isset($_SESSION['user']) && $nganh === '') {
    $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
    if ($conn) {
        mysqli_set_charset($conn, "utf8mb4");
        $user = $_SESSION['user'];
        $result = mysqli_query($conn, "SELECT nganh_nghe, ngon_ngu FROM thongtinTK WHERE tendangnhap = '$user'");
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['nganh'] = $row['nganh_nghe'];
            $_SESSION['ngonngu'] = $row['ngon_ngu'];
            $nganh = $row['nganh_nghe'];
            $ngonngu = $row['ngon_ngu'];
        }
        mysqli_close($conn);
    }
}

// 🧩 Hàm bỏ dấu tiếng Việt
function bo_dau($str) {
    $unicode = [
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    ];
    foreach($unicode as $nonUnicode=>$uni) {
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}

// 🧩 Xử lý chọn ngành/ngôn ngữ
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['action'])) {
    $nganh = $_POST['nganh'] ?? '';
    $nganh_khac = $_POST['nganh_khac'] ?? '';
    $ngonngu = $_POST['ngonngu'] ?? '';

    if ($nganh === 'khac' && trim($nganh_khac) !== '') {
        $nganh = trim($nganh_khac);
    }

    // 🧩 Xóa ngôn ngữ nếu ngành không phải CNTT
    $nganh_lower = mb_strtolower(bo_dau($nganh));
if ($nganh_lower !== 'cntt' && $nganh_lower !== 'cong nghe thong tin') {
        $ngonngu = '';
    }

    $_SESSION['nganh'] = $nganh;
    $_SESSION['ngonngu'] = $ngonngu;

    // 🧩 Lưu vào database nếu có tài khoản
    if (isset($_SESSION['user'])) {
        $tendangnhap = $_SESSION['user'];
        $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
        if ($conn) {
            mysqli_set_charset($conn, "utf8mb4");
            $stmt = $conn->prepare("UPDATE thongtinTK SET nganh_nghe = ?, ngon_ngu = ? WHERE tendangnhap = ?");
            if ($stmt) {
                $stmt->bind_param("sss", $nganh, $ngonngu, $tendangnhap);
                $stmt->execute();
                $stmt->close();
            }
            mysqli_close($conn);
        }
    }
}
?>

<link rel="stylesheet" href="CSS/cssLoTrinh.css">

<?php if ($nganh !== ''): ?>
<div class="container" style="padding: 20px;">
    <h3>🔁 Bạn đã có lộ trình đang lưu:</h3>
    <p>
        Ngành: <strong><?= htmlspecialchars($nganh) ?></strong>
        <?php 
        // 🧩 Chỉ hiển thị ngôn ngữ nếu ngành là CNTT
        $nganh_no_dau = bo_dau(mb_strtolower($nganh));
        if (($nganh_no_dau === 'cntt' || $nganh_no_dau === 'cong nghe thong tin') && $ngonngu): ?>
            , Ngôn ngữ: <strong><?= strtoupper(htmlspecialchars($ngonngu)) ?></strong>
        <?php endif; ?>
    </p>
    <form method="POST" style="display:inline;">
        <input type="hidden" name="action" value="change">
        <button type="submit">🔄 Đổi lộ trình</button>
    </form>
    <form method="POST" style="display:inline;">
        <input type="hidden" name="action" value="reset">
        <button type="submit" style="color:red;">❌ Xóa lộ trình</button>
    </form>
</div>
<?php endif; ?>

<?php if ($nganh === ''): ?>
<div class="container" style="padding: 20px;">
    <h2>🎓 Chọn Ngành Học Bạn Muốn</h2>
    <form method="POST">
        <label>Ngành:</label>
        <select name="nganh" id="nganh" required onchange="toggleNgonNgu(); toggleNganhKhac();">
            <option value="">--Chọn ngành--</option>
            <option value="giaothongvantai">Giao thông vận tải</option>
            <option value="khoahocmaytinh">Khoa học máy tính</option>
            <option value="kinhte">Kinh tế</option>
            <option value="CNTT">Công nghệ thông tin</option>
            <option value="khac">Khác</option>
        </select>

        <div id="nganh-khac-section" style="display:none;">
            <label>Ngành khác:</label>
            <input type="text" name="nganh_khac" id="nganh_khac">
        </div>

        <div id="ngonngu-section" style="display:none;">
            <label>Ngôn ngữ lập trình:</label>
            <select name="ngonngu" id="ngonngu">
                <option value="">--Chọn--</option>
                <option value="cpp">C++</option>
                <option value="c">C</option>
<option value="java">Java</option>
                <option value="python">Python</option>
            </select>
        </div>

        <button type="submit" style="margin-top: 10px;">Xem lộ trình</button>
    </form>
</div>
<?php endif; ?>

<script>
function toggleNgonNgu() {
    const nganh = document.getElementById('nganh').value;
    const ngonngu = document.getElementById('ngonngu-section');
    const nganhKhac = document.getElementById('nganh_khac');

    if (nganh === 'CNTT') {
        ngonngu.style.display = 'block';
    } else if (nganh === 'khac') {
        let val = nganhKhac.value.trim().toLowerCase();
        val = val.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        if (val === 'cntt' || val === 'cong nghe thong tin') {
            ngonngu.style.display = 'block';
        } else {
            ngonngu.style.display = 'none';
        }
    } else {
        ngonngu.style.display = 'none';
    }
}
function toggleNganhKhac() {
    const nganh = document.getElementById('nganh').value;
    document.getElementById('nganh-khac-section').style.display = nganh === 'khac' ? 'block' : 'none';
}
window.onload = function() {
    toggleNganhKhac();
    toggleNgonNgu();
    document.getElementById('nganh_khac').addEventListener('input', toggleNgonNgu);
};
</script>

<?php
if ($nganh !== '') {
    $nganh_nodau = bo_dau(mb_strtolower($nganh));
    echo '<div class="container" style="padding: 20px;">';

    $co_file_lotrinh = false;

    if ($nganh_nodau === 'cntt' || $nganh_nodau === 'cong nghe thong tin') {
        if ($ngonngu) {
            echo "<h3>Lộ trình CNTT với ngôn ngữ: " . strtoupper($ngonngu) . "</h3>";
            $file = "ngonngulaptrinh/{$ngonngu}/lotrinh.php";
            $co_file_lotrinh = file_exists($file);
            if ($co_file_lotrinh) include $file;
            else echo "<p style='color:red;'>⛔ Chưa có lộ trình cho ngôn ngữ này</p>";
        } else {
            echo "<p style='color:red;'>⚠️ Vui lòng chọn ngôn ngữ</p>";
        }
    } else {
        echo "<h3>Lộ trình ngành: " . htmlspecialchars($nganh) . "</h3>";
        $file = "nganh/{$nganh_nodau}/lotrinh.php";
        $co_file_lotrinh = file_exists($file);
        if ($co_file_lotrinh) include $file;
        else echo "<p style='color:orange;'>⚠️ Chưa có lộ trình chi tiết</p>";
    }

    // 🧩 Nút bắt đầu học
    if ($co_file_lotrinh):
?>
    <!-- <div style="margin: 30px 0; text-align: center;">
        <form method="POST" action="quatrinh.php">
            <input type="hidden" name="nganh" value="<?= htmlspecialchars($nganh) ?>">
            <?php if ($nganh_nodau === 'cntt' || $nganh_nodau === 'cong nghe thong tin'): ?>
                <input type="hidden" name="ngonngu" value="<?= htmlspecialchars($ngonngu) ?>">
            <?php endif; ?>
            <input type="hidden" name="tuan" value="1">
            <input type="hidden" name="ngay" value="1">
            <button type="submit"
style="padding: 12px 30px; font-size: 1.1em;
                           background-color: #28a745; color: white;
                           border: none; border-radius: 8px; cursor: pointer;">
                🚀 Bắt đầu học
            </button>
        </form>
    </div> -->
<?php
    endif;
    echo '</div>';
}
?>

<?php
include 'quaylai.php';
load_footer();
?>