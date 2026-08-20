<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
     header("Location: login.php");
     exit();
}

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $doctor_name = trim($_POST["doctor_name"] ?? "");
     $email = trim($_POST["email"] ?? "");
     $password = trim($_POST["password"] ?? "");
     $phone = trim($_POST["phone"] ?? "");
     $specialization = trim($_POST["specialization"] ?? "");
     $fee = trim($_POST["fee"] ?? "");
     $bio = trim($_POST["bio"] ?? "");


     if (empty($doctor_name)) {
           $message = "Doctor name is required.";
          $messageType = "error";
     } elseif (!preg_match("/^[a-zA-Z ]+$/", $doctor_name)) {
         $message = "Doctor name can contain letters and spaces only.";
         $messageType = "error";
     } elseif (empty($email)) {
         $message = "Email is required.";
         $messageType = "error";
     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $message = "Please enter a valid email.";
         $messageType = "error";
     } elseif (strlen($password) < 6) {
         $message = "Password must be at least 6 characters.";
         $messageType = "error";
     } elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
         $message = "Phone number must contain exactly 11 digits.";
         $messageType = "error";
     } elseif (empty($specialization)) {
         $message = "Please select a specialization.";
         $messageType = "error";
     } elseif (empty($fee) || $fee <= 0) {
         $message = "Please enter a valid consultation fee.";
         $messageType = "error";

     } else {

         $message = "Doctor added successfully!";
         $messageType = "success";

         $doctor_name = "";
         $email = "";
         $password = "";
         $phone = "";
         $specialization = "";
         $fee = "";
         $bio = "";
     }
}
?>

