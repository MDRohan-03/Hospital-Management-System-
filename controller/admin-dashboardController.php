<?php
session_start();

require '../model/database.php';
require '../model/adminDoctor.php';
require '../model/adminNotice.php';

$_SESSION['doctorCount'] = getDoctorCount();
$_SESSION['noticeCount'] = getNoticeCount();

header("Location: ../view/admin-dashboard.php");
exit();
?>