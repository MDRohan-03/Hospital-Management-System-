<?php
require_once __DIR__ . '/../dbConnection.php';

if (!isset($conn)) {
    $conn = connect();
}

function clean($value) {
    global $conn;
    if (!$conn) return trim($value);
    return mysqli_real_escape_string($conn, trim($value));
}

/* ============ PATIENT ============ */

function createPatient($name, $email, $phone, $password, $dob, $bloodGroup, $address, $role) {
    global $conn;
    if (!$conn) return false;

    $name       = clean($name);
    $email      = clean($email);
    $phone      = clean($phone);
    $password   = clean($password);
    $dob        = clean($dob);
    $bloodGroup = clean($bloodGroup);
    $address    = clean($address);
    $role       = clean($role);

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

function getPatientByEmail($email) {
    global $conn;
    if (!$conn) return null;

    $email = clean($email);
    $sql = "SELECT * FROM patients WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return null;
}

function updatePatientProfile($email, $name, $phone, $password, $dob, $bloodGroup, $address, $role) {
    global $conn;
    if (!$conn) return false;

    $email      = clean($email);
    $name       = clean($name);
    $phone      = clean($phone);
    $password   = clean($password);
    $dob        = clean($dob);
    $bloodGroup = clean($bloodGroup);
    $address    = clean($address);
    $role       = clean($role);

    $sql = "UPDATE patients
            SET name = '$name', phone = '$phone', password = '$password',
                dob = '$dob', bloodGroup = '$bloodGroup', address = '$address', role = '$role'
            WHERE email = '$email'";

    return mysqli_query($conn, $sql);
}

function updateonUserTable($email, $name, $password, $role) {
    global $conn;
    if (!$conn) return false;

    $email    = clean($email);
    $name     = clean($name);
    $password = clean($password);
    $role     = clean($role);

    $sql = "UPDATE users SET name = '$name', password = '$password', role = '$role'
            WHERE email = '$email'";

    return mysqli_query($conn, $sql);
}

/* ============ DOCTORS ============ */

function getDoctorById($id) {
    global $conn;
    if (!$conn) return null;

    $id = (int)$id;
    $sql = "SELECT * FROM doctors WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getSchedulesByDoctorEmail($email) {
    global $conn;
    if (!$conn) return [];

    $email = clean($email);
    $sql = "SELECT * FROM consultations WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function searchDoctors($search, $spec) {
    global $conn;
    if (!$conn) return [];

    $search = clean($search);
    $spec   = clean($spec);

    if ($search != '' && $spec != '') {
        $sql = "SELECT * FROM doctors WHERE name LIKE '%$search%' AND specialization = '$spec'";
    } elseif ($search != '') {
        $sql = "SELECT * FROM doctors WHERE name LIKE '%$search%'";
    } elseif ($spec != '') {
        $sql = "SELECT * FROM doctors WHERE specialization = '$spec'";
    } else {
        $sql = "SELECT * FROM doctors";
    }

    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/* ============ BOOKINGS ============ */

function insertBooking($patientName, $patientEmail, $patientAge, $patientGender,
                       $doctorName, $doctorEmail, $day, $startTime, $endTime, $status) {
    global $conn;
    if (!$conn) return false;

    $patientName   = clean($patientName);
    $patientEmail  = clean($patientEmail);
    $patientAge    = (int)$patientAge;
    $patientGender = clean($patientGender);
    $doctorName    = clean($doctorName);
    $doctorEmail   = clean($doctorEmail);
    $day           = clean($day);
    $startTime     = clean($startTime);
    $endTime       = clean($endTime);
    $status        = clean($status);

    $sql = "INSERT INTO bookings
            (patientName, patientEmail, patientAge, patientGender,
             doctorName, doctorEmail, day, startTime, endTime, status)
            VALUES
            ('$patientName', '$patientEmail', '$patientAge', '$patientGender',
             '$doctorName', '$doctorEmail', '$day', '$startTime', '$endTime', '$status')";

    return mysqli_query($conn, $sql);
}

function getBookingsByPatientEmail($email) {
    global $conn;
    if (!$conn) return [];

    $email = clean($email);
    $sql = "SELECT * FROM bookings WHERE patientEmail = '$email'";
    $result = mysqli_query($conn, $sql);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getRecentBookingByPatientEmail($email) {
    global $conn;
    if (!$conn) return null;

    $email = clean($email);
    $sql = "SELECT * FROM bookings WHERE patientEmail = '$email' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}