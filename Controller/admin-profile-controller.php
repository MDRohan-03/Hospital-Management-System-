<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Set flag that form was submitted
    $_SESSION['form_submitted'] = true;
    
    // Sanitize input
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    $flag = true;

    // Clear previous error messages
    $_SESSION['nameErrMsg'] = "";
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['phoneErrMsg'] = "";

    // --- Name Validation ---
    if (empty($name)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Please fill up the name properly.";
    } elseif (strlen($name) < 2) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Name must be at least 2 characters long.";
    } elseif (!preg_match("/^[a-zA-Z\s\-']+$/", $name)) {
        $flag = false;
        $_SESSION['nameErrMsg'] = "Name can only contain letters, spaces, hyphens, and apostrophes.";
    } else {
        $_SESSION['adminName'] = htmlspecialchars($name);
    }

    // --- Email Validation ---
    if (empty($email)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please fill up the email properly.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = false;
        $_SESSION['emailErrMsg'] = "Please enter a valid email address (e.g., name@domain.com).";
    } else {
        $_SESSION['adminEmail'] = htmlspecialchars($email);
    }

    // --- Phone Validation ---
    if (empty($phone)) {
        $flag = false;
        $_SESSION['phoneErrMsg'] = "Please fill up the phone properly.";
    } else {
        $digitsOnly = preg_replace('/\D/', '', $phone);
        if (strlen($digitsOnly) < 7) {
            $flag = false;
            $_SESSION['phoneErrMsg'] = "Phone number must contain at least 7 digits.";
        } elseif (strlen($digitsOnly) > 15) {
            $flag = false;
            $_SESSION['phoneErrMsg'] = "Phone number is too long (maximum 15 digits).";
        } elseif (!preg_match("/^[\d\s\+\-\(\)]+$/", $phone)) {
            $flag = false;
            $_SESSION['phoneErrMsg'] = "Phone number can only contain digits, spaces, +, -, (, and ).";
        } else {
            $_SESSION['adminPhone'] = htmlspecialchars($phone);
        }
    }

    // --- If all valid, update profile ---
    if ($flag) {
        require "../Model/User.php";

        try {
            $user = new User();
            $user->updateProfile($name, $email, $phone);
            $_SESSION['success'] = "Profile updated successfully.";
            $_SESSION['nameErrMsg'] = "";
            $_SESSION['emailErrMsg'] = "";
            $_SESSION['phoneErrMsg'] = "";
        } catch (Exception $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }
    }

    header("Location: ../View/admin/admin-edit-profile.php");
    exit();
}

// If not POST, redirect to profile page
header("Location: ../View/admin/admin-edit-profile.php");
exit();
?>