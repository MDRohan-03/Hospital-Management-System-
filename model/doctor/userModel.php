<?php 
require_once __DIR__ . '/../dbConnection.php';

function getUserByEmail($email) {
    global $conn;

    $sql = "SELECT * FROM doctors WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
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
function createDoctor($name, $email, $password, $phone, $specialization, $licenseNumber, $consultationFee, $yoe, $bio)
{
    global $conn;

    $sql = "INSERT INTO doctors
            (name, email, password, phone, medicalLicenseNumber,
             yearsOfExperience, consultationFee, bio, role, specialization)
            VALUES
            ('$name', '$email', '$password', '$phone', '$licenseNumber',
             '$yoe', '$consultationFee', '$bio', 'doctor', '$specialization')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function updateProfile($name, $email, $phone, $specialization, $licenseNumber, $consultationFee, $yoe, $bio)
{
    global $conn;

    $sql = "UPDATE doctors
            SET name = '$name',
                email = '$email',
                phone = '$phone',
                specialization = '$specialization',
                medicalLicenseNumber = '$licenseNumber',
                consultationFee = '$consultationFee',
                yearsOfExperience = '$yoe',
                bio = '$bio'
            WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

?>