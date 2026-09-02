<?php
 
session_start();

require_once __DIR__ . '/../model/User.php';
 
function validateUsername($username) {
    $username = trim($username);
    if (empty($username)) {
        return "Username is required.";
    }
    if (strlen($username) < 3) {
        return "Username must be at least 3 characters.";
    }
    return null;
}

function validateProfilePassword($password, $confirmPassword) {
    if (!empty($password)) {
        if (strlen($password) < 6) {
            return "Password must be at least 6 characters.";
        }
        if ($password !== $confirmPassword) {
            return "Passwords do not match.";
        }
    }
    return null;
}

function validateProfileData($data) {
    $errors = [];
    
    $usernameError = validateUsername($data['username'] ?? '');
    if ($usernameError) $errors[] = $usernameError;
    
    $passwordError = validateProfilePassword(
        $data['password'] ?? '',
        $data['confirm_password'] ?? ''
    );
    if ($passwordError) $errors[] = $passwordError;
    
    return $errors;
}

function handleUpdateProfile($postData) {
    $userModel = new User();
     
    $errors = validateProfileData($postData);
    
    if (empty($errors)) {
    
        $currentUsername = $_SESSION['username'] ?? '';
        $newUsername = $postData['username'];
        $password = $postData['password'] ?? '';
       
        if ($currentUsername !== $newUsername) {
            $userData = $userModel->getUserByUsername($newUsername);
            if ($userData && $userData['username'] !== $currentUsername) {
                $errors[] = "Username already taken. Please choose another.";
            }
        }
    }
    
    if (empty($errors)) {
        $result = $userModel->updateProfile(
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