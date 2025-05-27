<?php 
session_start();
include("../../includes/dbconnect.php");

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']); // Khớp với dữ liệu đã lưu

    $sql = "SELECT * FROM customers WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['CustomerID'];
        $_SESSION['user_name'] = $user['CustomerName'];
        $_SESSION['role'] = $user['Role'];

        // Phân quyền chuyển hướng
        if ($user['Role'] === 'admin') {
            header("Location: ../../admin/index.html");
        } else {
            header("Location: ../../pages/index.php");
        }
        exit;
    } else {
        $error = "Sai email hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="../../../fontawesome-free-6.6.0-web/css/all.css" rel="stylesheet">
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>

                                <?php if ($error): ?>
                                    <div class="alert alert-danger text-center"><?= $error ?></div>
                                <?php endif; ?>

                                <form class="user" method="POST" action="">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                               placeholder="Enter Email Address..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <a href="/" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="/" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>

<!-- JS -->
<script src="../../admin/vendor/jquery/jquery.min.js"></script>
<script src="../../admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="../../admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../../admin/js/sb-admin-2.min.js"></script>

</body>
</html>
