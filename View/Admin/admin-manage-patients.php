<?php
session_start();
require_once "../../Model/Patient.php";
$patient = new Patient();
$patients = $patient->getPatients();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>

<body>
    
<?php
include "nav.php"
?>

<div class="main-content">

    <h2>Manage Patients</h2>

    <?php

    if (isset($_SESSION['success'])) {

        echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";

        unset($_SESSION['success']);

    }

    ?>

    <table>

        <tr>

            <th>ID</th>

            <th>Name</th>

            <th>Email</th>

            <th>Phone</th>

            <th>Status</th>

            <th>Payment</th>

            <th>Action</th>

        </tr>

        <?php

        foreach ($patients as $patient) {

        ?>

        <tr>

            <td><?php echo $patient['id']; ?></td>

            <td><?php echo $patient['name']; ?></td>

            <td><?php echo $patient['email']; ?></td>

            <td><?php echo $patient['phone']; ?></td>

            <td><?php echo $patient['status']; ?></td>

            <td><?php echo $patient['payment']; ?></td>

            <td>

                <?php

                if ($patient['status'] == "Active") {

                ?>

                    <a href="../../Controller/admin-patient-controller.php?action=deactivate&id=<?php echo $patient['id']; ?>">
                        Deactivate
                    </a>

                <?php

                } else {

                ?>

                    <a href="../../Controller/admin-patient-controller.php?action=activate&id=<?php echo $patient['id']; ?>">
                        Activate
                    </a>

                <?php

                }

                ?>

                <br>

                <?php

                if ($patient['payment'] == "Pending") {

                ?>

                    <a href="../../Controller/admin-patient-controller.php?action=paid&id=<?php echo $patient['id']; ?>">
                        Mark as Paid
                    </a>

                <?php

                }

                ?>

            </td>

        </tr>

        <?php

        }

        ?>

    </table>

</div>

</body>

</html>