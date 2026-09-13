<?php
session_start();
require '../model/adminModel.php';
 
if (isset($_GET['check_username'])) {
    $username = trim($_GET['check_username']);

    if (strlen($username) < 3) {
        echo "Username must be at least 3 characters.";
        exit();
    }

    $currentUsername = $_SESSION['username'] ?? '';
    if ($username === $currentUsername) {
        echo "This is your current username.";
        exit();
    }

    $userData = getUserByUsername($username);
    if ($userData) {
        echo "Username already taken.";
    } else {
        echo "Username is available!";
    }
    exit();
}

function validateProfileData($data) {
    $errors = [];
    
    $username = trim($data['username'] ?? '');
    if (empty($username) || strlen($username) < 3) {
        $errors['username'] = "Username must be at least 3 characters.";
    }
    
    $password = $data['password'] ?? '';
    $confirmPassword = $data['confirm_password'] ?? '';
    
    if (!empty($password)) {
        if (strlen($password) < 6) {
            $errors['password'] = "Password must be at least 6 characters.";
        }
        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = "Passwords do not match.";
        }
    }
    
    return $errors;
}

function handleUpdateProfile($postData) {
    $errors = validateProfileData($postData);
    $currentUsername = $_SESSION['username'] ?? '';
    $newUsername = $postData['username'];
    $password = $postData['password'] ?? '';
    
    if (empty($errors) && $currentUsername !== $newUsername) {
        $userData = getUserByUsername($newUsername);
        if ($userData && $userData['username'] !== $currentUsername) {
            $errors['username'] = "Username already taken. Please choose another.";
        }
    }
    
    if (empty($errors)) {
        if (updateProfile($currentUsername, $newUsername, $password)) {
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