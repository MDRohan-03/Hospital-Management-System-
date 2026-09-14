
<?php

function connect(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mydb";

    $conn = mysqli_connect($servername, $username, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE IF NOT EXISTS consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(20) NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    email VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL
)";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Table creation failed: " . mysqli_error($conn));
}
$sql = "CREATE TABLE IF NOT EXISTS doctors(
    id int auto_increment primary key,
    name varchar(50) not null,
    email varchar(50) not null,
    password varchar(255) not null,
    phone varchar(15) not null,
    medicalLicenseNumber varchar(20) not null,
    yearsOfExperience int not null,
    consultationFee int not null,
    bio varchar(255) not null,
    role varchar(20) not null,
    specialization varchar(50) not null
)";

$doctors = mysqli_query($conn, $sql);




$patientSql="CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    password VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    bloodGroup VARCHAR(5) NOT NULL,
    address VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL
)";
    if (!mysqli_query($conn, $patientSql)) {
        die("Error creating patients table: " . mysqli_error($conn));
    }


$userSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL
)";
if (!mysqli_query($conn, $userSql)) {
    die("Error creating users table: " . mysqli_error($conn));
}


//booking table
$bookingSql = "CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patientName VARCHAR(50) NOT NULL,
    patientEmail VARCHAR(50) NOT NULL,
    patientAge INT NOT NULL,
    patientGender VARCHAR(10) NOT NULL,
    doctorName VARCHAR(50) NOT NULL,
    doctorEmail VARCHAR(50) NOT NULL,
    day VARCHAR(20) NOT NULL,
    startTime TIME NOT NULL,
    endTime TIME NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending'
)";
if (!mysqli_query($conn, $bookingSql)) {
    die("Error creating bookings table: " . mysqli_error($conn));
}

$bookings='INSERT INTO bookings (patientName, patientEmail, patientAge, patientGender, doctorName, doctorEmail, day, startTime, endTime, status) VALUES
("John Doe", "johndoe@gmail.com", 25, "Male", "Jubo", "jubo@gmail.com", "Monday", "09:00:00", "10:00:00", "pending")';

// $bookings2='INSERT INTO bookings (patientName, patientEmail, patientAge, patientGender, doctorName, doctorEmail, day, startTime, endTime, status) VALUES
// ("Jane Smith", "janesmith@gmail.com", 30, "Female", "Jubo", "jubo@gmail.com", "Monday", "11:00:00", "12:00:00", "pending")';
// $bookings3='INSERT INTO bookings (patientName, patientEmail, patientAge, patientGender, doctorName, doctorEmail, day, startTime, endTime, status) VALUES
// ("Jubine Smith", "jubinesmith@gmail.com", 30, "Male", "Jubo", "jubo@gmail.com", "Wednesday", "11:00:00", "12:00:00", "pending")';

if (!mysqli_query($conn, $bookings)) {
    die("Error inserting default booking: " . mysqli_error($conn));
}
// if (!mysqli_query($conn, $bookings2)) {
//     die("Error inserting default booking: " . mysqli_error($conn));
// }
// if (!mysqli_query($conn, $bookings3)) {
//     die("Error inserting default booking: " . mysqli_error($conn));
// }




return $conn;
}

?>

