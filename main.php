<!DOCTYPE html>
<html lang="en">
<?php 
    include("dbconnect.php"); 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học</title>
    <link rel="stylesheet" href="./fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar (trái) -->
        <div class="sidebar">
            <a href="#"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <a href="#"><i class="fa-solid fa-road"></i> Lộ trình</a>
            <a href="#"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
        </div>

        <!-- Nội dung chính (phải) -->
        <div class="content">
            <div class="video">
                <video src="./img/video1.mp4" autoplay muted loop></video>
            </div>


            <!-- Danh sách khóa học -->
            <div class="row">
                <h3><b>Khóa học FullStack</b></h3>
                <?php
                $query = "SELECT * FROM tbl_noidung";
                $kq = mysqli_query($conn, $query);

                if (!$kq) {
                    die("Query failed: " . mysqli_error($conn));
                }

                while ($sp = mysqli_fetch_array($kq)) {
                ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card h-100 shadow">
                            <a href="#"><img src="<?php echo $sp['img']; ?>" class="card-img-top" alt="Course Image" style="height: 180px; object-fit: cover; cusor: pointer"></a>
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title"><?php echo $sp['name']; ?></h6>
                                <p class="card-text mb-1"><?php echo $sp['level']; ?></p>
                                <p class="card-price text-danger fw-bold"><?php echo $sp['price']; ?> VND</p>
                                <a href="#" class="btn btn-primary mt-auto">Mua</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                mysqli_close($conn);
                ?>
            </div>

        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
