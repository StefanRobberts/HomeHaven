<?php
require_once '../config/config.php';
date_default_timezone_set('Africa/Johannesburg');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Basic validation
    if (!$token || !$password || !$confirm_password) {
        echo "All fields are required.";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

  

    // Validate token 
$stmt = $pdo->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->execute([$token]);
$record = $stmt->fetch();

$stmt = $pdo->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expires_at > NOW()");
$stmt->execute([$token]);
$record = $stmt->fetch();

if (!$record) {
    echo "Invalid or expired token.";
    exit;
}

    $user_id = $record['user_id'];

    // Hash new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update password in users table
    $updateStmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $updateStmt->execute([$hashedPassword, $user_id]);

    // Deleting the token
    $deleteStmt = $pdo->prepare("DELETE FROM password_resets WHERE token = ?");
    $deleteStmt->execute([$token]);

    // Success message or redirect
    echo "
      <div style='text-align: center; margin-top: 100px; font-family: Arial, sans-serif;'>
        <h2>Password Reset Successful</h2>
        <p>Your password has been updated.</p>
        <a href='login.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #a0522d; color: white; text-decoration: none; border-radius: 5px;'>Return to Login</a>
      </div>
    ";
} else {
    echo "Invalid request.";
}
?>