<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>

  <div class="login-container"> <!-- Reuse login form styling -->
    <h2>Forgot Your Password?</h2>
    <form action="send_reset_link.php" method="POST">
      <div class="input-group">
        <label for="email">Enter your registered email address:</label>
        <input type="email" id="email" name="email" required />
      </div>

      <button type="submit" class="login-btn">Send Reset Link</button>
    </form>

    <p style="margin-top: 15px;">
      <a href="login.php">Back to Login</a>
    </p>
  </div>

</body>
</html>
