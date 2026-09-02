<?php
// model/User.php

require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function registerDoctor($name, $email, $password, $phone, $specialization) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into users table
        $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'doctor')";

        if (mysqli_query($this->conn, $sql)) {
            $user_id = mysqli_insert_id($this->conn);
            
            // Insert into doctor table
            $sql = "INSERT INTO doctor (user_id, name, phone, specialization) VALUES ('$user_id', '$name', '$phone', '$specialization')";
            return mysqli_query($this->conn, $sql);
        }

        return false;
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result) > 0;
    }

    public function updateProfile($oldUsername, $newUsername, $password) {
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET username = '$newUsername', password = '$hashed' WHERE username = '$oldUsername'";
        } else {
            $sql = "UPDATE users SET username = '$newUsername' WHERE username = '$oldUsername'";
        }
        return mysqli_query($this->conn, $sql);
    }
}
?>