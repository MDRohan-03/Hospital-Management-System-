<?php

session_start();

$_SESSION['nameErrMsg'] = "";
$_SESSION['emailErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";
$_SESSION['specializationErrMsg'] = "";
$_SESSION['licenseErrMsg'] = "";
$_SESSION['feeErrMsg'] = "";
$_SESSION['yoeErrMsg'] = "";
$_SESSION['bioErrMsg'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $specialization = $_POST['specialization'];
    $licenseNumber = $_POST['licenseNumber'];
    $consultationFee = $_POST['consultationFee'];
    $yoe = $_POST['yoe'];
    $bio = $_POST['bio'];

    $flag = true;

    if (empty($name)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please fill up the name properly.";
    } else {
        $_SESSION['name'] = $name;
    }

    if (empty($email)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please fill up the email properly.";
    } else {
        $_SESSION['email'] = $email;
    }

    if (empty($password)) {
        $flag = false;
        $_SESSION['passwordErrMsg'] = "Please fill up the password properly.";
    }

    if (empty($phone)) {
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly.";
    } else {
        $_SESSION['phone'] = $phone;
    }

    if (empty($specialization)) {
        $flag = false;
        $_SESSION['specializationErrMsg'] = "Please select a specialization.";
    } else {
        $_SESSION['specialization'] = $specialization;
    }
 
    if (empty($consultationFee)) {
        $flag = false;
        $_SESSION['feeErrMsg'] = "Please fill up the consultation fee properly.";
    } else {
        $_SESSION['consultationFee'] = $consultationFee;
    }
 
    if (empty($bio)) {
        $flag = false;
        $_SESSION['bioErrMsg'] = "Please fill up the professional bio properly.";
    } else {
        $_SESSION['bio'] = $bio;
    }

    if ($flag) {

        require "../Model/Doctor.php";
        $doctor = new Doctor();

        $doctor->addDoctor(
            $name,
            $email,
            $password,
            $phone,
            $specialization,
            $licenseNumber,
            $consultationFee,
            $yoe,
            $bio
        );

        $_SESSION['success'] = "Doctor added successfully.";

        unset($_SESSION['name']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['specialization']);
        unset($_SESSION['licenseNumber']);
        unset($_SESSION['consultationFee']);
        unset($_SESSION['yoe']);
        unset($_SESSION['bio']);
    }

    header("Location: ../View/admin/admin-add-doctor.php");
    exit();
}
?>