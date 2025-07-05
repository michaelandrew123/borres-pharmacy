<?php

include './sql/db.php';

$err = '';
$success = '';

if ($_POST) {
    $username = trim($_POST['user']);
    $password = $_POST['pass'];
    $confirm = $_POST['pass_confirm'];

    // Basic validation
    if (empty($username) || empty($password) || empty($confirm)) {
        $err = "Please fill in all fields.";
    } elseif ($password !== $confirm) {
        $err = "Passwords do not match.";
    } else {
        // Check if username already exists
        $stmt = $db->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $err = "Username already taken.";
        } else {
            // Insert new admin with hashed password
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $db->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
            if ($insert->execute([$username, $hash])) {
                $success = "Registration successful. You can now <a href='login.php'>login</a>.";
            } else {
                $err = "Failed to register. Please try again.";
            }
        }
    }
}
?>
