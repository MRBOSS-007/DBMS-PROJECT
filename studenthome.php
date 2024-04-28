<?php

session_start();

    if (!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    else if ($_SESSION['usertype']=="admin")
    {
        header("location:login.php");
    }
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
            <a href="view_studnent.php">View Student deatils</a>
            <a href="arts_activity.php">Add Arts skill</a>
            <a href="sports_activity.php">Add Sports skill</a>
        </div>      
    
        <div class="content">
            <!-- Your main content here -->
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