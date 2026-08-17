<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Profile</title>
       <link rel ="stylesheet" href="design.css">
</head>
<body>
 <?php
include "nav.php"

?>
  <div class="container" >
    
    <!--  Profile Section -->
    <fieldset>
    <legend><h2 id="text">Manage Profile</h2></legend>
    <form class="form-section">
      <input type="text" class="input-field" value="Patient User"><br><br>
      <input type="email" class="input-field" value="patient@hospital.com"><br><br>
      <input type="tel" class="input-field" value="01000000002"><br><br>
      <input type="date" class="input-field" value="2001-01-15"><br><br>
      <input type="text" class="input-field" value="B+"><br><br>
      
      <select class="input-field">
        <option value="male" selected>Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select><br><br>
      
      <textarea class="input-field textarea-field">Dhaka</textarea><br><br>
      
      <input type="text" class="input-field" value="Father"><br><br>
      <input type="tel" class="input-field" value="01911111111"><br><br>
      
      <div class="file-group">
        <label class="file-label">Profile Picture:</label>
        <input type="file">
      </div><br><br>
      
      <button type="submit">Update Profile</button>
    </form>
    </fieldset>

    <!-- Change Pass -->
    <fieldset>
    <legend><h2 id="text">Change Password</h2></legend>
    <form class="form-section">
      <input type="password" class="input-field" placeholder="Old Password"><br><br>
      <input type="password" class="input-field" placeholder="New Password"><br><br>
      <button type="submit" >Change Password</button><br><br>
    </form>
    </fieldset>

  </div>

</body>
</html>