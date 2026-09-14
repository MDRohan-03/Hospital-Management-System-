<?php

require __DIR__ . '/../dbConnection.php';

function createConsultation($day, $startTime, $endTime, $email, $name)
{
$conn=connect();

    $sql = "INSERT INTO consultations (day, startTime, endTime,email,name)
VALUES ('$day', '$startTime', '$endTime','$email','$name')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
 $_SESSION['dbSuccessmsg'] = "Consultation hours set successfully.";
    } else {
$_SESSION['dbErrmsg'] = "Error: " . mysqli_error($conn);
    }
}


function getMyConsultations($email)
{
$conn=connect();

    $sql = "SELECT * FROM consultations WHERE email = '$email'";
$consultations = [];
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
while ($row = mysqli_fetch_assoc($result)) {
$consultations[] = $row;
}
return $consultations;
    } else {
return false;

    }
}

function getConsultationById($id)
{
$conn=connect();

    $sql = "SELECT * FROM consultations WHERE id = $id";

    $result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
        $consultation = mysqli_fetch_assoc($result);
        return $consultation;
    } else {
return false;
    }
   
}

function updateConsultation($id, $day, $startTime, $endTime)
{
    $conn = connect();

    $sql = "UPDATE consultations 
SET day = '$day', 
startTime = '$startTime', 
endTime = '$endTime' 
WHERE id = $id";

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
    $conn=connect();

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