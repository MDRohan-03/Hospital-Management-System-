<?php
session_start();
$_SESSION['nameErrMsg'] = "";
$_SESSION['emailErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $flag = true;
    if (empty($name)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please fill up the name properly.";
    } 
    else {
        $_SESSION['name'] = $name;
    }

    if (empty($email)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please fill up the email properly.";
    } 
    else {
        $_SESSION['email'] = $email;
    }

    if (empty($phone)) {
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly.";
    } 
    else {
        $_SESSION['phone'] = $phone;
    }

    if ($flag) {
        require "../Model/User.php";

        $user = new User();
        $user->updateProfile($name, $email, $phone);
        $_SESSION['success'] = "Profile updated successfully.";
    }

    header("Location: ../View/admin/admin-edit-profile.php");
    exit();
}

?>