<nav class="custom-navbar" id="navbar">
  <div class="navbar-inner">
    <a href="/HomeHaven/index.php" class="logo">🏠 HomeHaven</a>
    <ul class="nav-links">
      <li><a href="/HomeHaven/pages/dashboard.php">Browse Listings</a></li>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="/HomeHaven/pages/profile.php">My Profile</a></li>
        <li><a href="/HomeHaven/pages/logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="/HomeHaven/pages/login.php">Login</a></li>
        <li><a href="/HomeHaven/pages/register.php">Register</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
