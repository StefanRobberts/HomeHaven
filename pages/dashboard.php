<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>HomeHaven Dashboard</title>
</head>
<body>
  <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h1>
  <p>Your role: <?= htmlspecialchars($_SESSION['role']) ?></p>
</body>
</html>
