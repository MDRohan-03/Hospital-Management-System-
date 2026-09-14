<?php
require_once __DIR__ . '/../../model/patient/patientModel.php';

$email = $_GET['email'] ?? '';

if (getPatientByEmail($email) !== null) {
    echo "<span style='color:red;'>Email already exists</span>";
} else {
    echo "";
}
?>