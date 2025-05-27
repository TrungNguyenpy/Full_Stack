<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$dbname = "th28_14"; 

// Kết nối đến MySQL
$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thiết lập charset UTF-8
if (!$conn->set_charset("utf8")) {
    die("Lỗi khi thiết lập charset UTF-8: " . $conn->error);
}

?>
