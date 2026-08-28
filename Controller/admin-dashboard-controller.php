 
<?php

session_start();

if (!isset($_SESSION['isLoggedIn'])  ) {

    header("Location: ../View/auth/admin-login.php");
    exit();
    
}

require __DIR__ . "/../Model/Doctor.php";
require __DIR__ . "/../Model/Patient.php";

$doctor = new Doctor();
$patient = new Patient();

$totalDoctors = $doctor->getTotalDoctors();
$totalPatients = $patient->getTotalPatients();

$activeDoctors = $doctor->getActiveDoctors();
$pendingPatients = $patient->getPendingPatients();

?>