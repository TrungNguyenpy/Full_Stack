<?php
header('Content-Type: application/json');
include("../../includes/dbconnect.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['course_id'])) {
    $course_id = intval($_POST['course_id']);

    // Kiểm tra trùng
    $check_sql = "SELECT * FROM stored_courses WHERE course_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "❗ Bạn đã đăng ký khóa học này rồi."]);
        exit;
    }

    $stmt->close();

    // Thêm mới
    $insert_sql = "INSERT INTO stored_courses (course_id) VALUES (?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("i", $course_id);
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "✅ Đăng ký khóa học thành công!"]);
    } else {
        echo json_encode(["success" => false, "message" => "❌ Lỗi khi đăng ký: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "⚠️ Dữ liệu không hợp lệ."]);
}

$conn->close();
?>
