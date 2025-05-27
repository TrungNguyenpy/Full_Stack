<!DOCTYPE html>
<html lang="vi">
<?php 
    include("../../includes/dbconnect.php");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Khóa Học</title>

  <link rel="stylesheet" href="../../../fontawesome-free-6.6.0-web/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body style="display: flex; flex-direction: column;  height: 100vh; background-color: #f4f4f4">

    <div class="header-wrapper">
        <?php include('../../includes/header.php'); ?>
    </div>
    <!-- Sidebar (trái) -->
    <div class="sidebar" style="padding-left: 15px;">
        <a href="../../pages/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
        <a href="../../pages/learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
        <a href="../../pages/blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
        <a href="../../pages/stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
    </div>

    <div class="container">
        <div class="row">
            <!-- Nội dung khóa học -->
            <div class="col-md-8">
                <?php
                // Lấy ID khóa học từ URL
                $courseID = isset($_GET['id']) ? $_GET['id'] : 1; // Nếu không có ID, mặc định lấy khóa học có ID = 1

                $sql = "SELECT name, level, videoID, price, img, description, exp FROM tbl_noidung WHERE id = $courseID";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $course = $result->fetch_assoc();
                } else {
                    echo "<p>Không tìm thấy khóa học.</p>";
                    $course = null;
                }

                $conn->close();
                ?>

                <?php if ($course): ?>
                <div class="mb-4">
                    <div class="courses" >
                        <div class="card" style="background-color: #f4f4f4; border: none;">
                            <div class="row g-4" style="padding: 0 24px 0 24px;">
                                <div class="col-md-3">
                                <img src="../<?php echo htmlspecialchars(ltrim($course['img'], '/')); ?>" class="img-fluid rounded" alt="Thumbnail khóa học">

                                </div>
                                <div class="col-md-9">
                                    <h1 class="h3 fw-bold"><?php echo htmlspecialchars($course['name']); ?></h1>
                                    <p><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Thành quả đạt được -->
                <div class="courses">
                    <div class="card" style="background-color: #f4f4f4; border: none; padding: 0 24px 0 24px;">
                        <h2 class="h5 fw-bold mb-3">📌 Bạn sẽ học được gì?</h2>
                        <ul class="list-group list-group-flush">
                            <?php
                                $expItems = explode("\n", $course['exp']); // Tách mỗi dòng thành một phần tử
                                foreach ($expItems as $item) {
                                    echo '<li class="list-group-item">' . htmlspecialchars(trim($item)) . '</li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>

                
                <!-- Danh sách video bài học -->
                <div class="courses">
                    <div class="card p-4" style="background-color: #f4f4f4; border: none;">
                        <h2 class="h5 fw-bold mb-3">🎬 Nội dung khóa học</h2>

                        <!-- Accordion danh sách chương -->
                        <div class="accordion" id="courseContent">
                            <!-- Chương 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                        📂 Chương 1: Giới thiệu và Cài đặt
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">🔓 Bài 1. Giới thiệu khóa học (05:32) <button class="btn btn-sm btn-primary float-end">Xem</button></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>      
                <?php endif; ?>
            </div>

            <!-- Sidebar bên phải -->
            <div class="col-md-4" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; text-align: center;">
                <div class="">
                    <!-- Video Container -->
                    <div class="video-container">
                        <!-- Thẻ iframe nhúng video YouTube -->
                        <iframe id="myVideo" width="560" height="315" src="https://www.youtube.com/embed/<?php echo htmlspecialchars($course['videoID']); ?>?enablejsapi=1" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                            encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    
                    <h4 style="text-align: center; margin-bottom: 15px; color: #ff671c; font-size: 35px; font-weight: 400;"><?php echo htmlspecialchars($course['price']); ?></h4>
                    <form id="registerForm">
                        <input type="hidden" name="course_id" value="<?php echo $courseID; ?>">
                        <button type="submit" class="register btn btn-primary">Đăng ký học</button>
                    </form>

                    <div id="registerMessage" class="mt-3"></div>


                    <div class="text-muted" style="white-space: pre-line;">
                        ⏱️ 12 giờ học  
                        👨‍🎓<?php echo htmlspecialchars($course['level']); ?>
                        🎯 1.200 học viên
                    </div>
                </div> 
            </div>

        </div>
    </div>

    <div class="footer-wrapper">
        <?php include('../../includes/footer.php'); ?> 
    </div>

    <?php include('../../pages/AI.php'); ?> 
   

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('registerForm').addEventListener('submit', function (e) {
        const confirmed = confirm("📌 Bạn có chắc chắn muốn đăng ký khóa học này?");
        if (!confirmed) return;

        e.preventDefault();

        const formData = new FormData(this);
        const messageDiv = document.getElementById('registerMessage');
        fetch('../control/register_course.php', {

            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            messageDiv.innerHTML = `<div class="alert ${data.success ? 'alert-success' : 'alert-danger'}">${data.message}</div>`;
        })
        .catch(err => {
            messageDiv.innerHTML = '<div class="alert alert-danger">❌ Có lỗi xảy ra.</div>';
            console.error(err);
        });
    });
</script>
</html>
