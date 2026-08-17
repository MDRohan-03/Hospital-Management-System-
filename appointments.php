<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Schedule</title>
 <link rel="stylesheet" href="index.css">
</head>
<body >
      <?php
include "nav.php"

?>
    <h2 >Today's Schedule <span>(<?php echo date("d-m-y"); ?>)</span></h2>

    <table style="width:90% ;margin :20px auto;">
  <tr>
<th>Time</th>
<th>Patient</th>
<th>Age</th>
<th>Gender</th>
<th>Action</th>
  </tr>

  <tr>
<td>9:00</td>
<td>joboraz</td>
<td>24</td>
<td>Male</td>
<td>
    <select name="status" id="status">
        <option value="completed">completed</option>
        <option value="completed">cancelled</option>
        <option value="completed">no show</option>
    </select>

</td>
  </tr>
    </table>
</body>
</html>