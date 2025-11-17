<?php
	require 'site.php';
	load_top();
	load_menu();

	$nganh = $_GET['nganh'] ?? 'CNTT'; // Lấy ngành từ GET hoặc mặc định CNTT
?>

<div class="content" style="padding: 20px; text-align:center;">
	<h2>🔍 Chọn ngôn ngữ bạn muốn học trong ngành <?= htmlspecialchars($nganh) ?>:</h2>

	<form action="lo-trinh.php" method="post">
		<input type="hidden" name="nganh" value="<?= htmlspecialchars($nganh) ?>">
		<select name="ngonngu" required style="padding:10px; font-size:16px;">
			<option value="">-- Chọn ngôn ngữ --</option>
			<option value="C++">C++</option>
			<option value="Python">Python</option>
			<option value="JavaScript">JavaScript</option>
			<option value="Khác">Khác (Tôi muốn nhập)</option>
		</select>
		<br/><br/>
		<div id="nhapkhac" style="display:none;">
			<input type="text" name="ngonngu_khac" placeholder="Nhập ngôn ngữ khác..." style="padding:8px; width:300px;">
		</div>
		<br/>
		<button type="submit" style="padding:10px 25px;">Tiếp tục</button>
	</form>

	<script>
		document.querySelector("select[name='ngonngu']").addEventListener("change", function() {
			document.getElementById("nhapkhac").style.display = this.value === "Khác" ? "block" : "none";
		});
	</script>
</div>

<?php load_footer(); ?>
