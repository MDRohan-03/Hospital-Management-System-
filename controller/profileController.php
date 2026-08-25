<?php 

//require '../model/User.php';

session_start();
$_SESSION['nameErrMsg'] = "";
$_SESSION['emailErrMsg'] = "";
$_SESSION['phoneErrMsg'] = "";
$_SESSION['specializationErrMsg'] = "";
$_SESSION['licenceErrMsg'] = "";
$_SESSION['feeErrMsg'] = "";
$_SESSION['yoeErrMsg'] = "";
$_SESSION['bioErrMsg'] = "";


$req = $_SERVER['REQUEST_METHOD'];

if ($req === "POST") {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$specialization = $_POST['specialization'];
	$licenseNumber = $_POST['licenseNumber'];
	$consultationFee = $_POST['consultationFee'];
	$yoe = $_POST['yoe'];
	$bio = $_POST['bio'];
	$flag = true;

	if (empty($email)) {
		$flag = false;
		$_SESSION['emailErrMsg'] = "Please fill up the email properly";
	}
	else {
		$_SESSION['email'] = $email;
	}

	if (empty($name)) {
		$flag = false;
		$_SESSION['nameErrMsg'] = "Please fill up the name properly";
	}else {
        $_SESSION['name'] = $name;
    }
    if(empty($phone)){
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly";
    }else {
        $_SESSION['phone'] = $phone;
    }
    if(empty($specialization)){
        $flag = false;
        $_SESSION['specializationErrMsg'] = "Please fill up the specialization properly";
    }else {
        $_SESSION['specialization'] = $specialization;
    }
    if(empty($licenseNumber)){
        $flag = false;
        $_SESSION['licenceErrMsg'] = "Please fill up the license number properly";
    }else {
        $_SESSION['licenseNumber'] = $licenseNumber;
    }
    if(empty($consultationFee)){
        $flag = false;
        $_SESSION['feeErrMsg'] = "Please fill up the consultation fee properly";
    }else {
        $_SESSION['consultationFee'] = $consultationFee;
    }
    if(empty($yoe)){
        $flag = false;
        $_SESSION['yoeErrMsg'] = "Please fill up the years of experience properly";
    }else {
        $_SESSION['yoe'] = $yoe;
    }
    if(empty($bio)){
        $flag = false;
        $_SESSION['bioErrMsg'] = "Please fill up the professional bio properly";
    }else {
        $_SESSION['bio'] = $bio;
    }

	if ($flag) {
	 $_SESSION['success'] = "Profile updated successfully!";
    }
    header("Location: ../view/profile.php");
    exit();

}