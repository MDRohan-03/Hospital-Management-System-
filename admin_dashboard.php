<?php

session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$adminName = $_SESSION['admin_name'] ?? "Admin";

$todayAppointments = 25;
$totalPatients = 100;
$activeDoctors = 10;
$pendingBills = 25;

?>

<!DOCTYPE html>
<html>
     <head>
          <title>Admin Dashboard</title>
          <link rel="stylesheet" href="admin-style.css">

 
     </head>
     <body>
          <div class="sidebar">
               <h2>Admin Panel</h2>
               <a href="admin_dashboard.php" class="active"> Dashboard</a>
               <a href="admin-add-doctor.php"> Add Doctor</a>
               <a href="admin-managePatients.php"> Manage Patients </a>
               <a href="admin-edit-profile.php"> Edit Profile </a>
               <a href="admin-announcement.php"> Announcement </a>
               <a href="logout.php"> Logout</a>
          </div>

          <div class="board">
               <div class="topbar">
                    <h1>Hospital Management System</h1>
                    <p>
                         Welcome,
                         <?php echo htmlspecialchars($adminName); ?>
                    </p>
               </div>

               <div class="table">
                    <h2>Admin Dashboard</h2>
                    <div class="Dashtabledata">

                         <div class="data">
                              <h3>Today's Appointments</h3>
                              <input type="number" class="number"  value="<?php echo $todayAppointments; ?>"  readonly >
                         </div>

                         <div class="data">
                              <h3>Total Patients</h3>
                              <input type="number" class="number" value="<?php echo $totalPatients; ?>" readonly >
                         </div>

                        <div class="data">
                             <h3>Active Doctors</h3>
                             <input type="number" class="number"  value="<?php echo $activeDoctors; ?>"readonly>
                         </div>

                         <div class="data">
                               <h3>Pending Bills</h3>
                              <input  type="number"  class="number" value="<?php echo $pendingBills; ?>"  readonly>
                         </div>
                    </div>
                </div>
          </div>
          <script src="dashboard-validation.js"></script>
     </body>

</html>