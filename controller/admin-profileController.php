<?php
// controller/admin-profileController.php

session_start();

//require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/Validation.php';

function handleUpdateProfile($postData) {
    $validator = new Validation();
    
    // Validate data
    $errors = $validator->validateProfileData($postData);
    
    if (empty($errors)) {
        $user = new User();
        
        $result = $user->updateProfile(
            $_SESSION['username'],
            $postData['username'],
            $postData['password'] ?? ''
        );
        
        if ($result) {
            $_SESSION['username'] = $postData['username'];
            $_SESSION['profileSuccess'] = "Profile updated successfully.";
        } else {
            $_SESSION['profileError'] = "Failed to update profile.";
        }
    } else {
        $_SESSION['profileError'] = implode("\n", $errors);
    }
    
    header("Location: ../view/admin-edit-profile.php");
    exit();
}

// Router
if (isset($_POST['update_profile'])) {
    handleUpdateProfile($_POST);
}

// Default redirect
header("Location: ../view/admin-edit-profile.php");
exit();
?>