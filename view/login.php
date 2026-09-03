<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABC Hospital - Login</title>
    
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">


<form method="post" action="../controller/loginController.php" onsubmit="return validate(this)" >
                <h1 class="h">Login</h1><br>

            <!-- Email -->
            <div class="d">
                <label for="email">
                    Email
                </label><br>
                
                <input  type="email"  name="email"  id="email"  placeholder="Enter your email" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" >

                <?php
                if (!empty($_SESSION['emailErrMsg'])) {
                    echo '<div class="error">' .
                         htmlspecialchars($_SESSION['emailErrMsg']) .
                         '</div>';
                }
                ?>
            <br>

            <!-- Password -->
            
                <label for="password">
                    Password
                </label><br>

                <input type="password" name="password" id="password" placeholder="Enter your password">

                <?php
                if (!empty($_SESSION['passwordErrMsg'])) {
                    echo '<div class="error">' .htmlspecialchars($_SESSION['passwordErrMsg']) .'</div>';
                }
                ?>
            </div><br>

            <!-- Login Button -->
            <div style="text-align: center;">
                <input type="submit" value="Login"class="login-btn" >
            </div><br>

            <!-- Create Account -->
            <div style="text-align: center;">
                <a
                    href="patient/patientRegistration.php"
                    class="register-link"
                >
                    Create an account
                </a>
            </div>

            <!-- create doctor -->
            <div style="text-align: center;">
                <a
                    href="doctor/doctorRegistration.php"
                    class="register-link"
                >
                    Create a doctor account
                </a>
        </form>

        

    </div>

    <script src="login.js"></script>

</body>
</html>

<?php
// Clear the error messages so they don't persist on a fresh page reload
unset($_SESSION['emailErrMsg']);
unset($_SESSION['passwordErrMsg']);
?>