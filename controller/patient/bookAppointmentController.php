<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../../view/login.php");
    exit();
}

$patientName   = $_POST['patientName']    ?? '';
$patientEmail  = $_POST['patientEmail']   ?? '';
$patientAge    = $_POST['patientAge']     ?? '';
$patientGender = $_POST['patientGender']  ?? '';
$scheduleIndex = $_POST['schedule_index'] ?? '';

$doctorId = (int)($_POST['doctor_id'] ?? 0);
$doctor   = getDoctorById($doctorId);

if (!$doctor) {
    $_SESSION['errorMsg'] = "Doctor not found.";
    header("Location: ../../view/patient/bookDoctor.php");
    exit();
}

$schedules = $_SESSION['schedules'] ?? [];

if ($scheduleIndex === '' || !isset($schedules[(int)$scheduleIndex])) {
    $_SESSION['errorMsg'] = "Invalid schedule selection.";
    header("Location: ../../view/patient/book_appointment.php");
    exit();
}

$slot      = $schedules[(int)$scheduleIndex];
$day       = $slot['day'];
$startTime = $slot['startTime'];
$endTime   = $slot['endTime'];

$doctorName  = $doctor['name'];
$doctorEmail = $doctor['email'];

$ok = insertBooking(
    $patientName, $patientEmail, $patientAge, $patientGender,
    $doctorName, $doctorEmail, $day, $startTime, $endTime, "pending"
);

if (!$ok) {
    $_SESSION['errorMsg'] = "Failed to save booking. Please try again.";
}

header("Location: bookingHistoryController.php");
exit();
?>