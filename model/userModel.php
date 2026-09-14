<?php
require_once __DIR__ . '/dbConnection.php';

if (!isset($conn)) {
    $conn = connect();
}

function getUserByEmail($email) {
    global $conn;
    if (!$conn) return null;

    $email = mysqli_real_escape_string($conn, trim($email));
    $sql = "SELECT * FROM doctors WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function createUser($name, $email, $password, $role) {
    global $conn;
    if (!$conn) return false;

    $name     = mysqli_real_escape_string($conn, trim($name));
    $email    = mysqli_real_escape_string($conn, trim($email));
    $password = mysqli_real_escape_string($conn, trim($password));
    $role     = mysqli_real_escape_string($conn, trim($role));

    $sql = "INSERT INTO users (name, email, password, role)
            VALUES ('$name', '$email', '$password', '$role')";

    return mysqli_query($conn, $sql) ? true : false;
}

function updateProfile($name, $email, $phone, $specialization, $licenseNumber, $consultationFee, $yoe, $bio) {
    global $conn;
    if (!$conn) return false;

    $name            = mysqli_real_escape_string($conn, trim($name));
    $email           = mysqli_real_escape_string($conn, trim($email));
    $phone           = mysqli_real_escape_string($conn, trim($phone));
    $specialization  = mysqli_real_escape_string($conn, trim($specialization));
    $licenseNumber   = mysqli_real_escape_string($conn, trim($licenseNumber));
    $consultationFee = (int)$consultationFee;
    $yoe             = (int)$yoe;
    $bio             = mysqli_real_escape_string($conn, trim($bio));

    $sql = "UPDATE doctors
            SET name = '$name', email = '$email', phone = '$phone',
                specialization = '$specialization',
                medicalLicenseNumber = '$licenseNumber',
                consultationFee = '$consultationFee',
                yearsOfExperience = '$yoe',
                bio = '$bio'
            WHERE email = '$email'";

    return mysqli_query($conn, $sql) ? true : false;
}

function login($email, $password) {
    global $conn;
    if (!$conn) return null;

    $email    = mysqli_real_escape_string($conn, trim($email));
    $password = mysqli_real_escape_string($conn, trim($password));

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}