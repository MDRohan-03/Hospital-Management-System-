<?php
require "../../Controller/admin-dashboard-controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>

<body>
<?php
include "nav.php"
?>

<div class="main-content">
    <h1>Admin Dashboard</h1>
    <h2>Welcome, Admin</h2>
    <div class="cardsDash">
        <div class="card">
            <h3>Today's Appointments</h3>
            <p>0</p>
        </div>

        <div class="card">
            <h3>Total Patients</h3>
            <p><?php echo $totalPatients; ?></p>
        </div>

        <div class="card">
            <h3>Active Doctors</h3>
            <p><?php echo $activeDoctors; ?></p>
        </div>

        <div class="card">
            <h3>Pending Accounts</h3>
            <p><?php echo $pendingPatients; ?></p>
        </div>
    </div>
</div>
</body>
</html>