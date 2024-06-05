<?php
session_start();

// Username și parola pentru exemplu
$correct_username = 'admin';
$correct_password = 'admin';

$user_username = 'student';
$user_password = 'parola';

// Verificare dacă s-a trimis un formular
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificare dacă toate câmpurile necesare sunt setate în $_POST
    if (isset($_POST['username'], $_POST['password'], $_POST['captcha'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $captcha = $_POST['captcha'];
        $remember = isset($_POST['remember']);
        $correct_sum = $_SESSION['captcha_sum'] ?? 0;

        // Verificare CAPTCHA
        if ($captcha != $correct_sum) {
            echo 'CAPTCHA verification failed. Please try again.';
            exit;
        }

        // Validare username și parolă
        if (($username == $correct_username && $password == $correct_password) ||
            ($username == $user_username && $password == $user_password)) {
            // Login reușit
            $_SESSION['loggedin'] = true;
            if ($remember) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
                setcookie('password', $password, time() + (86400 * 30), "/"); // 30 days
            } else {
                if (isset($_COOKIE['username'])) {
                    setcookie('username', '', time() - 3600, "/"); // Unset cookie
                }
                if (isset($_COOKIE['password'])) {
                    setcookie('password', '', time() - 3600, "/"); // Unset cookie
                }
            }
            header('Location: ' . ($username == $correct_username ? 'secure_area.php' : 'student_page.php'));
            exit;
        } else {
            echo 'Incorrect username or password.';
        }
    } else {
        echo 'All fields are required.';
    }
}
?>

