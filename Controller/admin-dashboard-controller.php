<?php

session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {

    header("Location: ../View/auth/admin-login.php");
    exit();

}

require_once __DIR__ . "/../Model/Doctor.php";
require_once __DIR__ . "/../Model/Patient.php";

$doctor = new Doctor();
$patient = new Patient();

$totalDoctors = $doctor->getTotalDoctors();
$totalPatients = $patient->getTotalPatients();

$activeDoctors = $doctor->getActiveDoctors();
$pendingPatients = $patient->getPendingPatients();

?>