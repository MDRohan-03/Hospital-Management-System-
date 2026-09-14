<?php
session_start();
require_once __DIR__ . '/../../model/dbConnection.php';
$conn = connect();

$email = $_SESSION['email'];

$sql = "SELECT * FROM bookings WHERE patientEmail = '$email'";
$result = mysqli_query($conn, $sql);

$_SESSION['bookings'] = [];
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['bookings'][$i] = $row;
    $i++;
}

header("Location: ../../view/patient/booking_history.php");
exit();
?>