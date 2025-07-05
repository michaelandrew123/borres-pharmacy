<?php
include './sql/db.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['user'] ?? '');
    $password = $_POST['pass'] ?? '';
    $confirm  = $_POST['pass_confirm'] ?? '';

    if (empty($username) || empty($password) || empty($confirm)) {
        $response['message'] = "Please fill in all fields.";
    } elseif ($password !== $confirm) {
        $response['message'] = "Passwords do not match.";
    } else {
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $response['message'] = "Username already taken.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($insert->execute([$username, $hash])) {
                $response['success'] = true;
                $response['message'] = "Registration successful. You can now <a href='#' data-bs-toggle='modal' data-bs-target='#authModal' data-bs-dismiss='modal'>login</a>.";
            } else {
                $response['message'] = "Failed to register. Please try again.";
            }
        }
    }
}

echo json_encode($response);
exit;
