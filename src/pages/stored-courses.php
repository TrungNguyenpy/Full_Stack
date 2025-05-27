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
    <title>MyCourses</title>
    <link rel="stylesheet" href="../../fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body style="display: flex; flex-direction: column;  height: 100vh; background-color: #f4f4f4">
    <div class="wrapper">
        <div class="header-wrapper">
            <?php include('../includes/header.php'); ?>
        </div>

        <div class="sidebar" style="padding-left: 15px;">
            <a href="../pages/"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <a href="./learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
            <a href="./blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
            <a href="./stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
        </div>

        <div class="container">
            <form name="container-form" method="POST" class="mt-4" action="control/delete_course_stored.php">
                    <h3>Danh sách khóa học của tôi</h3>
            
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">#</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Trình độ</th>
                            <th scope="col" colspan="2">Thời gian tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "SELECT sc.id, sc.course_id, nd.name, nd.level, sc.registered_at
                                FROM stored_courses sc
                                JOIN tbl_noidung nd ON sc.course_id = nd.id
                                ORDER BY sc.registered_at DESC";

                        $result = $conn->query($sql);
                        ?>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Trình độ</th>
                                    <th>Thời gian đăng ký</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($row['name']); ?></td>
                                    <td><?= htmlspecialchars($row['level']); ?></td>
                                    <td><?= htmlspecialchars($row['registered_at']); ?></td>
                                    <td>
                                        <form method="post" action="control/delete_course_stored.php" onsubmit="return confirm('Bạn có chắc muốn xóa khóa học này không?');">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>

                        <?php $conn->close(); ?>

                    </tbody>
                </table>
            </form>

            <!-- Confirm Delete Modal -->
            <div id="delete-course-modal" class="modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Xóa khóa học?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Xác nhận xóa khóa học này?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button id="btn-delete-course" type="button" class="btn btn-danger">Xác nhận xóa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-wrapper">
            <?php include('../includes/footer.php'); ?> 
        </div>
        <?php include('../pages/AI.php'); ?> 
    </div>
</body>
</html>
