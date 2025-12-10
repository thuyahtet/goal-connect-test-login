<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location: login.html');
  exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <h1>Welcome</h1>
    <p><?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
    <nav>
      <a href="profile.php">Profile</a> | 
      <a href="../src/logout.php">Logout</a>
    </nav>
  </div>
</body>
</html>
</div>

