<?php
$token = $_GET['token'] ?? '';
if (!$token) {
    echo "Invalid token.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <div class="login-container">
    <h2>Reset Your Password</h2>
    <form action="reset_password_process.php" method="POST">
      <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>" />
      <div class="input-group">
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required />
      </div>
      <div class="input-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
      </div>
      <button type="submit" class="login-btn">Reset Password</button>
    </form>
  </div>
</body>
</html>
