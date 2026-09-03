<?php
 
session_start();
 
require '../../model/patient/patientModel.php';
// require '../model/userModel.php';
 
$_SESSION['nameErrMsg'] = "";
$_SESSION['emailErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";
$_SESSION['passwordErrMsg'] = "";
$_SESSION['dobErrMsg'] = "";
$_SESSION['bloodGroupErrMsg'] = "";
$_SESSION['addressErrMsg'] = "";
 
$req = $_SERVER['REQUEST_METHOD'];
 
if ($req === "POST") {
 
    // Get data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $bloodGroup = $_POST['bloodGroup'];
    $address = $_POST['address'];
 
    $flag = true;
 
 
    // Name validation
    if (empty($name)) {
 
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please fill up the name properly";
 
    } else {
 
        $_SESSION['name'] = $name;
    }
 
 
    // Email validation
    if (empty($email)) {
 
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please fill up the email properly";
 
    } else {
 
        $_SESSION['email'] = $email;
    }
 
 
    // Phone validation
    if (empty($phone)) {
 
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly";
 
    } else {
 
        $_SESSION['phone'] = $phone;
    }
 
 
    // Password validation
    if (empty($password)) {
 
        $flag = false;
        $_SESSION['passwordErrMsg'] = "Please fill up the password properly";
    }
 
 
    // Date of birth validation
    if (empty($dob)) {
 
        $flag = false;
        $_SESSION['dobErrMsg'] = "Please fill up the date of birth properly";
 
    } else {
 
        $_SESSION['dob'] = $dob;
    }
 
 
    // Blood group validation
    if (empty($bloodGroup)) {
 
        $flag = false;
        $_SESSION['bloodGroupErrMsg'] = "Please select a blood group";
 
    } else {
 
        $_SESSION['bloodGroup'] = $bloodGroup;
    }
 
 
    // Address validation
    if (empty($address)) {
 
        $flag = false;
        $_SESSION['addressErrMsg'] = "Please fill up the address properly";
 
    } else {
 
        $_SESSION['address'] = $address;
    }
 
 
    // Insert into database
    if ($flag) {
$role="patient";
        $patient = createPatient(
            $name,
            $email,
            $phone,
            $password,
            $dob,
            $bloodGroup,
            $address,
            $role
        );
$user = createUser($name, $email, $password, $role);
        if ($patient && $user) {
 
            $_SESSION['success'] = "Patient registered successfully.";
 
            // Clear old form data
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
 
    header("Location:../../view/login.php");
    exit();
}
 
?>
 