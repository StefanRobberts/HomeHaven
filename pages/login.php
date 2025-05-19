<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeHaven Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<?php if (isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
  <div class="toast" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
    ✅ Registration successful! You can now login.
  </div>
<?php endif; ?>

<div class="login-container">
    <h2>Login to HomeHaven</h2>
    <form action="login_process.php" method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required/>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="extra-options">      
      <a href="register.php">Don't have an account? Register here</a>
      <p><a href="forgot_password.php">Forgot your password?</a></p>
    </div>
</div>
</body>
</html>
