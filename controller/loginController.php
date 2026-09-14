<?php
session_start();
require_once __DIR__ . '/../model/userModel.php';

$_SESSION['emailErrMsg']    = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['email']          = "";
$_SESSION['globalErrMsg']   = "";

$req = $_SERVER['REQUEST_METHOD'];

if ($req === "POST") {

    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $flag     = true;

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

    if (!$flag) {
        header("Location: ../view/login.php");
        exit();
    }

    $user = login($email, $password);

    if ($user === null) {
        $_SESSION['passwordErrMsg'] = "Email or password does not match";
        header("Location: ../view/login.php");
        exit();
    }

    $_SESSION["name"]  = $user["name"];
    $_SESSION["email"] = $email;
    $_SESSION["role"]  = $user["role"];

    if ($user["role"] === "patient") {
        header("Location: patient/patientDashboardController.php");
        exit();
    }

    $_SESSION['globalErrMsg'] = "Unknown role";
    header("Location: ../view/login.php");
    exit();

} else {
    $_SESSION['globalErrMsg'] = "Something went wrong";
    header("Location: ../view/login.php");
    exit();
}
?>