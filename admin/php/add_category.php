<?php
include './../../sql/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['category_name'] ?? '');

    if ($name === '') {
        echo json_encode(['success' => false, 'message' => 'Category name is required.']);
        exit;
    }

    try {
        $stmt = $db->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$name]);
        $id = $db->lastInsertId();

        echo json_encode(['success' => true, 'id' => $id, 'name' => htmlspecialchars($name)]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Category already exists or error occurred.']);
    }
}
?>
