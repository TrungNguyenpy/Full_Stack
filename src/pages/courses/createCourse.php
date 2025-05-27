<!DOCTYPE html>
<html lang="vi">
<?php 
    include("../../includes/dbconnect.php");
    include("../control/save_course.php");  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lộ trình học Fullstack</title>
    
    <link rel="stylesheet" href="../../../fontawesome-free-6.6.0-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../assets/css/create.css?v=<?php echo time(); ?>">
    
</head>
<body style="display: flex; flex-direction: column;  height: 100vh; background-color: #f4f4f4">
    <div class="wrapper">

    <!-- Header -->
        <div class="header-wrapper">
            <?php include('../../includes/header.php'); ?>
        </div>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-left: 15px;">
        <a href="../../pages/index.php"><i class="fa-solid fa-house"></i> Trang chủ</a>
        <a href="../../pages/learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
        <a href="../../pages/blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
        <a href="../../pages/stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
    </div>

    <!-- Nội dung -->
    <div class="content-wrapper">
    <div class="form-container mt-5">
        <h3 class="mb-4">Thêm khóa học mới</h3>
        <form method="POST" action="">
            <!-- Hàng 1 -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Tên khóa học</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="description" class="form-label">Trình độ</label>
                    <select class="form-select" id="level" name="level">
                        <option value="Cơ bản">Cơ bản</option>
                        <option value="Trung bình">Trung bình</option>
                        <option value="Nâng cao">Nâng cao</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
            </div>

            <!-- Hàng 2 -->
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="image" class="form-label">Ảnh khóa học (URL)</label>
                    <input type="text" class="form-control" id="image" name="img" oninput="previewImage()">
                    <div class="mt-2">
                        <img id="imagePreview" src="" alt="Ảnh xem trước" class="img-fluid rounded" style="max-height: 150px; display: none;">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="videoID" class="form-label">Video ID (YouTube)</label>
                    <input type="text" class="form-control" id="videoID" name="videoID" oninput="previewVideo()">
                    <div class="mt-2">
                        <iframe id="videoPreview" width="100%" height="150" frameborder="0" allowfullscreen style="display: none;"></iframe>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="summary" class="form-label">Mô tả ngắn</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
            </div>

            <!-- Mô tả mở rộng -->
            <div class="mb-3">
                <label for="exp" class="form-label">Học viên sẽ đạt được</label>
                <textarea class="form-control" id="exp" name="exp" rows="3"><?php echo isset($course['exp']) ? htmlspecialchars($course['exp']) : ''; ?></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Thêm khóa học</button>
               
            <?php
            if (isset($_GET['success'])) {
                echo '<div class="alert alert-success">Đã thêm khóa học thành công!</div>';
            }
            ?>
        </form>
    </div>

    </div>

    <!-- Footer -->
        <div class="footer-wrapper">
            <?php include('../../includes/footer.php'); ?> 
        </div>

        <?php include('../../pages/AI.php'); ?> 
    </div>
</body>
<script>
    function previewImage() {
        const url = document.getElementById("image").value;
        const preview = document.getElementById("imagePreview");
        if (url) {
            preview.src = url;
            preview.style.display = "block";
        } else {
            preview.style.display = "none";
        }
    }

    function previewVideo() {
        const videoID = document.getElementById("videoID").value.trim();
        const iframe = document.getElementById("videoPreview");
        if (videoID) {
            iframe.src = `https://www.youtube.com/embed/${videoID}`;
            iframe.style.display = "block";
        } else {
            iframe.style.display = "none";
        }
    }
</script>

</html>
