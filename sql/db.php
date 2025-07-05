<?php
session_start();

try {
    $db = new PDO("mysql:host=localhost;port=3309;dbname=pharmacy", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>