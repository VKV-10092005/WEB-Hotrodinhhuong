<?php
$conn = new mysqli("localhost", "root", "123456", "tainguyenhoctap");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_POST['upload'], $_FILES['pdf_file'], $_POST['chuyennganh'])) {
    $chuyennganh = $_POST['chuyennganh'];

    $folderMap = [
        'httt' => '../uploads/tainguyen_httt/',
        'cnpm' => '../uploads/tainguyen_cnpm/',
        'khmt' => '../uploads/tainguyen_khmt/',
        'mmt'  => '../uploads/tainguyen_mmt/'
    ];

    if (!isset($folderMap[$chuyennganh])) {
        echo "❌ Mã chuyên ngành không hợp lệ.";
        exit;
    }

    if ($_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['pdf_file']['name'];
        $tmpPath = $_FILES['pdf_file']['tmp_name'];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if ($ext !== 'pdf') {
            echo "❌ Chỉ chấp nhận file PDF.";
            exit;
        }

        $targetFolder = $folderMap[$chuyennganh];
        $realFolder = realpath($targetFolder);
        $realFilePath = $realFolder . DIRECTORY_SEPARATOR . $filename;

        // Kiểm tra xem file này đã tồn tại sẵn trong đúng folder không
        if (file_exists($realFilePath)) {
            // Không cần move_uploaded_file nữa, chỉ xác nhận trong database
            $stmt = $conn->prepare("INSERT INTO tailieu (filename, chuyennganh) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $chuyennganh);
            if ($stmt->execute()) {
                echo "✅ File đã tồn tại sẵn trong thư mục ngành và được ghi nhận!";
            } else {
                echo "❌ Lỗi ghi CSDL: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "❌ File không tồn tại trong thư mục đúng với chuyên ngành đã chọn.";
        }

        // Dọn dẹp file tạm nếu có
        if (file_exists($tmpPath)) {
            unlink($tmpPath);
        }
    } else {
        echo "❌ Lỗi upload file.";
    }
} else {
    echo "❌ Thiếu dữ liệu upload.";
}
include '../quaylai.php';
?>
