<?php
session_start();
require __DIR__ . '/../../model/dbConnection.php';
require __DIR__ . '/../../model/doctor/patientBookingModel.php';
$email=$_SESSION['email'] ;

$req=$_SERVER['REQUEST_METHOD'];

if($req=='GET'){
   $appointments=getMyAppointments($email);

   if($appointments){
    $_SESSION['appointments']=$appointments;
    header("Location: ../../view/doctor/appointments.php");
    exit();
   }
   else{
    $_SESSION['appointments']=null;
    header("Location: ../../view/doctor/appointments.php");
    exit();
   }

   
}


if($req == 'POST'){

    $appointmentId = $_POST['appointmentId'];
    $status = $_POST['status'];

    updateAppointmentStatus($appointmentId, $status);
$appointments = getMyAppointments($email);

    if ($appointments) {
$_SESSION['appointments'] = $appointments;
  $_SESSION['dbSuccessmsg'] = "Appointment status updated successfully.";
    } else {
$_SESSION['appointments'] = [];
    }
    header("Location: ../../controller/doctor/appointmentController.php");
    exit();
}






?>