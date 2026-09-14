<?php
session_start();

$success = $_SESSION['success'] ?? null;
$error = $_SESSION['error'] ?? null;
unset($_SESSION['success'], $_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Management - Hospital Management System</title>
    <link rel="stylesheet" href="../Assets/style.css">
</head>
<body>
    <?php include 'admin-nav.php'; ?>

    <div class="main-content">
        <div class="notice-container">
            <h1>Notice Management</h1>

            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <div class="notice-form-container">
                <h2>Publish New Notice</h2>
                <form action="../controller/admin-noticeController.php" method="POST" onsubmit="return validateNoticeForm()">
                    <div class="form-group">
                        <label for="title">Notice Title</label>
                        <input type="text" id="title" name="title" placeholder="Enter notice title" required>
                        <span id="noticeTitleError" class="error"></span>
                    </div>

                    <div class="form-group">
                        <label for="content">Description</label>
                        <textarea id="content" name="content" placeholder="Enter notice description" required></textarea>
                        <span id="noticeDescriptionError" class="error"></span>
                    </div>

                    <button type="submit" name="submit_notice" class="btn-publish">Publish Notice</button>
                </form>
            </div>

            <div class="notice-list">
                <div class="notice-header">
                    <h3>All Notices</h3>
                    <span class="notice-count">Total: <?php echo isset($noticeCount) ? (int)$noticeCount : 0; ?> notices</span>
                </div>

                <?php if (!empty($notices)): ?>
                    <?php foreach ($notices as $notice): ?>
                        <div class="notice-item">
                            <div class="notice-title">
                                <?php echo htmlspecialchars($notice['title']); ?>
                            </div>

                            <div class="notice-content">
                                <?php echo nl2br(htmlspecialchars($notice['content'])); ?>
                            </div>

                            <div class="notice-actions">
                                <button class="btn-delete-notice"
                                    onclick="deleteNotice(<?php echo (int)$notice['id']; ?>, '<?php echo htmlspecialchars(addslashes($notice['title']), ENT_QUOTES); ?>')">
                                    Delete
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="empty-state">
                        <h3>No Notices Published</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="../assets/js/notice.js"></script>
</body>
</html>