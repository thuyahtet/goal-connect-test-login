<?php
require_once __DIR__ . '/../src/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/register.html');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo 'Missing fields';
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email';
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare('INSERT INTO users (email, password_hash) VALUES (:email, :hash)');
    $stmt->execute([
        ':email' => $email,
        ':hash'  => $hash
    ]);

    header('Location: ../public/login.html');
    exit;

} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'UNIQUE') !== false) {
        echo 'Email already registered';
    } else {
        echo 'DB error: ' . htmlspecialchars($e->getMessage());
    }
    exit;
}
?>
