<?php
session_start();
require '../model/adminModel.php';

function validateProfileData($data) {
    $errors = [];
    
    $username = trim($data['username'] ?? '');
    if (empty($username) || strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters.";
    }
    
    $password = $data['password'] ?? '';
    $confirmPassword = $data['confirm_password'] ?? '';
    
    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters.";
        }
        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
        }
    }
    
    return $errors;
}

function handleUpdateProfile($postData) {
    $errors = validateProfileData($postData);
    
    if (empty($errors)) {
        $currentUsername = $_SESSION['username'] ?? '';
        $newUsername = $postData['username'];
        $password = $postData['password'] ?? '';
       
        if ($currentUsername !== $newUsername) {
            $userData = getUserByUsername($newUsername);
            if ($userData && $userData['username'] !== $currentUsername) {
                $errors[] = "Username already taken. Please choose another.";
            }
        }
    }
    
    if (empty($errors)) {
        $result = updateProfile(
            $currentUsername,
            $newUsername,
            $password
        );
        
        if ($result) {
            $_SESSION['username'] = $newUsername;
            $_SESSION['profileSuccess'] = "Profile updated successfully!";
        } else {
            $_SESSION['profileError'] = "Failed to update profile. Please try again.";
        }
    } else {
        $_SESSION['profileError'] = implode("\n", $errors);
    }
    
    header("Location: ../view/admin-edit-profile.php");
    exit();
}
 
if (isset($_POST['update_profile'])) {
    handleUpdateProfile($_POST);
} else {
    header("Location: ../view/admin-edit-profile.php");
    exit();
}
?>