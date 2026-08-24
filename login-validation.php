<?php

session_start();

$login = trim($_POST["login"] ?? "");
$password = trim($_POST["password"] ?? "");
$remember = isset($_POST["remember"]);


 
if ($login == "") {
    $_SESSION["login_error"] = "Username or email is required.";
    header("Location: login.php");
    exit();
}


if ($password == "") {
    $_SESSION["login_error"] = "Password is required.";
    header("Location: login.php");
    exit();
}

 
// ADMIN LOGIN
 

if ($login == "admin@hospital.com" && $password == "admin123") {

    $_SESSION["admin_logged_in"] = true;
    $_SESSION["admin_name"] = "Admin User";
    $_SESSION["admin_email"] = "admin@hospital.com";
    $_SESSION["user_role"] = "admin";

    if ($remember) {
        setcookie( "remember_email", $login, time() + (30 * 24 * 60 * 60), "/");
    } 
    else {
        setcookie( "remember_email", "", time() - 3600,"/" );
    }
    header("Location: admin_dashboard.php");
    exit();
}


  
// DOCTOR LOGIN
 
if ($login == "doctor@hospital.com" && $password == "doctor123") {

    $_SESSION["doctor_logged_in"] = true;
    $_SESSION["doctor_name"] = "Doctor User";
    $_SESSION["doctor_email"] = "doctor@hospital.com";
    $_SESSION["user_role"] = "doctor";

   if ($remember) {
        setcookie( "remember_email", $login, time() + (30 * 24 * 60 * 60), "/");
    } 
    else {
        setcookie( "remember_email", "", time() - 3600,"/" );
    }
    header("Location: admin_dashboard.php");
    exit();
}


 
// PATIENT LOGIN

if ($login == "patient@hospital.com" && $password == "patient123") {

    $_SESSION["patient_logged_in"] = true;
    $_SESSION["patient_name"] = "Patient User";
    $_SESSION["patient_email"] = "patient@hospital.com";
    $_SESSION["user_role"] = "patient";
if ($remember) {
        setcookie( "remember_email", $login, time() + (30 * 24 * 60 * 60), "/");
    } 
    else {
        setcookie( "remember_email", "", time() - 3600,"/" );
    }
    header("Location: admin_dashboard.php");
    exit();
}
 
// INVALID LOGIN

$_SESSION["login_error"] = "Invalid username/email or password.";
header("Location: login.php");
exit();
?>