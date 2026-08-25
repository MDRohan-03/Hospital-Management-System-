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
</style>
 <link rel="stylesheet" href="index.css">
</head>
<body >
      <?php
include "nav.php"

?>
    <h2 >Patient's List</h2>
<form style="width:50%;margin :20px auto;">
    <input type="text" name="search" placeholder="Enter patient name...">
    <input type="submit" style="color:white;background-color: green;border: none;" value="Search">
</form>
    <table >
  <tr style="background-color: lightgray;">
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
   <button>View Details</button>

</td>
  </tr>
    </table>
</body>
</html>