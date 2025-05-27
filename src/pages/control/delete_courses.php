<?php
require_once __DIR__ . '/../../includes/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM tbl_noidung WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "✅ Đã xóa ID $id thành công";
    } else {
        echo "❌ Lỗi xóa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
