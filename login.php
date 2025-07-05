<?php
session_start(); // Make sure session is started
include './sql/db.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $db->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        $response['success'] = true;
    } else {
        $response['message'] = "Invalid username or password.";
    }
}

echo json_encode($response);
exit;
