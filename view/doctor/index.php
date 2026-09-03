
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  
</head>
<body>
    <?php
include "docNav.php"

?>

  <h2>Welcome , <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></h2>  
  <p>
Total requested patients : 6682 
  </p>
</body>
</html>