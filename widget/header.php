<!-- HEADER -->
<header style="background: snow; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #007bff;">
    <div style="font-size: 1.8rem; font-weight: bold; color: #007bff;">
        💻 Siu Nhân Team
    </div>
    <nav style="display: flex; align-items: center;">
        <a href="thanhvien.php" style="color: #007bff; margin: 0 15px; text-decoration: none; font-weight: 500;">🧑‍🤝‍🧑 Thành Viên</a>
        <a href="duan.php" style="color: #007bff; margin: 0 15px; text-decoration: none; font-weight: 500;">🧩 Dự Án</a>
        <a href="lienhe.php" style="color: #007bff; margin: 0 15px; text-decoration: none; font-weight: 500;">📩 Liên Hệ</a>

        <!-- 👑 Hiện link quản trị nếu là admin -->
        <?php load_admin_menu(); ?>
    </nav>
</header>
