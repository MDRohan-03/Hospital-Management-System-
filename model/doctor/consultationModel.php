<?php

require __DIR__ . '/../dbConnection.php';

function createConsultation($day, $startTime, $endTime)
{
    global $conn;

    $sql = "INSERT INTO consultations (day, startTime, endTime)
            VALUES ('$day', '$startTime', '$endTime')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['dbSuccessmsg'] = "Consultation hours set successfully.";
    } else {
        $_SESSION['dbErrmsg'] = "Error: " . mysqli_error($conn);
    }
}


function getAllConsultations()
{
    global $conn;

    $sql = "SELECT * FROM consultations";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function getConsultationById($id)
{
    global $conn;

    $sql = "SELECT * FROM consultations WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    return $result;
}

function updateConsultation($id, $day, $startTime, $endTime)
{
    global $conn;

    $sql = "UPDATE consultations SET day = '$day', startTime = '$startTime', endTime = '$endTime' WHERE id = $id";

    $result = mysqli_query($conn, $sql);
if ($result) {
        $_SESSION['dbSuccessmsg'] = "Consultation hours updated successfully.";
    } else {
        $_SESSION['dbErrmsg'] = "Error: " . mysqli_error($conn);
    }
    return $result;
}
function deleteConsultation($id)
{
    global $conn;

    $sql = "DELETE FROM consultations WHERE id = $id";

    $result = mysqli_query($conn, $sql);
if ($result) {
        $_SESSION['dbSuccessmsg'] = "Consultation hours deleted successfully.";
    } else {
        $_SESSION['dbErrmsg'] = "Error: " . mysqli_error($conn);
    }
    return $result;
}

?>