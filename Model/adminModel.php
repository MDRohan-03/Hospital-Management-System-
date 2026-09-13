<?php
require 'database.php';
global $conn;

function emailExists($email) {
    global $conn;
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}

function registerDoctor($name, $email, $password, $phone, $specialization) {
    global $conn;

    if (emailExists($email)) {
        return false;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password, role, username) 
            VALUES ('$email', '$hashedPassword', 'doctor', '$name')";

    if (mysqli_query($conn, $sql)) {
        $user_id = mysqli_insert_id($conn);
         
        $sql = "INSERT INTO doctor (user_id, name, phone, specialization) 
                VALUES ('$user_id', '$name', '$phone', '$specialization')";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            $sql = "DELETE FROM users WHERE id = '$user_id'";
            mysqli_query($conn, $sql);
            return false;
        }
    }
    return false;
}

function updateProfile($oldUsername, $newUsername, $password) {
    global $conn;

    if ($oldUsername !== $newUsername) {
        $sql = "SELECT id FROM users WHERE username = '$newUsername' AND username != '$oldUsername'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return false;
        }
    }

    if (!empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE users 
                SET username = '$newUsername', password = '$hashed' 
                WHERE username = '$oldUsername'";
    } else {
        $sql = "UPDATE users SET username = '$newUsername' WHERE username = '$oldUsername'";
    }
    return mysqli_query($conn, $sql);
}

function getUserByUsername($username) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getUserById($id) {
    global $conn;
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
?>