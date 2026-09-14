<?php
session_start();
if (!isset($_SESSION['email']) || ($_SESSION['role'] ?? '') !== 'patient') {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>

<?php include "nav.php"; ?>

<fieldset>
    <h1 id="text">My Booking History</h1>

    <?php if (!empty($_SESSION['errorMsg'])): ?>
        <p style="color:red;"><?php echo htmlspecialchars($_SESSION['errorMsg']); unset($_SESSION['errorMsg']); ?></p>
    <?php endif; ?>

    <table class="table">
        <tr>
            <th>Doctor</th>
            <th>Day</th>
            <th>Start</th>
            <th>End</th>
            <th>Status</th>
        </tr>

        <?php if (empty($_SESSION['bookings'])) { ?>
            <tr><td colspan="5">No bookings yet.</td></tr>
        <?php } else {
            for ($i = 0; $i < count($_SESSION['bookings']); $i++) {
                $b = $_SESSION['bookings'][$i];
        ?>
                <tr>
                    <td><?php echo htmlspecialchars($b['doctorName']); ?></td>
                    <td><?php echo htmlspecialchars($b['day']); ?></td>
                    <td><?php echo htmlspecialchars($b['startTime']); ?></td>
                    <td><?php echo htmlspecialchars($b['endTime']); ?></td>
                    <td><?php echo htmlspecialchars($b['status']); ?></td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</fieldset>

</body>
</html>