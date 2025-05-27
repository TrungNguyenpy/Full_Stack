<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lộ trình học Fullstack</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">

</head>
<body style="display: flex; flex-direction: column;  height: 100vh; background-color: #f4f4f4">
    <div class="wrapper">
        
        <!-- Header -->
        <div class="header-wrapper">
            <?php include('../includes/header.php'); ?>
        </div>
        <!-- Sidebar (trái) -->
        <div class="sidebar">
            <a href="../pages/"><i class="fa-solid fa-house"></i> Trang chủ</a>
            <a href="./learningPaths.php"><i class="fa-solid fa-road"></i> Lộ trình</a>
            <a href="./blog.php"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
            <a href="./stored-courses.php"><i class="fa-solid fa-store"></i> Khóa học của tôi </a>
        </div>
        <!-- Nội dung chính -->
        <div class="content-wrapper">
            <h1 class="page-title">LỘ TRÌNH HỌC FULLSTACK</h1>

            <div class="roadmap-section">
                <!-- Phần Frontend -->
                <section class="frontend-path">
                    <h2>Frontend</h2>
                    <ul>
                        <li>HTML, CSS cơ bản và nâng cao</li>
                        <li>JavaScript cơ bản -> nâng cao</li>
                        <li>Framework: ReactJS / VueJS</li>
                        <li>Quản lý trạng thái: Redux / Context API</li>
                        <li>Responsive design (Mobile first)</li>
                        <li>Testing Frontend (Jest, Testing Library)</li>
                    </ul>
                </section>

                <!-- Phần Backend -->
                <section class="backend-path">
                    <h2>Backend</h2>
                    <ul>
                        <li>Ngôn ngữ server-side: NodeJS / PHP / Python</li>
                        <li>Database: MySQL, MongoDB</li>
                        <li>API: RESTful API, GraphQL</li>
                        <li>Authentication & Authorization (JWT, OAuth)</li>
                        <li>Deploy Backend (Heroku, VPS, Docker)</li>
                        <li>Testing Backend (Postman, Mocha, Chai)</li>
                    </ul>
                </section>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-wrapper">
            <?php include('../includes/footer.php'); ?> 
        </div>
        <?php include('../pages/AI.php'); ?> 
    </div>
</body>
</html>
