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

         <style>
            * {

                 margin: 0;
                 padding: 0;
                 box-sizing: border-box;
                 font-family: Arial, sans-serif;
            }

            body {
                 background-color: #f4f7fb;
                 color: #333;
            }

             /* Sidebar */
             .sidebar {
                 position: fixed;
                 left: 0;
                 top: 0;
                 width: 240px;
                 height: 100vh;
                 background-color: #245941;
                 color: white;
                 padding: 25px 15px;
            }

            .sidebar h2 {
                 text-align: center;
                 margin-bottom: 35px;
            }

            .sidebar a {
                 display: block;
                 color: white;
                 text-decoration: none;
                 padding: 14px 15px;
                 margin: 8px 0;
                 border-radius: 6px;
            }

            .sidebar a:hover,
            .sidebar a.active {
                 background-color: #6da788;
            }

            /* Main */
            .board {
                 margin-left: 240px;
                 padding: 25px;
            }

            .topbar {
                 background-color: rgb(128, 180, 154);
                 padding: 20px;
                 border-radius: 10px;
                 margin-bottom: 25px;
            }

            .topbar h1 {
                 color: #0b3f2d;
                 margin-bottom: 8px;
            }

            .table {
                 background-color: white;
                 padding: 25px;
                 border-radius: 10px;
                 margin-bottom: 30px;
                 box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }

            .table h2 {
                 color: #0b473a;
                 margin-bottom: 20px;
            }

            .Dashtabledata {
                  display: block;
            }

            .data {
                 background-color: white;
                 padding: 25px;
                 margin-bottom: 15px;
                 border-radius: 10px;
                 box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            }

            .data h3 {
                 color: #666;
                 margin-bottom: 12px;
            }

            .number {
                 font-size: 30px;
                 font-weight: bold;
                 color: #0f4a42;
                  border: none;
                 background: transparent;
            }
        </style>
    </head>

    <body>
          <!-- Sidebar -->
         <div class="sidebar">
         
             <h2>Admin Panel</h2>
             <a href="admin_dashboard.php" class="active"> Dashboard </a>
             <a href="admin-add-doctor.php"> Add Doctor </a>
             <a href="admin-managePatients.php"> Manage Patients </a>
             <a href="admin-edit-profile.php"> Edit Profile </a>
             <a href="admin-announcement.php"> Announcement</a>
             <a href="logout.php"> Logout </a>

        </div>


        <!-- Main Board -->
        <div class="board"> 

            <div class="topbar">
                   <h1>Hospital Management System</h1>
                 <p>Welcome, <?php echo htmlspecialchars($adminName); ?> </p>

            </div>
             <div class="table">
                 <h2>Admin Dashboard</h2>
                 <div class="Dashtabledata">

                      <!--Appointments-->
                     <div class="data">
                           <h3>Today's Appointments</h3>
                         <input type="number" class="number"value="<?php echo $todayAppointments; ?>"  readonly >
                     </div>

                     <!--Total Patients-->
                     <div class="data">
                          <h3>Total Patients</h3>
                         <input type="number"  class="number"value="<?php echo $totalPatients; ?>"  readonly>
                     </div>

                     <!--Active Doctors-->
                     <div class="data">
                          <h3>Active Doctors</h3>
                         <input type="number"class="number"  value="<?php echo $activeDoctors; ?>"  readonly >
                     </div>


                     <!--Pending Bills-->
                     <div class="data">
                         <h3>Pending Bills</h3>
                         <input type="number" class="number" value="<?php echo $pendingBills; ?>" readonly >
                     </div>

                 </div>

            </div>

        </div>

    </body>
</html>