<?php
require 'database.php';
global $conn;

function getAllDoctors() {
    global $conn;
    $sql = "SELECT d.*, u.email, u.id as user_id 
            FROM doctor d 
            JOIN users u ON d.user_id = u.id 
            WHERE u.role = 'doctor'
            ORDER BY d.name ASC";
    $result = mysqli_query($conn, $sql);

    $doctors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $doctors[] = $row;
    }
    return $doctors;
}

function getDoctorCount() {
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM doctor";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return (int)($row['total'] ?? 0);
}

function deleteDoctor($user_id) {
    global $conn;
    $sql1 = "DELETE FROM doctor WHERE user_id = '$user_id'";
    $result1 = mysqli_query($conn, $sql1);
    
    $sql2 = "DELETE FROM users WHERE id = '$user_id' AND role = 'doctor'";
    $result2 = mysqli_query($conn, $sql2);
    
    return $result1 && $result2;
}
?>