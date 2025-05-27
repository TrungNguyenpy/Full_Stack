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
    <title>Khóa học</title>
    <link rel="stylesheet" href="../fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar (trái) -->
        <div class="sidebar">
            <a href="./"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <a href="./learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
            <a href="./blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
            <a href="./stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
        </div>

        <!-- Nội dung chính (phải) -->
        <div class="content">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/img/adv5.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/adv6.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/adv7.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/adv8.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/img/adv9.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Danh sách khóa học -->
            <div class="row mt-4">
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
                            <a href="./courses/courses.php?id=<?php echo $sp['id']; ?>">
                                <img src="<?php echo $sp['img']; ?>" class="card-img-top" alt="Course Image" style="height: 180px; object-fit: cover; cursor: pointer">
                            </a>
                            
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title"><?php echo $sp['name']; ?></h6>
                                <p class="card-text mb-1"><?php echo $sp['level']; ?></p>
                                <p class="card-price text-danger fw-bold"><?php echo $sp['price']; ?> VND</p>
                                <a href="./courses/courses.php?id=<?php echo $sp['id']; ?>" class="btn btn-primary mt-auto">Mua</a>
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
<script src="../../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
