<?php 
session_start();
$number1 = rand(1, 9);
$number2 = rand(1, 9);
$sum = $number1 + $number2;
$_SESSION['captcha_sum'] = $sum;

// Check if cookies are set
$cookie_username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$cookie_password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>


<body>
    <div class="container mt-5">
        <h2>Login</h2>
       
        <form action="login.php" method="post">
            <?php 
                if (isset($_SESSION['error'])) {
                    echo '<p style="color: red;">'.$_SESSION['error'].'</p>';
                    unset($_SESSION['error']);
                }
            ?>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($cookie_username); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($cookie_password); ?>" required>
            </div>
            <div class="form-group">
                <label for="captcha">CAPTCHA <?php echo $number1." + ".$number2."= " ?></label>
                <input type="text" class="form-control" id="correct_sum" name="captcha" min="0" required>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php if ($cookie_username) echo 'checked'; ?>>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
