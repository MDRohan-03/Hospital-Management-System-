<?php
session_start();
 
require_once __DIR__ . '/../model/Doctor.php';
require_once __DIR__ . '/../model/Notice.php';

$doctorModel = new Doctor();
$noticeModel = new Notice();

$doctorCount = $doctorModel->getDoctorCount();
$noticeCount = $noticeModel->getNoticeCount();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Hospital Management System</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="main-content">
        <div class="page-header">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Doctors</h3>
                <div class="number blue"><?php echo $doctorCount; ?></div>
                <div class="stat-label">Registered doctors in system</div>
            </div>

            <div class="stat-card">
                <h3>Total Notices</h3>
                <div class="number orange"><?php echo $noticeCount; ?></div>
                <div class="stat-label">Published notices</div>
            </div>
 
        </div>
    </div>
</body>
</html>