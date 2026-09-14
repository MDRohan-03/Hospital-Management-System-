<?php

session_start();
$consultations = isset($_SESSION['consultation'])
    ? $_SESSION['consultation']
    : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Hours</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>

<?php include "docNav.php" ?>
<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">
<h1>Consultation Hours</h1>
<?php if (isset($_SESSION['dbErrmsg']) && !empty($_SESSION['dbErrmsg'])) {
echo "<p style='color:red'>" . $_SESSION['dbErrmsg'] . "</p>";
unset($_SESSION['dbErrmsg']);}
if (isset($_SESSION['dbSuccessmsg']) && !empty($_SESSION['dbSuccessmsg'])) {
echo "<p style='color:green'>" . $_SESSION['dbSuccessmsg'] . "</p>";
unset($_SESSION['dbSuccessmsg']);}?>
<form method="post" action="../../controller/doctor/consultationController.php" onsubmit="return validateForm(this)">

            <label for="day">Select a day:</label>

            <select name="day" id="day">
                <option value="Monday"
                    <?php echo (isset($_SESSION['day']) && $_SESSION['day'] == "Monday") ? "selected" : ""; ?>>
                    Monday
                </option>
                <option value="Tuesday"
                    <?php echo (isset($_SESSION['day']) && $_SESSION['day'] == "Tuesday") ? "selected" : ""; ?>>
                    Tuesday
                </option>
                <option value="Wednesday"
                    <?php echo (isset($_SESSION['day']) && $_SESSION['day'] == "Wednesday") ? "selected" : ""; ?>>
                    Wednesday
                </option>
                <option value="Thursday"
                    <?php echo (isset($_SESSION['day']) && $_SESSION['day'] == "Thursday") ? "selected" : ""; ?>>
                    Thursday
                </option>
                <option value="Friday"
                    <?php echo (isset($_SESSION['day']) && $_SESSION['day'] == "Friday") ? "selected" : ""; ?>>
                    Friday
                </option>
            </select>
            <?php
            if (!empty($_SESSION['dayErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['dayErrmsg'] . "</span>";
            }
            ?>
            <br><br>
            <label for="startTime">Select start time:</label>

            <input type="time" name="startTime" id="startTime"
                value="<?php echo isset($_SESSION['startTime']) ? $_SESSION['startTime'] : ''; ?>">
            <?php
            if (!empty($_SESSION['startTimeErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['startTimeErrmsg'] . "</span>";
            }
            ?>
            <br><br>
            <label for="endTime">Select end time:</label>
            <input type="time" name="endTime" id="endTime"
                value="<?php echo isset($_SESSION['endTime']) ? $_SESSION['endTime'] : ''; ?>">
            <?php
            if (!empty($_SESSION['endTimeErrmsg'])) {
                echo "<span style='color:red'>" . $_SESSION['endTimeErrmsg'] . "</span>";
            }
            ?> <br><br>
            <input style="color:blue;" type="submit" name="action" value="save">
        </form>
    </div>

    <!-- table -->
 <h3>Availability</h3>

<table>
<tr>
<th>Day</th>
<th>Start Time</th>
<th>End Time</th>
<th>Action</th>
    </tr>

    <?php

if (!empty($consultations)) {

foreach ($consultations as $consultation) {
    ?>
<tr>
<td><?php echo $consultation['day']; ?></td>

<td><?php echo $consultation['startTime']; ?></td>

<td><?php echo $consultation['endTime']; ?></td>

<td style="text-align: center;">

<a href="../../controller/doctor/consultationController.php?id=<?php echo $consultation['id']; ?>">
<button type="button" style="color:green;">
Edit
</button>
</a>

<form method="post" action="../../controller/doctor/consultationController.php"
style="display:inline;">
<input type="hidden" name="id" value="<?php echo $consultation['id']; ?>"
>

<button type="submit"
name="action"
value="delete" style="color:red;">Delete
</button>

</form>

</td>
</tr>

<?php
 }

    } else {
?>

<tr>
<td colspan="4">No consultation hours available.</td>
</tr>

    <?php

    }

    ?>

</table>
    <script src="../js/consultation.js"></script>

</body>
</html>