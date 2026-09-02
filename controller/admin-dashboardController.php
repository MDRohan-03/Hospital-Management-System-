<?php
session_start();

require_once __DIR__ . '/../model/database.php';
require_once __DIR__ . '/../model/Doctor.php';
require_once __DIR__ . '/../model/Notice.php';

$doctorModel = new Doctor();
$noticeModel = new Notice();

$doctorCount = $doctorModel->getDoctorCount();
$noticeCount = $noticeModel->getNoticeCount();

$_SESSION['doctorCount'] = $doctorCount;
$_SESSION['noticeCount'] = $noticeCount;

header("Location: ../view/admin-dashboard.php");
exit();
?>