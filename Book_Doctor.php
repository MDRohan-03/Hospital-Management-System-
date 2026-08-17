
<!DOCTYPE html>
<html>
<head>
    <title>Browse Approved Doctors</title>
         <link rel ="stylesheet" href="design.css">
</head>

<body>
     <?php
      include "nav.php"?>
<fieldset>
    <h1 id="text">Browse Approved Doctors</h1>

    <form>
        <input type="text" placeholder="Search name or specialization">

        <select>
            <option>All Specializations</option>
            <option>Cardiology</option>
            <option>Dentistry</option>
        </select>

        <br><br>

        <input type="number" placeholder="Min Fee">
        <input type="number" placeholder="Max Fee">

        <br><br>

        <select>
            <option>Any Day</option>
            <option>Sunday</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
        </select>

        <button type="submit">Search</button>
    </form>

    <br>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Specialization</th>
            <th>Experience</th>
            <th>Fee</th>
            <th>Rating</th>
            <th>Action</th>
        </tr>

        <tr>
            <td>Dr. Karim</td>
            <td>Dentistry</td>
            <td>5 years</td>
            <td>600.00</td>
            <td>0</td>
            <td>
                <a href="#">Details</a>
                &nbsp;
                <a href="#">Book</a>
            </td>
        </tr>
    </table>
</fieldset>
</body>
</html>
