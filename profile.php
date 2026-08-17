<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
</head>
<body>
    <?php
include "nav.php"

?>
<div style="width: 500px; margin: 20px auto; padding: 20px; border: 1px solid black; border-radius: 10px;">

<h2 style="text-align:center;color:blue">Doctor's Profile</h2>

<form method="post" action="">

    <label for="name">Name:</label>
    <input type="text" name="name" id="name"
           placeholder="Rakibul Hasan Joboraz">
    <br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email"
           placeholder="joboraz@gmail.com">
    <br><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone"
           placeholder="0187284290">
    <br><br>

    <label for="specialization">Specialization:</label>
    <input type="text" name="specialization" id="specialization"
           placeholder="medicine">
     
      
    <br><br>

    <label for="license_number">Medical License Number:</label>
    <input type="text" name="license_number" id="license_number"
           placeholder="DOC-1001">
    <br><br>

    <label for="experienceyears">Years of Experience:</label>
    <input type="number" name="experienceyears" id="experienceyears"
           min="0" placeholder="5">
    <br><br>

    <label for="consultationfee">Consultation Fee:</label>
    <input type="number" name="consultationfee" id="consultationfee"
           min="0"  placeholder="800">
    <br><br>

    <label for="bio">Professional Bio:</label><br>
    <textarea name="bio" id="bio" rows="5" cols="50"
              placeholder=" Describe your experience and expertise"></textarea>
    <br><br>

    <label for="userprofile">Profile Photo:</label>
    <input type="file" name="userprofile" id="userprofile">
    <br><br>

    <div style="text-align: center;">
       <input style="text-align: center;color:blue" type="submit" value="Update Profile">
    </div>

</form>


</div>

</body>
</html>