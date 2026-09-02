<?php
// controller/admin-noticeController.php

session_start();

require_once __DIR__ . '/../model/Notice.php';
require_once __DIR__ . '/Validation.php';

function handleAddNotice($postData) {
    $noticeModel = new Notice();
    $validator = new Validation();
    
    // Get form data
    $title = $postData['title'] ?? '';
    $description = $postData['description'] ?? '';
    
    // Validate data
    $errors = $validator->validateNoticeData($postData);
    
    if (empty($errors)) {
        $created_by = $_SESSION['user_id'] ?? 1;
        
        if ($noticeModel->addNotice($title, $description, $created_by)) {
            $_SESSION['success'] = "Notice published successfully!";
            header("Location: ../view/admin-notice.php");
            exit();
        } else {
            $_SESSION['error'] = "Failed to publish notice. Please try again.";
            header("Location: ../view/admin-notice.php");
            exit();
        }
    } else {
        $_SESSION['error'] = implode("\n", $errors);
        header("Location: ../view/admin-notice.php");
        exit();
    }
}

function handleDeleteNotice($id) {
    $noticeModel = new Notice();
    
    if ($id > 0) {
        if ($noticeModel->deleteNotice($id)) {
            $_SESSION['success'] = "Notice deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete notice.";
        }
    }
    
    header("Location: ../view/admin-notice.php");
    exit();
}

// Router
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_notice'])) {
    handleAddNotice($_POST);
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    handleDeleteNotice((int)$_GET['id']);
}

// Default redirect
header("Location: ../view/admin-notice.php");
exit();
?>