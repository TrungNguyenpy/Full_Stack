<?php
   require_once __DIR__ . '/../../includes/dbconnect.php';

   // Kiểm tra nếu dữ liệu được gửi từ form
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Lấy dữ liệu từ form và kiểm tra từng trường
       $name = $_POST['name'] ?? '';
       $level = $_POST['level'] ?? '';
       $price = $_POST['price'] ?? '';
       $img = $_POST['img'] ?? '';
       $videoID = $_POST['videoID'] ?? '';
       $description = $_POST['description'] ?? '';
       $exp = $_POST['exp'] ?? '';
   
       // Chuẩn bị câu lệnh SQL
       $stmt = $conn->prepare("INSERT INTO tbl_noidung (name, level, price, img, videoID, description, exp)
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
   
       if ($stmt) {
           $stmt->bind_param("sssssss", $name, $level, $price, $img, $videoID, $description, $exp);
   
           if ($stmt->execute()) {
               // Thêm thành công, có thể redirect hoặc hiển thị thông báo
               header("Location: ../../admin/createCourses.php?success=1");
               exit;
           } else {
               echo "❌ Lỗi khi thêm dữ liệu: " . $stmt->error;
           }
   
           $stmt->close();
       } else {
           echo "❌ Không thể chuẩn bị câu truy vấn: " . $conn->error;
       }
   
       $conn->close();
   } else {
       echo "⛔ Dữ liệu không được gửi qua phương thức POST.";
   }
   ?>
   