<?php
require_once __DIR__ . '/../../includes/dbconnect.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !is_numeric($data['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID không hợp lệ']);
    exit;
}

$id = intval($data['id']);
unset($data['id']);

if (empty($data)) {
    echo json_encode(['success' => false, 'message' => 'Không có trường nào để cập nhật']);
    exit;
}

// Tạo query động
$fields = [];
$params = [];
$types = '';

foreach ($data as $key => $value) {
    $fields[] = "$key = ?";
    $params[] = $value;
    $types .= 's';
}

$params[] = $id;
$types .= 'i';

$sql = "UPDATE tbl_noidung SET " . implode(", ", $fields) . " WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Lỗi truy vấn: ' . $conn->error]);
    exit;
}

$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => '✅ Cập nhật thành công']);
} else {
    echo json_encode(['success' => false, 'message' => '❌ Lỗi: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
