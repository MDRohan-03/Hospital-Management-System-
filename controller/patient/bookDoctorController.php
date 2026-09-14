<?php
session_start();
require_once __DIR__ . '/../../model/patient/patientModel.php';

$search = $_GET['search']         ?? '';
$spec   = $_GET['specialization'] ?? '';

$_SESSION['search']         = $search;
$_SESSION['specialization'] = $spec;
$_SESSION['doctors']        = searchDoctors($search, $spec);

header("Location: ../../view/patient/bookDoctor.php");
exit();
?>