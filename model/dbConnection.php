
<?php
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
    endTime TIME NOT NULL
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

if (!$doctors) {
    die("Table creation failed: " . mysqli_error($conn));
}else{
$sql="INSERT INTO doctors (name, email, password, phone, medicalLicenseNumber, yearsOfExperience, consultationFee, bio, role, specialization) VALUES
('Joboraz', 'joboraz@gmail.com', 'password123', '019898456', 'MD123456', 10, 800, 'Experienced cardiologist with over a decade of practice.', 'doctor', 'Cardiology')";

if (!mysqli_query($conn, $sql)) {
    die("Error inserting default doctor: " . mysqli_error($conn));
}
}


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


//user table
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
return $conn;

?>

