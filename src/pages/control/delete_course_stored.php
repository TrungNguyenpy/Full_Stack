<?php
include("../../includes/dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM stored_courses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Xóa thành công, chuyển hướng lại trang danh sách
        header("Location: ../stored-courses.php?deleted=1");

        exit();
    } else {
        echo "Lỗi khi xóa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
