<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location: login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Profile</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <h2>Profile</h2>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user_email'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p><a href="dashboard.php">Back</a></p>
  </div>
</body>
</html>