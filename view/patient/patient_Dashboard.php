<?php
session_start();
if (!isset($_SESSION['email']) || ($_SESSION['role'] ?? '') !== 'patient') {
    header("Location: ../login.php");
    exit();
}
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

<?php include "nav.php"; ?>
<br>

<table id="table">
    <tr>
        <td>
            <div>
                <h2 id="text">Patient Dashboard</h2>

                <p>Welcome, <?php echo htmlspecialchars($_SESSION['name'] ?? "guest"); ?></p>

                <?php if (!empty($_SESSION['errorMsg'])): ?>
                    <p style="color:red;"><?php echo htmlspecialchars($_SESSION['errorMsg']); unset($_SESSION['errorMsg']); ?></p>
                <?php endif; ?>

                <div>
                    <strong>Most Recent Appointment:</strong><br>

                    <?php if (!empty($_SESSION['recentBooking'])) {
                        $r = $_SESSION['recentBooking'];
                    ?>
                        Doctor: <?php echo htmlspecialchars($r['doctorName']); ?><br>
                        Day: <?php echo htmlspecialchars($r['day']); ?><br>
                        Time: <?php echo htmlspecialchars($r['startTime']); ?> - <?php echo htmlspecialchars($r['endTime']); ?><br>
                        Status: <?php echo htmlspecialchars($r['status']); ?>
                    <?php } else { ?>
                        No appointments yet.
                    <?php } ?>
                </div>

                <br>
            </div>
        </td>
    </tr>
</table>

</body>
</html>