<?php
session_start();
require "../../Model/Notice.php";
$notice = new Notice();
$notices = $notice->getNotices();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>

<body>

<?php
include "nav.php"
?>

<div class="main-content">
    <h2>Announcements</h2>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<p style='color:green'>" . $_SESSION['success'] . "</p>";
        unset($_SESSION['success']);
    }
    ?>

    <div class="form-container">
        <form method="post"action="../../Controller/admin-notice-controller.php"onsubmit="return validateNoticeForm(this)">
            <label for="title">Announcement Title:</label>
            <input type="text"name="title"id="title"value="<?php echo isset($_SESSION['title']) ? $_SESSION['title'] : ''; ?>">
            <br><br>


            <label for="description">Description:</label>
            <br>
            <textarea name="description"id="description"rows="6"cols="60">
                <?php echo isset($_SESSION['description']) ? $_SESSION['description'] : ''; ?></textarea>
            <br><br>

            <input type="submit" value="Publish Announcement">
        </form>
    </div>

</div>
<script src="../../assets/js/admin-validation.js"></script>
</body>
</html>