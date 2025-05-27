<?php
require_once __DIR__ . '/../../includes/dbconnect.php';

$result = $conn->query("SELECT * FROM tbl_noidung");

$courses = [];
while ($row = $result->fetch_assoc()) {
  $courses[] = $row;
}

header('Content-Type: application/json');

// Nếu gọi với ?mode=datatable → định dạng DataTables
if (isset($_GET['mode']) && $_GET['mode'] === 'datatable') {
  echo json_encode(['data' => $courses]);
} else {
  echo json_encode($courses);
}

$conn->close();
?>
