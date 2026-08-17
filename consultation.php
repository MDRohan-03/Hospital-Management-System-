<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Hours</title>
     <link rel="stylesheet" href="index.css">

</head>
<body>
      <?php
include "nav.php"

?>
   <div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

 <h1>Consultation Hours</h1>

<form method="post" action="consultation.php">
    <label for="day">Select a day:</label>
    <select name="day" id="day">
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
    </select>
<br><br>

    <label for="start_time">Select start time:</label>
    <input type="time" name="starttime" id="starttime">
<br><br>
     <label for="end_time">Select end time:</label>
    <input type="time" name="endtime" id="endtime">


    <br><br>
    
    <input style="color:blue;"  type="submit" value="save">


</form>


<!-- table -->
 <h3 >Availability</h3>

<table>
    <tr>
        <th>Day </th>
        <th>Start Time</th>
        <th>End Time</th>
    </tr>

    <tr>
        <td>Sunday</td>
        <td>11:00</td>
        <td>3:00</td>
    </tr>
</table>
   </div>


</body>
</html>