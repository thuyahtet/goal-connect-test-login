<?php
session_start();
if (empty($_SESSION['user_id'])) { header('Location: login.html'); exit; }
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Profile</title><link rel="stylesheet" href="style.css"></head>
<body>
  <div class="card">
    <h2>Profile</h2>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
    <p><a href="dashboard.php">Back</a></p>
  </div>
</body></html>
