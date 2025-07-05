<?php
// register.php
session_start();
require_once 'database.php'; // Connect to your DB

if (isset($_POST['register'])) {
    $name = $_POST['register_name'];
    $email = $_POST['register_email'];
    $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Email already in use.";
    } else {
        $insert_query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($insert_query);
        $stmt->execute([$name, $email, $password]);
        
        $_SESSION['user'] = ['name' => $name, 'email' => $email];
        header("Location: index.php"); // Redirect after successful registration
        exit;
    }
}
?>
