 
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Notice</title>

    <link rel="stylesheet" href="../../Assets/style.css">
    <script src="../../Assets/js/notice.js"></script>
</head>

<body>

    <?php include 'nav.php'; ?>


    <div class="main-content">

        <h1>Notice / Announcement</h1>


        <form action="../../controller/admin-noticeController.php"
              method="POST"
              onsubmit="return validateNoticeForm()"
              class="notice-form">


            <!-- Notice Title -->

            <label for="title">Notice Title</label>

            <input type="text"
                   id="title"
                   name="title"
                   placeholder="Enter notice title">

            <span id="noticeTitleError" class="error"></span>


            <!-- Notice Description -->

            <label for="description">Description</label>

            <textarea id="description"
                      name="description"
                      placeholder="Enter notice description"></textarea>

            <span id="noticeDescriptionError" class="error"></span>


            <!-- Submit Button -->

            <button type="submit" name="submit_notice">
                Publish Notice
            </button>

        </form>

    </div>

</body>

</html>
 
