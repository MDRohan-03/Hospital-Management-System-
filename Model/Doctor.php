<?php
// model/Doctor.php

require_once __DIR__ . '/database.php';

class Doctor {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllDoctors() {
        $sql = "SELECT d.*, u.email, u.id as user_id 
                FROM doctor d 
                JOIN users u ON d.user_id = u.id 
                WHERE u.role = 'doctor'
                ORDER BY d.name ASC";
        $result = mysqli_query($this->conn, $sql);

        $doctors = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;
        }
        return $doctors;
    }

    public function getDoctorCount() {
        $sql = "SELECT COUNT(*) as total FROM doctor";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return (int)($row['total'] ?? 0);
    }

    public function deleteDoctor($user_id) {
       
        $sql1 = "DELETE FROM doctor WHERE user_id = '$user_id'";
        $result1 = mysqli_query($this->conn, $sql1);
        
        $sql2 = "DELETE FROM users WHERE id = '$user_id' AND role = 'doctor'";
        $result2 = mysqli_query($this->conn, $sql2);
        
        return $result1 && $result2;
    }
}
?>