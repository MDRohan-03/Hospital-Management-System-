<?php
session_start();
require '../model/adminNotice.php';

function validateNoticeData($data) {
    $errors = [];
    
    $title = trim($data['title'] ?? '');
    if (empty($title) || strlen($title) < 5) {
        $errors[] = "Title must be at least 5 characters.";
    }
    
    $description = trim($data['description'] ?? '');
    if (empty($description) || strlen($description) < 10) {
        $errors[] = "Description must be at least 10 characters.";
    }
    
    return $errors;
}

function handleAddNotice($postData) {
    $errors = validateNoticeData($postData);
    
    if (empty($errors)) {
        $title = $postData['title'] ?? '';
        $description = $postData['description'] ?? '';
        $created_by = $_SESSION['user_id'] ?? 1;
        
        if (addNotice($title, $description, $created_by)) {
            $_SESSION['success'] = "Notice published successfully!";
        } else {
            $_SESSION['error'] = "Failed to publish notice. Please try again.";
        }
    } else {
        $_SESSION['error'] = implode("\n", $errors);
    }
    
    header("Location: ../view/admin-notice.php");
    exit();
}

function handleDeleteNotice($id) {
    if ($id > 0) {
        if (deleteNotice($id)) {
            $_SESSION['success'] = "Notice deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete notice.";
        }
    }
    
    header("Location: ../view/admin-notice.php");
    exit();
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_notice'])) {
    handleAddNotice($_POST);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    handleDeleteNotice((int)$_GET['id']);
}
 
header("Location: ../view/admin-notice.php");
exit();
?>