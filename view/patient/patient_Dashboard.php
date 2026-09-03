<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
     <?php 
      include "nav.php"; 
     ?><br>
    <table id="table">
        <tr>
            <td> 
    <div>
    <h2 id="text">Patient Dashboard</h2>
    <p>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] :"guest"?></p>
    <div>Upcoming Appointments: </div>
    <br>
    <div>Billing Records: </div>
    </div>
    </td>
 </tr>
 </table>

</div>
</body>
</html>