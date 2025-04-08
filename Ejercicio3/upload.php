<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['error' => 'Només es permet POST']);
  exit;
}

if (!isset($_FILES['fitxer']) || $_FILES['fitxer']['error'] !== UPLOAD_ERR_OK) {
  http_response_code(400);
  echo json_encode(['error' => 'No s\'ha rebut cap fitxer vàlid']);
  exit;
}

$fitxer = $_FILES['fitxer'];

$response = [
  'nom' => $fitxer['name'],
  'mida' => $fitxer['size'],
  'mime' => $fitxer['type']
];

echo json_encode($response);
