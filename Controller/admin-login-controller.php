<?php
session_start();

// Only process on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Clear previous error messages
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $_SESSION['globalErrMsg'] = "";

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $flag = true;

    if (empty($email)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Email is required.";
    } else {
        $_SESSION['email'] = $email;
    }

    if (empty($password)) {
        $flag = false;
        $_SESSION['passwordErrMsg'] = "Password is required.";
    }

    if ($flag) {
        require "../Model/User.php";

        $user = new User();
        if ($user->login($email, $password)) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['adminEmail'] = $email;
            $_SESSION['adminName'] = "Admin";
            $_SESSION['adminPhone'] = "01712345678";
            header("Location: ../View/admin/admin-dashboard.php");
            exit();
        } else {
            $_SESSION['globalErrMsg'] = "Invalid email or password.";
        }
    }

    header("Location: ../View/auth/admin-login.php");
    exit();
}

// If not POST, redirect to login
header("Location: ../View/auth/admin-login.php");
exit();
?>