<?php
require_once __DIR__ . '/../dbConnection.php';
 
function createPatient($name, $email, $phone, $password, $dob, $bloodGroup, $address, $role)
{
    global $conn;
 
    $sql = "INSERT INTO patients (name, email, phone, password, dob, bloodGroup, address, role)
            VALUES ('$name', '$email', '$phone', '$password', '$dob', '$bloodGroup', '$address', '$role')";
 
    $result = mysqli_query($conn, $sql);
 
    if ($result) {
        $_SESSION['dbSuccessmsg'] = "Patient registered successfully.";
    } else {
        $_SESSION['dbErrmsg'] = "Error: " . mysqli_error($conn);
    }
    return $result;
}
function createUser($name, $email, $password, $role) {
    global $conn;

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function getPatientByEmail($email) {
    global $conn;
 
    $sql = "SELECT * FROM patients WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function updatePatientProfile($name, $email, $phone, $password, $dob, $bloodGroup, $address, $role) {
    global $conn;
 
    $sql = "UPDATE patients SET name = '$name', email = '$email', phone = '$phone', password = '$password', dob = '$dob', bloodGroup = '$bloodGroup', address = '$address', role = '$role' WHERE email = '$email'";
 
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
 
?>