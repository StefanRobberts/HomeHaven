<?php
session_start();
require_once __DIR__ . '/../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form input
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 🚨 ERROR HANDLING via redirect (not echo)
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: register.php?error=empty");
        exit;
    }

    if ($password !== $confirm_password) {
        header("Location: register.php?error=password_mismatch");
        exit;
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header("Location: register.php?error=email_exists");
        exit;
    }

    // Securely hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Register user with default role
    $default_role = 'user';
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $success = $stmt->execute([$name, $email, $hashed_password, $default_role]);

    if ($success) {
        // ✅ Success: Alert + Redirect
        header("Location: login.php?success=registered");
        exit;

        exit;
    } else {
        // 🛑 Unknown error
        header("Location: register.php?error=unknown");
        exit;
    }
} else {
    // 🚫 Block direct access
    header("Location: register.php");
    exit;
}