<!DOCTYPE html>
<html>
     <head>
         <title>Add Doctor</title>
         <style>
             * {
                  margin: 0;
                 padding: 0;
                 box-sizing: border-box;
                 font-family: Arial, sans-serif;
             }

             body {
                  background-color: #f4f7fb;
                 color: #333;
             }

            .sidebar {
                  position: fixed;
                 left: 0;
                 top: 0;
                  width: 240px;
                 height: 100vh;
                 background-color: #245941;
                  color: white;
                 padding: 25px 15px;
             }
             .sidebar h2 {
                 text-align: center;
                 margin-bottom: 35px;
             }

             .sidebar a {
                  display: block;
                 color: white;
                 text-decoration: none;
                 padding: 14px 15px;
                 margin: 8px 0;
                 border-radius: 6px;
             }
             .sidebar a:hover,
             .sidebar a.active {
                 background-color: #6da788;
             }

             .board {
                  margin-left: 240px;
                 padding: 25px;
             }
             .topbar {
                 background-color: rgb(128, 180, 154);
                  padding: 20px;
                 border-radius: 10px;
                  margin-bottom: 25px;
             }
             .topbar h1 {
                 color: #0b3f2d;
                 margin-bottom: 8px;
             }
             .table {
                  background-color: white;
                 padding: 25px;
                 border-radius: 10px;
                  margin-bottom: 30px;
                  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
             }

             .table h2 {
                     color: #0b473a;
                      margin-bottom: 20px;
             }

             label {
                  display: block;
                 margin-bottom: 7px;
                 font-weight: bold;
             }

             input, select, textarea {
                 width: 100%;
                 padding: 10px;
                 border: 1px solid #ccc;
                 border-radius: 5px;
                 margin-bottom: 15px;
             }

             textarea {
                  resize: vertical;
             }

             .btn {
                  background-color: #0f4a42;
                  color: white;
                 border: none;
                 padding: 11px 20px;
                 border-radius: 5px;
                 cursor: pointer;
                  font-size: 14px;
             }

             .btn:hover {
                 background-color: #245941;
             }

             .message {
                 padding: 12px;
                 margin-bottom: 20px;
                 border-radius: 5px;
             }

             .error {
                 background-color: #f8d7da;
                 color: #721c24;
             }

             .success {
                 background-color: #d4edda;
                 color: #155724;
             }

        </style>
     </head>
     <body>
         <!-- Sidebar -->
         <div class="sidebar">
              <h2>Admin Panel</h2>
             <a href="admin_dashboard.php"> Dashboard </a>
             <a href="admin-add-doctor.php" class="active">  Add Doctor </a>
             <a href="admin-managePatients.php"> Manage Patients </a>
             <a href="admin-edit-profile.php"> Edit Profile  </a>
             <a href="admin-announcement.php">   Announcement </a>
             <a href="logout.php">  Logout </a>

         </div>


         <!-- Main -->

         <div class="board">
             <div class="topbar">
                 <h1>Hospital Management System</h1>
                 <p>Add a new doctor</p>
             </div>
             <div class="table">
                 <h2>Doctor Information</h2>
                 <?php if ($message != "") { ?>
                 <div class="message <?php echo $messageType; ?>">
                      <?php echo htmlspecialchars($message); ?>
                 </div>

                 <?php } ?>
                <form  method="POST"  onsubmit="return validateDoctorForm();"   >
                     <label>Doctor Name</label>
                     <input type="text" id="doctor_name" name="doctor_name"  value="<?php echo htmlspecialchars($doctor_name ?? ''); ?>"  placeholder="Enter doctor name" >
                    
                     <label>Email</label>
                     <input  type="email" id="email"  name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>"  placeholder="Enter email"  >

                     <label>Password</label>
                     <input  type="password"  id="password"  name="password"  placeholder="Enter password"  >

                     <label>Phone Number</label>
                     <input  type="tel"  id="phone"   name="phone"  value="<?php echo htmlspecialchars($phone ?? ''); ?>"   placeholder="Enter phone number" >
  
                     <label>Specialization</label>
                     <select id="specialization" name="specialization">
                         <option value="">  Select Specialization</option>
                         <option value="cardiology"> Cardiology </option>
                         <option value="neurology">  Neurology </option>
                         <option value="dermatology">  Dermatology </option>
                         <option value="orthopedics"> Orthopedics  </option>
                         <option value="pediatrics">   Pediatrics </option>
                         <option value="gynecology">   Gynecology  </option>
                         <option value="general">    General Medicine   </option>
                     </select>

                     <label>Consultation Fee</label>
                     <input type="number"  id="fee"  name="fee"   value="<?php echo htmlspecialchars($fee ?? ''); ?>" placeholder="Enter consultation fee" >

                     <label>Doctor Bio</label>
                     <textarea  id="bio"  name="bio"  rows="5"  placeholder="Write something about the doctor..."   >
                        <?php echo htmlspecialchars($bio ?? ''); ?></textarea>


                     <button type="submit" class="btn"> Add Doctor </button>

                </form>

            </div>

        </div>

         <script>

         function validateDoctorForm() {

             let name = document.getElementById("doctor_name").value.trim();
             let email = document.getElementById("email").value.trim();
             let password = document.getElementById("password").value;
             let phone = document.getElementById("phone").value.trim();
             let specialization = document.getElementById("specialization").value;
             let fee = document.getElementById("fee").value;

         if (name === "") {
             alert("Doctor name is required.");
             return false;
         }
         if (!/^[a-zA-Z ]+$/.test(name)) {
             alert("Doctor name can contain letters and spaces only.");
             return false;
         }

         if (email === "") {
             alert("Email is required.");
             return false;
         }

         if (password.length < 6) {
             alert("Password must be at least 6 characters.");
             return false;
         }

         if (!/^[0-9]{11}$/.test(phone)) {
             alert("Phone number must contain exactly 11 digits.");
             return false;
         }


         if (specialization === "") {
             alert("Please select a specialization.");
              return false;
          }

         if (fee === "" || Number(fee) <= 0) {
             alert("Please enter a valid consultation fee.");
             return false;
         }
         return true;
         }

        </script>

    </body>
</html>