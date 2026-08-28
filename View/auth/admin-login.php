<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="stylesheet" href="../../assets/css/login-style.css">

</head>

<body>

<div class="login-container">

    <h2>Admin Login</h2>

    <?php

    if (!empty($_SESSION['globalErrMsg'])) {

        echo "<p style='color:red'>" . $_SESSION['globalErrMsg'] . "</p>";

        unset($_SESSION['globalErrMsg']);

    }

    ?>

    <form method="post"
          action="../../Controller/admin-login-controller.php"
          onsubmit="return validateAdminLoginForm(this)">

        <label for="email">Email:</label>

        <input
            type="email"
            name="email"
            id="email"
            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"
        >

        <?php

        if (!empty($_SESSION['emailErrMsg'])) {

            echo "<span style='color:red'>" . $_SESSION['emailErrMsg'] . "</span>";

        }

        ?>

        <br><br>

        <label for="password">Password:</label>

        <input
            type="password"
            name="password"
            id="password"
        >

        <?php

        if (!empty($_SESSION['passwordErrMsg'])) {

            echo "<span style='color:red'>" . $_SESSION['passwordErrMsg'] . "</span>";

        }

        ?>

        <br><br>

        <input type="checkbox" name="remember" id="remember">

        <label for="remember">Remember Me</label>

        <br><br>

        <input type="submit" value="Login">

    </form>

</div>

<script src="../../assets/js/admin-validation.js"></script>

</body>

</html>