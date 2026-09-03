<?php
require 'dbConnection.php';

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


function login ($email, $password) {
    global $conn;
 
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}
?>