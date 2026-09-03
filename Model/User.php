<?php

require_once __DIR__ . '/database.php';

class User {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function registerDoctor($name, $email, $password, $phone, $specialization) {
        
        if ($this->emailExists($email)) {
            return false;
        }
 
 
        $sql = "INSERT INTO users (email, password, role, username) 
                VALUES ('$email', '$hashedPassword', 'doctor', '$name')";

        if (mysqli_query($this->conn, $sql)) {
            $user_id = mysqli_insert_id($this->conn);
             
            $sql = "INSERT INTO doctor (user_id, name, phone, specialization) 
                    VALUES ('$user_id', '$name', '$phone', '$specialization')";
            
            if (mysqli_query($this->conn, $sql)) {
                return true;
            } else {
                
                $sql = "DELETE FROM users WHERE id = '$user_id'";
                mysqli_query($this->conn, $sql);
                return false;
            }
        }

        return false;
    }

    public function emailExists($email) {
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_num_rows($result) > 0;
    }

    public function updateProfile($oldUsername, $newUsername, $password) {
      
        if ($oldUsername !== $newUsername) {
            $sql = "SELECT id FROM users WHERE username = '$newUsername' AND username != '$oldUsername'";
            $result = mysqli_query($this->conn, $sql);
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
        return mysqli_query($this->conn, $sql);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }
}
?>