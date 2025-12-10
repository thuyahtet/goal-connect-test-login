<?php
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/login.html');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo 'Missing fields';
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header('Location: ../public/dashboard.php');
    exit;
}
else if ($user) {
    echo 'パスワード違う</br>';
    echo '<a href="../public/login.html">戻る</a>';
    exit;
}
else {
    echo 'アカウント存在ない</br>';
    echo '<a href="../public/login.html">戻る</a>';
    exit;
}
?>
