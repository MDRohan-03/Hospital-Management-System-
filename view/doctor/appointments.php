<?php
session_start();
$appointments = $_SESSION['appointments'] ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Schedule</title>
<style>

input{
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
.status-pending {
    color: orange;
    font-weight: bold;
}

.status-completed {
    color: green;
    font-weight: bold;
}

.status-cancelled {
    color: red;
    font-weight: bold;
}

.status-no_show {
    color: gray;
    font-weight: bold;
}
</style>

 <link rel="stylesheet" href="index.css">
</head>
<body >
      <?php
include "docNav.php"

?>
    <h2 >Today's Schedule <span>(<?php echo date("d-m-y"); ?>)</span></h2>

<span id="msg"></span>
<?php 
echo isset($_SESSION['dbSuccessmsg']) ? "<p style='color:green'>" . $_SESSION['dbSuccessmsg'] . "</p>" : "";
unset($_SESSION['dbSuccessmsg']);
?>
    <table >
  <tr style="background-color: lightgray;">
<th>Sl No.</th>
<th>Start Time</th>
<th>End Time</th>
<th>Patient</th>
<th>Age</th>
<th>Gender</th>
<th>Status</th>
<th>Action</th>
  </tr>


<?php
$count = 1;

if ($appointments) {

    foreach ($appointments as $appointment) {
?>

 <tr>
    <td><?php echo $count++; ?></td>
    <td><?php echo $appointment['startTime']; ?></td>
  <td><?php echo $appointment['endTime']; ?></td>
<td><?php echo $appointment['patientName']; ?></td>
  <td><?php echo $appointment['patientAge']; ?></td>
  <td><?php echo $appointment['patientGender']; ?></td>

  <td class="status-<?php echo $appointment['status']; ?>">
    <?php echo $appointment['status']; ?>
</td>

 <td>
   <form action="../../controller/doctor/appointmentController.php" method="post">

   <input type="hidden" name="appointmentId" value="<?php echo $appointment['id']; ?>">

 <select name="status" onchange="this.form.submit()">

<option value="pending" <?php echo ($appointment['status'] == 'pending') ? 'selected' : ''; ?>> Pending</option>

<option value="completed"<?php echo ($appointment['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>

<option value="cancelled"
<?php echo ($appointment['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>

<option value="no_show"<?php echo ($appointment['status'] == 'no_show') ? 'selected' : ''; ?>>No Show</option>
</select>

</form>
</td>
</tr>

<?php
    }

} else {
    echo "<tr><td colspan='8'>No appointments found.</td></tr>";
}
?>
    </table>
    <script src="../../js/appointment.js"></script>
</body>
</html>