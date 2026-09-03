<?php
class Validation {   
    public function validateNoticeData($data) {
        $errors = [];
         
        if (empty($data['title'])) {
            $errors[] = "Please enter a notice title.";
        } elseif (strlen($data['title']) < 5) {
            $errors[] = "Title must be at least 5 characters long.";
        }
         
        if (empty($data['description'])) {
            $errors[] = "Please enter notice description.";
        } elseif (strlen($data['description']) < 10) {
            $errors[] = "Description must be at least 10 characters long.";
        }
        
        return $errors;
    }
    
   
}
?>