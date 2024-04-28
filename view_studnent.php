<?php
session_start();

// Check if the user is not logged in or is not an admin, redirect to login page
if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location: login.php");
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "studentInfo";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Fetch student details based on username from registor table
$username = $_SESSION['username'];
$sql = "SELECT * FROM registor WHERE username = '$username'";
$result = mysqli_query($data, $sql);
// Fetch arts details based on username from 'arts' table
$sqlArts = "SELECT * FROM arts WHERE username = '$username'";
$resultArts = mysqli_query($data, $sqlArts);

// Fetch sports details based on username from 'sports' table
$sqlSports = "SELECT * FROM sports WHERE username = '$username'";
$resultSports = mysqli_query($data, $sqlSports);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Panel</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="username-display">
    <?php
    session_start(); // Start the session to access session variables

    // Check if the session variable exists and echo the username
    if (isset($_SESSION['username'])) {
      echo 'Logged in as: ' . $_SESSION['username'];
    }
    ?>
  </div>
    <div class="container">
        <div class="navbar">
        <button class="toggle-btn">Toggle Sidebar</button>
        <span class="admin-label">student Panel</span>

            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    
        <div class="sidebar" id="sidebar">

            <a href="registor_studen.php">registor</a>
            <a href="view_studnet.php">View Student deatils</a>
            <a href="arts_activity.php">Add Arts skill</a>
            <a href="sports_activity.php">Add Sports skill</a>
        </div> 

        <div class="content">
            <!-- Display student details in a table -->
            <h2>Student Details</h2>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Class</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th>Registration Number</th>
                </tr>
                <?php
                // Loop through the fetched student details and display them in rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['class'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['regno'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
             <!-- Display arts details from 'arts' table -->
        <h2>Arts Details</h2>
        <table border="1">
            <tr>
                <th>Dance</th>
                <th>Music</th>
                <th>Drama</th>
                <th>Acting</th>
                <th>other</th>
                <th>Achievements</th>
                
            </tr>
            <?php
            // Loop through the fetched arts details and display them in rows
            while ($rowArts = mysqli_fetch_assoc($resultArts)) {
                echo "<tr>";
                echo "<td>" . $rowArts['dance'] . "</td>";
                echo "<td>" . $rowArts['music'] . "</td>";
                echo "<td>" . $rowArts['drama'] . "</td>";
                echo "<td>" . $rowArts['acting'] . "</td>";
                echo "<td>" . $rowArts['other'] . "</td>";
                echo "<td>" . $rowArts['achievments'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <!-- Display sports details from 'sports' table -->
        <h2>Sports Details</h2>
        <table border="1">
            <tr>
                <th>Outdoor</th>
                <th>Indoor</th>
                <th>Atheletic</th>
                <th>Throw events</th>
                <th>Achievements</th>
            </tr>
            <?php
            // Loop through the fetched sports details and display them in rows
            while ($rowSports = mysqli_fetch_assoc($resultSports)) {
                echo "<tr>";
                echo "<td>" . $rowSports['outdoor'] . "</td>";
                echo "<td>" . $rowSports['indoor'] . "</td>";
                echo "<td>" . $rowSports['atheletic'] . "</td>";
                echo "<td>" . $rowSports['throw_events'] . "</td>";
                echo "<td>" . $rowSports['achievements'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.getElementById("sidebar");
    
            toggleBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });
        });
    </script>
</body>
</html>