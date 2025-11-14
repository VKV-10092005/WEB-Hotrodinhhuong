document.addEventListener("DOMContentLoaded", () => {
  const availableLessons = [
    { id: 1, title: "Bài học 1: Giới thiệu về lập trình", url: "bai-hoc-1.html" },
    { id: 2, title: "Bài học 2: Biến và kiểu dữ liệu", url: "bai-hoc-2.html" },
    { id: 3, title: "Bài học 3: Vòng lặp trong C++", url: "bai-hoc-3.html" }
  ];

  const availableList = document.getElementById("availableLessons");
  const savedList = document.getElementById("savedLessons");
  const lessonContent = document.getElementById("lessonContent");
  const syncButton = document.getElementById("syncButton");
  const statusDiv = document.getElementById("status");

  let currentLessonUrl = ""; // Lưu url bài đang mở

  function updateStatus() {
    if (navigator.onLine) {
      statusDiv.textContent = "✅ Bạn đang online.";
      statusDiv.className = "alert success";
      syncButton.disabled = false;
    } else {
      statusDiv.textContent = "❌ Bạn đang offline.";
      statusDiv.className = "alert error";
      syncButton.disabled = true;
    }
  }

  window.addEventListener("online", updateStatus);
  window.addEventListener("offline", updateStatus);
  updateStatus();

  function createLessonItem(lesson, container, isSaved = false) {
    const li = document.createElement("li");
    li.className = "lesson-item";

    const titleSpan = document.createElement("span");
    titleSpan.textContent = lesson.title;

    const btnView = document.createElement("button");
    btnView.textContent = currentLessonUrl === lesson.url ? "Đóng" : "Xem";

    btnView.addEventListener("click", async () => {
      if (currentLessonUrl === lesson.url) {
        // Nếu đang xem thì ẩn đi
        hideContent();
        btnView.textContent = "Xem";
      } else {
        // Mở bài mới
        try {
          const response = await fetch(lesson.url);
          const html = await response.text();
          lessonContent.innerHTML = `
            <div>
              ${html}
              <div style="margin-top: 12px;">
                <button id="btnCloseLesson">Đóng nội dung</button>
              </div>
            </div>
          `;
          currentLessonUrl = lesson.url;

          // Cập nhật nút Xem/Đóng cho tất cả các bài
          updateAllViewButtons();

          // Thêm sự kiện cho nút đóng trong nội dung bài học
          document.getElementById("btnCloseLesson").addEventListener("click", () => {
            hideContent();
            updateAllViewButtons();
          });
        } catch {
          lessonContent.textContent = "⚠️ Không thể tải nội dung. Có thể bạn đang offline.";
          currentLessonUrl = "";
          updateAllViewButtons();
        }
      }
    });

    const btnSaveOrDelete = document.createElement("button");
    if (!isSaved) {
      btnSaveOrDelete.textContent = "Lưu";
      btnSaveOrDelete.addEventListener("click", () => saveLesson(lesson.id));
    } else {
      btnSaveOrDelete.textContent = "Xóa";
      btnSaveOrDelete.addEventListener("click", () => deleteLesson(lesson.id));
    }

    const btnContainer = document.createElement("div");
    btnContainer.appendChild(btnView);
    btnContainer.appendChild(btnSaveOrDelete);

    li.appendChild(titleSpan);
    li.appendChild(btnContainer);

    container.appendChild(li);
  }

  function showAvailableLessons() {
    availableList.innerHTML = "";
    availableLessons.forEach(lesson => createLessonItem(lesson, availableList, false));
  }

  function showSavedLessons() {
    const saved = JSON.parse(localStorage.getItem("savedLessons") || "[]");
    savedList.innerHTML = "";
    if (saved.length === 0) {
      savedList.innerHTML = "<li>Chưa có bài học nào được lưu.</li>";
      return;
    }
    saved.forEach(lesson => createLessonItem(lesson, savedList, true));
  }

  function updateAllViewButtons() {
    // Cập nhật lại nhãn nút "Xem"/"Đóng" theo bài đang mở
    [...availableList.querySelectorAll("li.lesson-item")].forEach(li => {
      const btn = li.querySelector("button");
      const title = li.querySelector("span").textContent;
      const lesson = availableLessons.find(l => l.title === title) ||
                     JSON.parse(localStorage.getItem("savedLessons") || "[]").find(l => l.title === title);
      if (!lesson) return;
      const btnView = li.querySelector("button");
      if (lesson.url === currentLessonUrl) {
        btnView.textContent = "Đóng";
      } else {
        btnView.textContent = "Xem";
      }
    });

    [...savedList.querySelectorAll("li.lesson-item")].forEach(li => {
      const btnView = li.querySelector("button");
      const title = li.querySelector("span").textContent;
      const saved = JSON.parse(localStorage.getItem("savedLessons") || "[]");
      const lesson = saved.find(l => l.title === title);
      if (!lesson) return;
      if (lesson.url === currentLessonUrl) {
        btnView.textContent = "Đóng";
      } else {
        btnView.textContent = "Xem";
      }
    });
  }

  function hideContent() {
    lessonContent.textContent = "Chọn bài học để xem nội dung...";
    currentLessonUrl = "";
    updateAllViewButtons();
  }

  function saveLesson(id) {
    const lesson = availableLessons.find(l => l.id === id);
    if (!lesson) return;

    let saved = JSON.parse(localStorage.getItem("savedLessons") || "[]");

    if (!saved.find(l => l.id === lesson.id)) {
      saved.push(lesson);
      localStorage.setItem("savedLessons", JSON.stringify(saved));
      alert("✅ Đã lưu bài học để học offline!");
      showSavedLessons();
    } else {
      alert("⚠️ Bài học đã được lưu trước đó.");
    }

    hideContent();
  }

  function deleteLesson(id) {
    let saved = JSON.parse(localStorage.getItem("savedLessons") || "[]");
    const lessonToDelete = saved.find(l => l.id === id);
    saved = saved.filter(l => l.id !== id);
    localStorage.setItem("savedLessons", JSON.stringify(saved));
    showSavedLessons();

    if (lessonToDelete && currentLessonUrl === lessonToDelete.url) {
      hideContent();
    }
  }

  syncButton.addEventListener("click", () => {
    alert("🔁 Đồng bộ hóa dữ liệu sẽ được triển khai sau.");
  });

  showAvailableLessons();
  showSavedLessons();
});
