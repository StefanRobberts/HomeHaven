<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register on HomeHaven</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />
</head>
<body>

  <div class="login-container"> <!-- Reusing the same styling as login -->
    <h2>Create an Account on HomeHaven</h2>
    <form action="register_process.php" method="POST">
      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="username" required />
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
      </div>

      <button type="submit" class="login-btn">Register</button>
    </form>

    <div class="extra-options">
      <a href="login.php">Already have an account? Login here</a>
    </div>
  </div>

</body>
</html>
