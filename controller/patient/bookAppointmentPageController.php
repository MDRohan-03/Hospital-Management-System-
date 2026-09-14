<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';

$id     = (int)($_GET['doctor_id'] ?? 0);
$doctor = getDoctorById($id);

if (!$doctor) {
    $_SESSION['errorMsg'] = "Doctor not found.";
    header("Location: ../../view/patient/bookDoctor.php");
    exit();
}

$_SESSION['doctor']    = $doctor;
$_SESSION['schedules'] = getSchedulesByDoctorEmail($doctor['email']);

header("Location: ../../view/patient/book_appointment.php");
exit();
?>