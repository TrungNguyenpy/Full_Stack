<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FullStack</title>
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
   
</head>
<body>
    <div class="wrapper">
        
        <div class="header-wrapper">
            <?php include('../includes/header.php'); ?>
        </div>

        <div class="content-wrapper">
            <?php include('../pages/main.php'); ?>
        </div>       
        <div class="footer-wrapper">
            <?php include('../includes/footer.php'); ?> 
        </div>
        
        <?php include('../pages/AI.php'); ?> 
       
    </div>
</body>
</html>
