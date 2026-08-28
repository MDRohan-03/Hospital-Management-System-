<?php
session_start();
require "../Model/Patient.php";

$patient = new Patient();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == "activate") {
        $id = $_GET['id'];
        $patient->activatePatient($id);
        $_SESSION['success'] = "Patient account activated successfully.";
    }

    if ($action == "deactivate") {
        $id = $_GET['id'];
        $patient->deactivatePatient($id);
        $_SESSION['success'] = "Patient account deactivated successfully.";
    }

    if ($action == "paid") {
        $id = $_GET['id'];
        $patient->markAsPaid($id);
        $_SESSION['success'] = "Patient payment marked as paid.";
    }

}

header("Location: ../View/admin/admin-manage-patients.php");
exit();

?>