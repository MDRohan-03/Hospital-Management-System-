<?php
session_start();

require '../model/loginModel.php';

$_SESSION['emailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['email'] = "";
$_SESSION['globalErrMsg'] = "";

$req = $_SERVER['REQUEST_METHOD'];

if ($req === "POST") {

    $email = $_POST['email'];
$password = $_POST['password'];

    $flag = true;

  
    if (empty($email)) {
$flag = false;
$_SESSION['emailErrMsg'] = "Please fill up the email properly";
} else {
$_SESSION['email'] = $email;
 }

if (empty($password)) {
$flag = false;
$_SESSION['passwordErrMsg'] = "Please fill up the password properly";
    }

    if ($flag) {
$user = login($email, $password);
if ($user !== null) {
$_SESSION['isLoggedIn'] = true;

$_SESSION["name"] = $user["name"];
$_SESSION["role"] = $user["role"];
$_SESSION["email"] = $user["email"];

if ($user["role"] === "patient") {

header("Location: ../view/patient/patient_Dashboard.php");
exit();
} elseif ($user["role"] === "doctor") {
header("Location: ../view/doctor/index.php");
exit();
} elseif ($user["role"] === "admin") {
header("Location: ../view/admin/adminDashboard.php");
exit();

} else {
$_SESSION['globalErrMsg'] = "Invalid user role";
header("Location: ../view/login.php");
exit();
}
} else {

$_SESSION['globalErrMsg'] = "Email or password does not match";

header("Location: ../view/login.php");
exit();
}

    } else {
header("Location: ../view/login.php");
exit();
    }

} else {

    $_SESSION['globalErrMsg'] = "Something went wrong";

    header("Location: ../view/login.php");
    exit();
}
?>