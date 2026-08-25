<?php

session_start();

$_SESSION['dayErrmsg'] = "";
$_SESSION['startTimeErrmsg'] = "";
$_SESSION['endTimeErrmsg'] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
$_SESSION['success'] = "Consultation hours set successfully.";

}
    header("Location: ../view/consultation.php");
    exit();
}
?>