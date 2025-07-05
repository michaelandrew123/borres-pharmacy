<?php
// login.php
session_start();
require_once 'database.php'; // Connect to your DB

if (isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: index.php"); // Redirect to homepage after successful login
        exit;
    } else {
        echo "Invalid credentials!";
    }
}
?>
