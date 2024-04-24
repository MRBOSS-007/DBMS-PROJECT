<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <h4>
             <?php 
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage']
             ?>
        <form action="login_script.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
