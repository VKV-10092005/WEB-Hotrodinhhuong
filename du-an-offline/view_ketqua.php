<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <title>Chế độ Offline</title>
  <link rel="stylesheet" href="../CSS/style.css" />
  <style>
    .alert.success { color: green; }
    .alert.error { color: red; }
    .lesson-item { margin-bottom: 8px; cursor: pointer; }
    .lesson-item button { margin-left: 8px; }
    #lessonContent {
      border: 1px solid #ccc;
      padding: 12px;
      margin-top: 16px;
      max-height: 300px;
      overflow-y: auto;
      background: #f9f9f9;
    }
  </style>
</head>
<body>
  <h1>Chế độ Offline</h1>

  <div id="status" class="alert"></div>

  <h2>Danh sách bài học sẵn có:</h2>
  <ul id="availableLessons"></ul>

  <h2>Nội dung bài học:</h2>
  <div id="lessonContent">Chọn bài học để xem nội dung...</div>

  <h2>Bài học đã lưu (offline):</h2>
  <ul id="savedLessons"></ul>

  <button id="syncButton" disabled>Đồng bộ dữ liệu khi có mạng</button>

  <script src="js/offline.js"></script>
</body>
</html>
