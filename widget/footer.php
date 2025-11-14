<!-- <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang có footer</title>
    <style>
        /* Footer cuối trang */
        footer {
            background: #33ccff;
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
            margin-top: 60px;
            border-top: 3px solid #0056b3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 6px 0;
            font-size: 1rem;
        }

        footer span {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <footer>
        <p>
            © 2025 <strong>Định Hướng Bản Thân</strong> | Thiết kế bởi <strong>Năm Anh Em Siu Nhân</strong>
        </p>
        <p style="font-size: 0.95rem; color: #f1f1f1;">
            Mọi quyền được bảo lưu — Powered by <span>Code</span> & <span>Tình bạn 📘💖</span>
        </p>
    </footer>

</body>
</html> -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$hoten = isset($_SESSION['hoten']) ? $_SESSION['hoten'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chat hỗ trợ</title>
    <style>
        /* Vị trí tổng thể của khung chat */
#chat-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1000;
}

/* Nút bong bóng bật/tắt chat */
#chat-toggle {
    background: #007bff;
    color: white;
    padding: 12px 18px;
    border-radius: 50px;
    cursor: move;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    user-select: none;
}

/* Hộp chat */
#chat-wrapper {
    width: 320px;
    background: white;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    margin-top: 10px;
    display: none;
    max-height: 480px;
    flex-direction: column;
}

/* Phần đầu hộp chat */
.chat-header {
    background: #007bff;
    color: white;
    padding: 10px;
    font-weight: bold;
    font-size: 15px;
}

/* Vùng tin nhắn chat */
.chat-box {
    max-height: 160px;
    overflow-y: auto;
    padding: 10px;
    font-size: 14px;
    border-bottom: 1px solid #eee;
}

/* Tin nhắn */
.message {
    margin-bottom: 8px;
    padding: 8px 10px;
    border-radius: 8px;
    max-width: 90%;
    word-wrap: break-word;
}

/* Tin nhắn từ bot */
.message.bot {
    background: #f1f1f1;
    text-align: left;
    color: #333;
}

/* Tin nhắn người dùng */
.message.user {
    background: #d1e7dd;
    text-align: right;
    color: #0b5138;
}

/* Form nhập tin nhắn */
#chat-form {
    display: flex;
    flex-direction: column;
    gap: 6px;
    padding: 10px;
    border-top: 1px solid #ccc;
}

#chat-form textarea {
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    resize: none;
    height: 60px;
}

#chat-form button {
    background: #007bff;
    color: white;
    padding: 8px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

#chat-form button:hover {
    background: #0056b3;
}

/* QR fanpage và nhóm Messenger */
.group-box {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #f1f1f1;
}

.qr-image img {
    width: 70px;
    height: auto;
    border-radius: 8px;
    margin-right: 12px;
}

.group-info p {
    margin: 0;
    font-size: 13px;
    color: #333;
}

.group-info a {
    color: #007bff;
    text-decoration: none;
    font-size: 13px;
}

.group-info a:hover {
    text-decoration: underline;
}

/* Footer cuối trang */
footer {
    background: #33ccff;
    color: #ffffff;
    padding: 30px 20px;
    text-align: center;
    margin-top: 60px;
    border-top: 3px solid #0056b3;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

footer p {
    margin: 6px 0;
    font-size: 1rem;
}

footer span {
    font-weight: bold;
}

    </style>
</head>
<body>

<footer>
    <p style="margin: 6px 0; font-size: 1rem;">
        © 2025 <strong>Định Hướng Bản Thân</strong> | Thiết kế bởi <strong>Năm Anh Em Siu Nhân</strong>
    </p>
    <p style="font-size: 0.95rem; color: #f1f1f1;">
        Mọi quyền được bảo lưu — Powered by <span>Code</span> & <span>Tình bạn 📘💖</span>
    </p>
</footer>

<!-- Container chứa cả bong bóng và hộp chat -->
<div id="chat-container">
    <div id="chat-toggle" onclick="toggleChat()">💬 Hỗ trợ</div>
    <div id="chat-wrapper">
    <div class="chat-header">
        💬 Chat với Hỗ trợ
        <span onclick="toggleChat()" style="float:right; cursor:pointer;">❌</span>
    </div>

    <div class="chat-box" id="chat-box">
        <div class="message bot">Xin chào! Bạn cần hỗ trợ gì? 💡</div>
    </div>

    <div class="group-box">
        <div class="qr-image">
            <img src="images/fb.jpg" alt="QR Fanpage Facebook">
        </div>
        <div class="group-info">
            <p><strong>🌐 Fanpage:</strong><br>
            <a href="https://www.facebook.com/share/g/1CdkUovifc/" target="_blank">
                Hỗ Trợ Định Hướng Phát Triển Bản Thân
            </a></p>
        </div>
    </div>

    <div class="group-box">
        <div class="qr-image">
            <img src="images/mes.jpg" alt="QR Messenger">
        </div>
        <div class="group-info">
            <p><strong>💬 Messenger:</strong><br>
            <a href="https://m.me/ch/AbaJOOUWUIQtNJ6g/" target="_blank">Nhóm Hỗ Trợ</a></p>
        </div>
    </div>

    <form id="chat-form">
        <textarea id="message" placeholder="Tin nhắn..." required></textarea>
        <button type="submit">📨 Gửi</button>
    </form>
</div>

</div>

<!-- JavaScript xử lý -->
<script>
    let chatVisible = false;
    const name = <?= json_encode($hoten) ?>;
    const email = <?= json_encode($email) ?>;

    function toggleChat() {
        const wrapper = document.getElementById("chat-wrapper");
        chatVisible = !chatVisible;
        wrapper.style.display = chatVisible ? "block" : "none";
    }

    document.getElementById("chat-form").addEventListener("submit", function(e) {
        e.preventDefault();

        const box = document.getElementById("chat-box");
        const message = document.getElementById("message").value.trim();

        if (!name || !email) {
            alert("❗ Bạn cần đăng nhập để gửi yêu cầu hỗ trợ.");
            return;
        }

        if (message) {
            const userMsg = document.createElement("div");
            userMsg.className = "message user";
            userMsg.textContent = message;
            box.appendChild(userMsg);
            box.scrollTop = box.scrollHeight;

            fetch("/dinh-huong/guithongtin_ajax.php", {
                method: "POST",
                headers: {"Content-Type": "application/x-www-form-urlencoded"},
                body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}`
            }).then(() => {
                const botMsg = document.createElement("div");
                botMsg.className = "message bot";
                botMsg.textContent = "✅ Cảm ơn bạn! Chúng tôi đã nhận được yêu cầu.";
                box.appendChild(botMsg);
                box.scrollTop = box.scrollHeight;
                document.getElementById("message").value = "";
            });
        }
    });

    // Kéo cả container
    (function() {
        const container = document.getElementById("chat-container");
        const toggle = document.getElementById("chat-toggle");
        let isDragging = false;
        let offsetX, offsetY;

        toggle.addEventListener("mousedown", function(e) {
            isDragging = true;
            offsetX = e.clientX - container.getBoundingClientRect().left;
            offsetY = e.clientY - container.getBoundingClientRect().top;
            container.style.transition = "none";
        });

        document.addEventListener("mousemove", function(e) {
            if (isDragging) {
                container.style.left = (e.clientX - offsetX) + "px";
                container.style.top = (e.clientY - offsetY) + "px";
                container.style.right = "auto";
                container.style.bottom = "auto";
                container.style.position = "fixed";
            }
        });

        document.addEventListener("mouseup", function() {
            isDragging = false;
            container.style.transition = "";
        });
    })();
</script>

</body>
</html>