<?php
session_start();
require 'connection.php';

if (isset($_SESSION['user_id'])) {
    header('Location: secure_area.php');
    exit();
} elseif (isset($_COOKIE['remember'])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_token = ?");
    $stmt->execute([$_COOKIE['remember']]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: secure_area.php');
        exit();
    }
}
?>
