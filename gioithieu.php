

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - Hỗ trợ định hướng bản thân</title>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(135deg, #a2c2e3, #e0f7fa);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            max-width: 900px;
            text-align: center;
            animation: fadeIn 0.7s ease-in-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h1 {
            color: #0077b6;
            margin-bottom: 15px;
            font-size: 32px;
        }

        h2 {
            color: #023e8a;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            text-align: justify;
        }

        ul {
            text-align: left;
            margin-left: 20px;
        }

        .button-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        a.button-link {
            display: inline-block;
            text-decoration: none;
            background: #0077b6;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        a.button-link:hover {
            background: #023e8a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌟 Chào mừng đến với Website Hỗ trợ Định hướng Bản thân 🌟</h1>

        <p>
            Nền tảng này được thiết kế nhằm giúp bạn khám phá bản thân, nhận diện tính cách,  
            xác định ngành nghề phù hợp và xây dựng lộ trình học tập, phát triển kỹ năng một cách cá nhân hóa.  
            Dù bạn là học sinh, sinh viên hay người đi làm, website này sẽ đồng hành cùng bạn trên hành trình phát triển cá nhân.
        </p>

        <h2>🌱 Lợi ích khi sử dụng</h2>
        <ul>
            <li>Hiểu rõ điểm mạnh, điểm yếu của bản thân và tiềm năng cá nhân.</li>
            <li>Được gợi ý ngành nghề phù hợp dựa trên bài kiểm tra tính cách.</li>
            <li>Xây dựng lộ trình học tập chi tiết, theo ngày, theo tuần, và theo từng kỹ năng cần phát triển.</li>
            <li>Theo dõi tiến độ học tập, tự đánh giá và nhận phản hồi về sự tiến bộ của bản thân.</li>
            <li>Hỗ trợ truy cập offline, cho phép học tập mọi lúc mọi nơi.</li>
            <li>Giao diện thân thiện, dễ sử dụng và trực quan.</li>
        </ul>

        <h2>💡 Hướng dẫn sơ lược</h2>
        <ol style="text-align: left; margin-left: 20px;">
            <li>Đăng nhập hoặc tạo tài khoản mới để bắt đầu.</li>
            <li>Làm bài kiểm tra tính cách & sở thích nghề nghiệp để website đánh giá và gợi ý ngành nghề phù hợp.</li>
            <li>Xem kết quả kiểm tra và lựa chọn ngành nghề bạn muốn theo học hoặc phát triển.</li>
            <li>Tiếp cận <b>lộ trình phát triển kỹ năng chi tiết</b> theo ngành nghề đã chọn.</li>
            <li>Theo dõi tiến độ học tập từng ngày, từng tuần, và đánh giá sự phát triển của bản thân.</li>
            <li>Tiếp tục học tập, làm bài tập, hoặc tham khảo tài nguyên được gợi ý để nâng cao kỹ năng.</li>
        </ol>

        <h2>🚀 Bắt đầu ngay</h2>
        <p>Hãy đăng nhập hoặc đăng ký để bắt đầu khám phá bản thân và xây dựng lộ trình học tập cá nhân hóa!</p>

        <div class="button-container">
            <a href="dangnhap.php" class="button-link">Đăng nhập</a>
            <a href="dangky.php" class="button-link">Đăng ký</a>
        </div>
    </div>
</body>
</html>

