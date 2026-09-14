<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';

$errorKeys = ['nameErrMsg', 'emailErrMsg', 'phoneErrMsg', 'passwordErrMsg', 'dobErrMsg', 'bloodGroupErrMsg', 'addressErrMsg'];
foreach ($errorKeys as $key) {
    $_SESSION[$key] = "";
}

$req = $_SERVER['REQUEST_METHOD'];

if ($req === "GET") {
    $email = $_SESSION['email'] ?? '';

    if (!empty($email)) {
        $patient = getPatientByEmail($email);
        if ($patient) {
            $_SESSION['name']       = $patient['name'];
            $_SESSION['email']      = $patient['email'];
            $_SESSION['phone']      = $patient['phone'];
            $_SESSION['password']   = $patient['password'];
            $_SESSION['dob']        = $patient['dob'];
            $_SESSION['bloodGroup'] = $patient['bloodGroup'];
            $_SESSION['address']    = $patient['address'];
            $_SESSION['role']       = $patient['role'];
        }
    }

    header("Location: ../../view/patient/profile_view.php");
    exit();
}

if ($req === "POST") {
    $name       = trim($_POST['name']        ?? '');
    $email      = trim($_POST['email']       ?? '');
    $phone      = trim($_POST['phone']       ?? '');
    $dob        = trim($_POST['DateOfBirth'] ?? '');
    $bloodGroup = trim($_POST['BloodGroup']  ?? '');
    $address    = trim($_POST['Address']     ?? '');
    $password   = trim($_POST['Password']    ?? '');
    $role       = trim($_POST['role']        ?? 'patient');

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
    }

    if (empty($phone)) {
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly.";
    } else {
        $_SESSION['phone'] = $phone;
    }

    if (empty($password)) {
        $flag = false;
        $_SESSION['passwordErrMsg'] = "Please fill up the password properly.";
    } else {
        $_SESSION['password'] = $password;
    }

    if (empty($dob)) {
        $flag = false;
        $_SESSION['dobErrMsg'] = "Please fill up the date of birth properly.";
    } else {
        $_SESSION['dob'] = $dob;
    }

    if (empty($bloodGroup)) {
        $flag = false;
        $_SESSION['bloodGroupErrMsg'] = "Please select a blood group.";
    } else {
        $_SESSION['bloodGroup'] = $bloodGroup;
    }

    if (empty($address)) {
        $flag = false;
        $_SESSION['addressErrMsg'] = "Please fill up the address properly.";
    } else {
        $_SESSION['address'] = $address;
    }

    if ($flag) {
        $resultPatient = updatePatientProfile($email, $name, $phone, $password, $dob, $bloodGroup, $address, $role);
        $resultUser    = updateonUserTable($email, $name, $password, $role);

        if ($resultPatient && $resultUser) {
            $_SESSION['successMsg'] = "Patient profile updated successfully.";
        } else {
            $_SESSION['errorMsg'] = "Failed to update profile.";
        }
    }

    header("Location: ../../view/patient/profile_view.php");
    exit();
}
?>