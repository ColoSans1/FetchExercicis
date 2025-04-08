<?php
header('Content-Type: application/json');

$input = file_get_contents('php://input');

$data = json_decode($input, true);

if ($data === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit;
}
echo json_encode([
    'name' => $data['name'],
    'age' => $data['age']
]);
?>