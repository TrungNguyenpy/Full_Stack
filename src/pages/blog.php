<!DOCTYPE html>
<html lang="en">
<?php 
    include("../includes/dbconnect.php"); 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post List</title>
    <link rel="stylesheet" href="../../fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
   
</head>
<body style="display: flex; flex-direction: column;  height: 100vh; background-color: #f4f4f4">

<?php include('../includes/header.php'); ?>
<!-- Sidebar (trái) -->
<div class="sidebar" style="padding-left: 15px;">
            <a href="../pages/"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <a href="./learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
            <a href="./blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
            <a href="./stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
        </div>

<div class="container">
    <div class="mb-4">
        <h2>CÁC BÀI VIẾT NỔI BẬT</h2>
        <form action="" method="GET" class="search-form">
            <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm bài viết..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <button type="submit" class="btn">Tìm kiếm</button>
        </form>
    </div>
    <?php
        // Số bài viết mỗi trang
        $postsPerPage = 6;

        // Xác định trang hiện tại
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($currentPage - 1) * $postsPerPage;

        // Lấy từ khóa tìm kiếm
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        // Tạo câu query cơ bản
        $where = '';
        if (!empty($keyword)) {
            // Nếu có từ khóa, thêm điều kiện tìm kiếm
            $safeKeyword = $conn->real_escape_string($keyword);
            $where = "WHERE title LIKE '%$safeKeyword%' OR content LIKE '%$safeKeyword%'";
        }

        // Đếm tổng số bài viết để phân trang
        $totalPostsResult = $conn->query("SELECT COUNT(*) as total FROM posts $where");
        $totalPostsRow = $totalPostsResult->fetch_assoc();
        $totalPosts = $totalPostsRow['total'];
        $totalPages = ceil($totalPosts / $postsPerPage);

        // Lấy bài viết theo keyword + phân trang
        $result = $conn->query("SELECT * FROM posts $where ORDER BY created_at DESC LIMIT $postsPerPage OFFSET $offset");
    ?>

<div class="row">
    <!-- Cột bài viết -->
    <div class="col-md-9">
        <?php while ($row = $result->fetch_assoc()): ?>
            <!-- Bài viết -->
            <div class="card mb-3" style="border-radius: 16px; overflow: hidden;">
                <div class="row g-0">
                 
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="#" style="text-decoration: none; color: black;"> <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5></a> 
                            <p class="card-text"><?= nl2br(htmlspecialchars(mb_strimwidth($row['content'], 0, 100, "..."))) ?></p>
                            <p class="card-text"><small class="text-body-secondary">Last updated: <?= $row['updated_at'] ?></small></p>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this post?');">Delete</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php if ($row['image_url']): ?>
                            <a href="#"> <img src="<?= htmlspecialchars($row['image_url']) ?>" class="post-image" alt="Post image"></a>
                           
                        <?php else: ?>
                            <img src="https://via.placeholder.com/150" class="post-image" alt="No image" style="width: 100%; height: auto;">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

                <!-- Cột quảng cáo -->
                <div class="col-md-3">
                    <div class="ad-banner mb-4" style="position: sticky; top: 100px;">
                    <h4 class="ad-title" style="text-align: center; margin-bottom: 15px;">Code never lies, comments sometimes do.</h4>
                        <img src="../assets/img/adv3.jpg" alt="Advertisement" style="width: 100%; border-radius: 16px; margin-bottom: 20px;">
                        
                        <img src="../assets/img/adv2.jpg" alt="Advertisement" style="width: 100%; border-radius: 16px; margin-bottom: 20px;">
                    </div>
                    
                </div>
            </div>
        </div>

                
        <!-- Phân trang -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Nút Previous -->
                <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $currentPage - 1 ?>&keyword=<?= urlencode($keyword) ?>">&laquo;</a>
                </li>

                <!-- Các số trang -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&keyword=<?= urlencode($keyword) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Nút Next -->
                <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $currentPage + 1 ?>&keyword=<?= urlencode($keyword) ?>">&raquo;</a>
                </li>
            </ul>
        </nav>

    <?php include('../includes/footer.php'); ?> 
    <?php include('../pages/AI.php'); ?> 
</body>
</html>