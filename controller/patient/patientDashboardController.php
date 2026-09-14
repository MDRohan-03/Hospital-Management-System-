<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../../view/login.php");
    exit();
}

$_SESSION['recentBooking'] = getRecentBookingByPatientEmail($_SESSION['email']);

header("Location: ../../view/patient/patient_Dashboard.php");
exit();
?>