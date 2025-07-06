<?php
include './sql/db.php';
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        if($user['type'] == 1){
            $_SESSION['admin'] = true;
        }else{
            $_SESSION['admin'] = false;
        }
        $_SESSION['username'] = $username;
        $response['success'] = true;
        $response['type'] = $_SESSION['admin'];
    } else {
        $response['message'] = "Invalid username or password.";
    }
}

echo json_encode($response);
exit;
