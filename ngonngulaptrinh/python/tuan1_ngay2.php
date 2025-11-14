<?php
require '../../site.php';
load_top();
?>
<section id="ngay2">
    <h2>Ngày 2: Cài đặt môi trường và viết chương trình đầu tiên</h2>

    <h3>1. Cài đặt Python</h3>
    <p>Tải và cài đặt Python từ trang chủ: <a href="https://www.python.org/downloads/" target="_blank">https://www.python.org/downloads/</a></p>
    <ul>
        <li>Chọn phiên bản mới nhất của Python 3 phù hợp với hệ điều hành.</li>
        <li>Chú ý chọn "Add Python to PATH" khi cài đặt trên Windows.</li>
    </ul>

    <h3>2. Cài đặt trình soạn thảo mã nguồn (IDE)</h3>
    <ul>
        <li><a href="https://code.visualstudio.com/" target="_blank">Visual Studio Code</a> (Miễn phí, nhẹ, phổ biến)</li>
        <li><a href="https://www.jetbrains.com/pycharm/download/" target="_blank">PyCharm</a> (Phiên bản Community miễn phí)</li>
    </ul>

    <h3>3. Viết chương trình Python đầu tiên</h3>
    <p>Mở IDE hoặc trình soạn thảo bạn đã cài, tạo file <code>hello.py</code> với nội dung:</p>
    <pre><code>print("Hello, World!")</code></pre>

    <h3>4. Chạy chương trình</h3>
    <p>- Mở terminal hoặc command prompt, điều hướng đến thư mục chứa file <code>hello.py</code>.</p>
    <p>- Chạy lệnh:</p>
    <pre><code>python hello.py</code></pre>
    <p>Nếu màn hình in ra <code>Hello, World!</code> thì bạn đã thành công!</p>

    <h3>5. Tóm tắt</h3>
    <ul>
        <li>Python rất dễ cài đặt và sử dụng.</li>
        <li>Bạn đã biết cách cài môi trường và chạy chương trình đầu tiên.</li>
    </ul>

    <h3>6. Bài tập nhỏ</h3>
    <p>Thay đổi câu lệnh print để in ra tên của bạn hoặc một câu chào khác.</p>
</section>


<?php
include '../../quaylai.php';
load_footer();
?>
