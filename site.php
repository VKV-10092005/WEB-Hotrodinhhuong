<?php
	function load_top() {
		require('widget/top.php');
	}
	function load_header() {
		require('widget/header.php');
	}
	function load_menu() {
		require('widget/menu.php');
	}
	function load_footer() {
		require('widget/footer.php');
	}


	// ✅ Hàm hiển thị menu quản trị (chỉ hiện với admin)
	function load_admin_menu() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user'])) return;

    $conn = mysqli_connect("localhost", "root", "", "hotrodinhhuong");
    mysqli_set_charset($conn, "utf8mb4");
    $tendangnhap = $_SESSION['user'];
    $result = mysqli_query($conn, "SELECT quyen FROM thongtintk WHERE tendangnhap = '$tendangnhap'");
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    if ($row && $row['quyen'] === 'admin') {
        echo '<a href="admin/admin.php" style="color: #007bff; margin: 0 15px; text-decoration: none; font-weight: 500;">👑 Quản trị</a>';
    }
}

?>
