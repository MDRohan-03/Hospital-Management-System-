<?php
// controller/Validation.php

class Validation {
    
    public function validateDoctorData($data) {
        $errors = [];
        
        // Name validation
        if (empty($data['name'])) {
            $errors[] = "Please enter the doctor's full name.";
        } elseif (strlen($data['name']) < 3) {
            $errors[] = "Name must be at least 3 characters long.";
        }
        
        // Email validation
        if (empty($data['email'])) {
            $errors[] = "Please enter the doctor's email address.";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        }
        
        // Phone validation
        if (empty($data['phone'])) {
            $errors[] = "Please enter the doctor's phone number.";
        } elseif (!preg_match('/^[0-9+\-\s]{10,15}$/', $data['phone'])) {
            $errors[] = "Please enter a valid phone number.";
        }
        
        // Specialization validation
        if (empty($data['specialization'])) {
            $errors[] = "Please select the doctor's specialization.";
        }
        
        // Password validation
        if (empty($data['password'])) {
            $errors[] = "Please enter a password.";
        } elseif (strlen($data['password']) < 6) {
            $errors[] = "Password must be at least 6 characters.";
        }
        
        return $errors;
    }
    
    public function validateNoticeData($data) {
        $errors = [];
        
        // Title validation
        if (empty($data['title'])) {
            $errors[] = "Please enter a notice title.";
        } elseif (strlen($data['title']) < 5) {
            $errors[] = "Title must be at least 5 characters long.";
        }
        
        // Description validation
        if (empty($data['description'])) {
            $errors[] = "Please enter notice description.";
        } elseif (strlen($data['description']) < 10) {
            $errors[] = "Description must be at least 10 characters long.";
        }
        
        return $errors;
    }
    
    public function validateProfileData($data) {
        $errors = [];
        
        // Username validation
        if (empty($data['username'])) {
            $errors[] = "Username is required.";
        } elseif (strlen($data['username']) < 3) {
            $errors[] = "Username must be at least 3 characters.";
        }
        
        // Password validation (only if provided)
        if (!empty($data['password'])) {
            if (strlen($data['password']) < 6) {
                $errors[] = "Password must be at least 6 characters.";
            }
            if ($data['password'] !== $data['confirm_password']) {
                $errors[] = "Passwords do not match.";
            }
        }
        
        return $errors;
    }
}
?>