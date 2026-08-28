<?php
session_start();
if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] !== true) {
    $_SESSION['titleErrMsg'] = "";
    $_SESSION['descriptionErrMsg'] = "";
}
$_SESSION['form_submitted'] = false;

require_once "../../Model/Notice.php";
$notice = new Notice();
$notices = $notice->getNotices();
$totalNotices = $notice->getTotalNotices();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Announcements</title>
    <link rel="stylesheet" href="../../assets/css/admin-style.css">
</head>
<body>

<?php include "nav.php"; ?>

<div class="main-content">

    <h2>Announcements Dashboard</h2>
   

    <?php if (isset($_SESSION['success'])): ?>
        <p style="color:green; background:#eafaf1; padding:10px; border-radius:5px; text-align:center; max-width:600px; margin:10px auto;">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </p>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red; background:#fdedec; padding:10px; border-radius:5px; text-align:center; max-width:600px; margin:10px auto;">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </p>
    <?php endif; ?>

    <!-- Add Notice Form -->
    <div class="form-container">
        <h3>Publish New Announcement</h3>
        <form method="POST" action="../../Controller/admin-notice-controller.php" onsubmit="return validateNoticeForm(this)">
            
            <div style="margin-bottom:15px;">
                <label for="title"><strong>Title:</strong></label>
                <input type="text" name="title" id="title" 
                       value="<?php echo isset($_SESSION['title']) ? htmlspecialchars($_SESSION['title']) : ''; ?>" 
                       placeholder="Enter announcement title">
                <?php if (!empty($_SESSION['titleErrMsg'])): ?>
                    <span style="color:red; display:block; margin-top:5px;">⚠️ <?php echo $_SESSION['titleErrMsg']; ?></span>
                <?php endif; ?>
            </div>

            <div style="margin-bottom:15px;">
                <label for="description"><strong>Description:</strong></label>
                <textarea name="description" id="description" rows="5" 
                          placeholder="Enter announcement description"><?php echo isset($_SESSION['description']) ? htmlspecialchars($_SESSION['description']) : ''; ?></textarea>
                <?php if (!empty($_SESSION['descriptionErrMsg'])): ?>
                    <span style="color:red; display:block; margin-top:5px;">⚠️ <?php echo $_SESSION['descriptionErrMsg']; ?></span>
                <?php endif; ?>
            </div>

            <input type="submit" value="Publish Announcement">
        </form>
    </div>

    <!-- Display Notices in Table -->
    <h3>All Announcements</h3>
    
    <?php if (empty($notices)): ?>
        <p style="text-align:center; color:#888; padding:20px;">No announcements found. Create your first announcement above!</p>
    <?php else: ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Posted Date</th>
            </tr>
            <?php foreach ($notices as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($item['title']); ?></strong></td>
                    <td><?php echo nl2br(htmlspecialchars($item['description'])); ?></td>
                    <td><?php echo $item['date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>

<script src="../../assets/js/admin-validation.js"></script>
</body>
</html>