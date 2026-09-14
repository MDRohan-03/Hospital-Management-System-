<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';
require_once __DIR__ . '/../../model/userModel.php';

$_SESSION['nameErrMsg']       = "";
$_SESSION['emailErrMsg']      = "";
$_SESSION['phoneErrMsg']      = "";
$_SESSION['passwordErrMsg']   = "";
$_SESSION['dobErrMsg']        = "";
$_SESSION['bloodGroupErrMsg'] = "";
$_SESSION['addressErrMsg']    = "";

$req = $_SERVER['REQUEST_METHOD'];

if ($req === "POST") {

    $name       = trim($_POST['name']       ?? '');
    $email      = trim($_POST['email']      ?? '');
    $phone      = trim($_POST['phone']      ?? '');
    $password   = trim($_POST['password']   ?? '');
    $dob        = trim($_POST['dob']        ?? '');
    $bloodGroup = trim($_POST['bloodGroup'] ?? '');
    $address    = trim($_POST['address']    ?? '');

    $flag = true;

    if (empty($name)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please fill up the name properly";
    } else {
        $_SESSION['name'] = $name;
    }

    if (empty($email)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please fill up the email properly";
    } else {
        $_SESSION['email'] = $email;
    }

    if (empty($phone)) {
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly";
    } else {
        $_SESSION['phone'] = $phone;
    }

    if (empty($password)) {
        $flag = false;
        $_SESSION['passwordErrMsg'] = "Please fill up the password properly";
    }

    if (empty($dob)) {
        $flag = false;
        $_SESSION['dobErrMsg'] = "Please fill up the date of birth properly";
    } else {
        $_SESSION['dob'] = $dob;
    }

    if (empty($bloodGroup)) {
        $flag = false;
        $_SESSION['bloodGroupErrMsg'] = "Please select a blood group";
    } else {
        $_SESSION['bloodGroup'] = $bloodGroup;
    }

    if (empty($address)) {
        $flag = false;
        $_SESSION['addressErrMsg'] = "Please fill up the address properly";
    } else {
        $_SESSION['address'] = $address;
    }

    if ($flag) {
        $role = "patient";

        $patient = createPatient($name, $email, $phone, $password, $dob, $bloodGroup, $address, $role);
        $user    = createUser($name, $email, $password, $role);

        if ($patient && $user) {
            $_SESSION['success'] = "Patient registered successfully.";

            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['phone']);
            unset($_SESSION['dob']);
            unset($_SESSION['bloodGroup']);
            unset($_SESSION['address']);
        } else {
            $_SESSION['error'] = "Error registering patient.";
        }
    }

    header("Location: ../../view/patient/patientRegistration.php");
    exit();
}
?>