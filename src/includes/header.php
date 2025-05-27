<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyễn Thành Trung</title>
    <link rel="stylesheet" href="../../fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= time(); ?>">
</head>
<body>
        <div class="header-content">
            <!-- Logo và tên website -->
            <div class="logo-container">
                <img src="/NguyenThanhTrung/src/assets/img/logo.jpg" alt="Logo">
                <a href="/NguyenThanhTrung/src/pages/">Học lập trình để đi làm</a>     
            </div>

            <!-- Thanh tìm kiếm -->
            <div class="search-container">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Tìm kiếm khóa học, bài viết, video,...">
            </div>

            <!-- Các nút Đăng nhập và Đăng ký -->
            <div class="button-container">
               <a href="/NguyenThanhTrung/src/pages/auth/login.php"><button class="logIn">Đăng nhập</button></a> 
               <a href="/NguyenThanhTrung/src/pages/auth/register.php"><button class="register">Đăng ký</button></a>
            </div>
        </div>
    
</body>
</html>
