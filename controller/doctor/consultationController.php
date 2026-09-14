<?php

session_start();
require '../../model/doctor/consultationModel.php';
$_SESSION['dayErrmsg'] = "";
$_SESSION['startTimeErrmsg'] = "";
$_SESSION['endTimeErrmsg'] = "";

$name=$_SESSION['name'] ;
$email=$_SESSION['email'] ;
if ($_SERVER["REQUEST_METHOD"] == "GET") {

if (isset($_GET['id'])) {

$id = $_GET['id'];
$consultation = getConsultationById($id);
if ($consultation) {
$_SESSION['updateConsultation'] = $consultation;
 header("Location: ../../view/doctor/updateConsultation.php");
exit();
} else {

$_SESSION['dbErrmsg'] = "Consultation not found.";

header("Location: ../../view/doctor/consultation.php");
exit();
}
    }

    $consultation = getMyConsultations($email);

    $_SESSION['consultation'] = $consultation ? $consultation : [];

    header("Location: ../../view/doctor/consultation.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
if($_POST['action'] == "delete") {
$id = $_POST['id'];
deleteConsultation($id);
unset($_SESSION['dayErrmsg']);
    unset($_SESSION['startTimeErrmsg']);
    unset($_SESSION['endTimeErrmsg']);
 $consultation = getMyConsultations($email);

    $_SESSION['consultation'] = $consultation ? $consultation : [];
    header("Location: ../../view/doctor/consultation.php");
    exit();
    }
 $day = $_POST['day'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    $flag = true;

    if (empty($day)) {
$flag = false;
$_SESSION['dayErrmsg'] = "Please select a day.";
    } else {
$_SESSION['day'] = $day;
    }

    if (empty($startTime)) {
$flag = false;
$_SESSION['startTimeErrmsg'] = "Please select a start time.";
    } else {
$_SESSION['startTime'] = $startTime;
    }

    if (empty($endTime)) {
$flag = false;
$_SESSION['endTimeErrmsg'] = "Please select an end time.";
    } else {
$_SESSION['endTime'] = $endTime;
    }
if ($flag) {

    if ($_POST['action'] == "update") {
$id = $_POST['id'];

$result= updateConsultation($id, $day, $startTime, $endTime);
$consultation = getMyConsultations($email);

    $_SESSION['consultation'] = $consultation ? $consultation : [];
unset($_SESSION['updateConsultation']);
header("Location: ../../view/doctor/consultation.php");
    exit();
} elseif ($_POST['action'] == "save") {

createConsultation($day, $startTime, $endTime,$email,$name);
$consultation = getMyConsultations($email); 
$_SESSION['consultation'] = $consultation ? $consultation : [];
unset($_SESSION['day']);
    unset($_SESSION['startTime']);
    unset($_SESSION['endTime']);
    header("Location: ../../view/doctor/consultation.php");
    exit();
    }

    
}
    header("Location: ../../view/doctor/consultation.php");
    exit();
}
?>