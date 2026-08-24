<?php
session_start();

$error = $_SESSION['login_error'] ?? "";
unset($_SESSION['login_error']);
$rememberedEmail = $_COOKIE['remember_email'] ?? "";
?>

<!DOCTYPE html>
<html>
    <head>
         <title>Hospital Management System - Login</title>

         <link rel="stylesheet" href="admin.style.css">
         <script src="js/login-validation.js" defer></script>
    </head>

    <body>
        <div class="table">

            <div class="Dashtabledata">
                <h1>Hospital Management System</h1>
                <h2>Login</h2>

                <?php if ($error != "") { ?>
                    <div class="error-message">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php } ?>

                <form method="POST" action="login-validation.php" class="Dashtabledeta" onsubmit="return validateLogin();">
                 <label>Email / Username</label>
                <input type="text"id="login"name="login"value="<?php echo htmlspecialchars($rememberedEmail); ?>"placeholder="Enter email or username">
                <br><br>

                <label>Password</label>
                <input type="password"id="password"name="password"placeholder="Enter password">
 <br><br>
               <label class="remember">
                <input type="checkbox"name="remember"value="1">
                Remember Me
                </label>
 <br><br>
                <button type="submit" class="login-btn">Login</button>

            </form>

        </div>

         </div>

    </body>
</html>