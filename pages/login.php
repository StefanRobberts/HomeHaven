<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeHaven Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

     <div class="login-container">
    <h2>Login to HomeHaven</h2>
    <form action="login_process.php" method="POST">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <button type="submit" class="login-btn">Login</button>
    </form>

    <div class="extra-options">
      <a href="register.php">Don't have an account? Register here</a>
      <a href="#">Forgot your password?</a>
    </div>
  </div>
    
</body>
</html>