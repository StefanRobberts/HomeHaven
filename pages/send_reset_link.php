<?php
require_once '../config/config.php';
date_default_timezone_set('Africa/Johannesburg');
$pdo->exec("SET time_zone = '+02:00'");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $user_id = $user['id'];
        $token = bin2hex(random_bytes(32));
        $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $insertStmt = $pdo->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)");
        $insertStmt->execute([$user_id, $token, $expires_at]);

        $reset_link = "http://localhost/HomeHaven/pages/reset_password.php?token=$token";

        // In production, this would email the link using PHPMailer or another SMTP mailer. Couldnt find free service.
        // For now, we'll just simulate it.

    }

    echo "
    <div style='text-align: center; margin-top: 100px; font-family: Arial, sans-serif;'>
      <h2>Check Your Email</h2>
      <p>If this email is registered, a password reset link has been sent.</p>
      <a href='login.php' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #a0522d; color: white; text-decoration: none; border-radius: 5px;'>Return to Login</a>
    </div>
    ";
} else {
    echo "Invalid request.";
}
