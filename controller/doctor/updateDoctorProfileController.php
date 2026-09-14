<?php
session_start();
require '../../model/doctor/doctorModel.php';
$_SESSION['nameErrMsg'] = "";
$_SESSION['emailErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";
$_SESSION['specializationErrMsg'] = "";
$_SESSION['licenceErrMsg'] = "";
$_SESSION['feeErrMsg'] = "";
$_SESSION['yearsOfExperienceErrMsg'] = "";
$_SESSION['bioErrMsg'] = "";

$req = $_SERVER['REQUEST_METHOD'];

if ($req === "GET") {

    $email = $_SESSION['email'];

    $doctor = getDoctorByEmail($email);

    if ($doctor) {

$_SESSION['name'] = $doctor['name'];
$_SESSION['email'] = $doctor['email'];
$_SESSION['phone'] = $doctor['phone'];
$_SESSION['specialization'] = $doctor['specialization'];
$_SESSION['medicalLicenseNumber'] = $doctor['medicalLicenseNumber'];
$_SESSION['consultationFee'] = $doctor['consultationFee'];
$_SESSION['yearsOfExperience'] = $doctor['yearsOfExperience'];
$_SESSION['bio'] = $doctor['bio'];
    }

    header("Location: ../../view/doctor/doctorProfile.php");
    exit();
}


if($req === "POST") {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $specialization = $_POST['specialization'];
    $licenseNumber = $_POST['licenseNumber'];
    $consultationFee = $_POST['consultationFee'];
    $yoe = $_POST['yearsOfExperience'];
    $bio = $_POST['bio'];
    $flag = true;

    if (empty($email)) {
$flag = false;
$_SESSION['emailErrMsg'] = "Please fill up the email properly";
    } else {
$_SESSION['email'] = $email;
    }
    if (empty($name)) {
$flag = false;
$_SESSION['nameErrMsg'] = "Please fill up the name properly";
    } else {
        $_SESSION['name'] = $name;
    }
    if (empty($phone)) {
$flag = false;
$_SESSION['phoneErrMsg'] = "Please fill up the phone properly";
    } else {
$_SESSION['phone'] = $phone;
    }
    if (empty($specialization)) {
$flag = false;
$_SESSION['specializationErrMsg'] = "Please fill up the specialization properly";
    } else {
$_SESSION['specialization'] = $specialization;
    }
    if (empty($licenseNumber)) {
 $flag = false;
 $_SESSION['licenceErrMsg'] = "Please fill up the license number properly";
    } else {
$_SESSION['licenseNumber'] = $licenseNumber;
    }
    if (empty($consultationFee)) {
$flag = false;
$_SESSION['feeErrMsg'] = "Please fill up the consultation fee properly";
    } else {
$_SESSION['consultationFee'] = $consultationFee;
    }
    if (empty($yoe)) {
$flag = false;
$_SESSION['yearsOfExperienceErrMsg'] = "Please fill up the years of experience properly";
    } else {
$_SESSION['yearsOfExperience'] = $yoe;
    }
    if (empty($bio)) {
$flag = false;
$_SESSION['bioErrMsg'] = "Please fill up the bio properly";
    } else {
$_SESSION['bio'] = $bio;
    }
    if ($flag) {
$result = updateDoctorProfile($name, $phone, $specialization, $licenseNumber, $consultationFee, $yoe, $bio);
if ($result) {
$_SESSION['successMsg'] = "Profile updated successfully.";
header("Location: ../../view/doctor/doctorProfile.php");
exit();
} else {
$_SESSION['errorMsg'] = "Failed to update profile.";
header("Location: ../../view/doctor/doctorProfile.php");
exit();
}
    } else {
 header("Location: ../../view/doctor/doctorProfile.php");
exit();
    }

}
?>