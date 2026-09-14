<?php

function getMyAppointments($email)
{
    $conn = connect();

    $sql = "SELECT * FROM bookings WHERE doctorEmail='$email' and status='pending' ORDER BY startTime ASC";

    $result = mysqli_query($conn, $sql);

    $appointments = [];

    if (mysqli_num_rows($result) > 0) {

while ($row = mysqli_fetch_assoc($result)) {
 $appointments[] = $row;}
return $appointments;
    }

    return false;
}


function updateAppointmentStatus($appointmentId, $status)
{
    $conn = connect();

    $sql = "UPDATE bookings
SET status = '$status'
    WHERE id = '$appointmentId'";

    $result = mysqli_query($conn, $sql);

    return $result;
}
?>