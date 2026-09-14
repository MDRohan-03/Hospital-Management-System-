      <!-- <?php
        $consultations = getAllConsultations();
        while ($row = mysqli_fetch_assoc($consultations)) {
        ?>
            <tr>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['startTime']; ?></td>
                <td><?php echo $row['endTime']; ?></td>

                <td style="text-align: center;">

                   <a href="updateConsultation.php?id=<?php echo $row['id']; ?>">
    <button type="button" style="color:green;">Edit</button>
</a>
              
<form method="post" action="../../controller/doctor/consultationController.php" style="display:inline;">
    
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <button type="submit" name="action" value="delete" style="color:red;">
        Delete
    </button>
</form>
                   
                   
                </td>
            </tr>
        <?php
        }
        ?> -->