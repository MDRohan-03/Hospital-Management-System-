<?php
// model/Doctor.php

require_once __DIR__ . '/../config/database.php';

class Doctor {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllDoctors() {
        $sql = "SELECT d.*, u.email FROM doctor d JOIN users u ON d.user_id = u.id ORDER BY d.name ASC";
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
        return $row['total'] ?? 0;
    }

    public function deleteDoctor($id) {
        // First delete from doctor table
        $sql = "DELETE FROM doctor WHERE user_id = '$id'";
        if (mysqli_query($this->conn, $sql)) {
            // Then delete from users table
            $sql2 = "DELETE FROM users WHERE id = '$id'";
            return mysqli_query($this->conn, $sql2);
        }
        return false;
    }
}
?>