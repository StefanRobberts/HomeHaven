<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register on HomeHaven</title>
  <link rel="stylesheet" href="../assets/css/styles.css" />

</head>
<body>

  <?php if (isset($_GET['error'])): ?>
    <div class="toast">
      <?php
        switch ($_GET['error']) {
          case 'empty':
            echo "❌ All fields are required.";
            break;
          case 'password_mismatch':
            echo "❌ Passwords do not match.";
            break;
          case 'email_exists':
            echo "❌ This email is already registered.";
            break;
          default:
            echo "❌ Something went wrong. Please try again.";
        }
      ?>
  </div>
  <?php endif; ?>

  <div class="page-content"> <!-- Reusing the same styling as login -->
    <div class="login-container">
       <h2>Create an Account on HomeHaven</h2>
          <form action="register_process.php" method="POST" enctype="multipart/form-data">
            <!-- Profile picture upload -->

      <div class="profile-pic-container">
        <label for="profilePicInput">
          <img src="../assets/images/default_avatar.jpeg" alt="Profile Picture" id="profilePic" class="profile-pic" />
        </label>
  <input type="file" name="profile_pic" id="profilePicInput" accept="image/*" hidden />
  <button type="button" class="choose-btn" onclick="document.getElementById('profilePicInput').click();">
    Choose Profile Picture
  </button>
</div>


      <!--Full name input-->
      <div class="input-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <!--Email input-->
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <!--password input-->
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <!--Confirm password input-->
      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required />
      </div>

      <!--Submit button for registration-->
      <button type="submit" class="login-btn">Register</button>
    </form>

    <!--Links for login and password recovery/reset -->
    <div class="extra-options">
      <a href="login.php">Already have an account? Login here</a>
    </div>
  </div>
</div>

  <script>
    // Preview the selected profile picture
    const input = document.getElementById('profilePicInput');
    const img = document.getElementById('profilePic');

    input.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const imageUrl = URL.createObjectURL(file);
        img.src = imageUrl;

      }
    });
  </script>
</body>
</html>
