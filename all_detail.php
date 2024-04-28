<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "studentInfo";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Fetch all rows from the registor table
$registorQuery = "SELECT * FROM registor";
$registorResult = mysqli_query($data, $registorQuery);

// Fetch all rows from the arts table
$artsQuery = "SELECT * FROM arts";
$artsResult = mysqli_query($data, $artsQuery);

// Fetch all rows from the sports table
$sportsQuery = "SELECT * FROM sports";
$sportsResult = mysqli_query($data, $sportsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .containerr {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
</div>
    <div class="container">
        <div class="navbar">
        <button class="toggle-btn">Toggle Sidebar</button>
        <span class="admin-label">Admin Panel</span>

            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <div class="sidebar" id="sidebar">
            <a href="all_detail.php">View Students</a>
            <a href="search.php">Search Student</a>
           
        </div>
    <div class="containerr">
        <h1>Student Details</h1>

        <h2>Registor Table</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Class</th>
                <th>Year</th>
                <th>Department</th>
                <th>Reg No.</th>
                <th>Username</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($registorResult)) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['regno']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Arts Table</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Dance</th>
                <th>Music</th>
                <th>Drama</th>
                <th>Acting</th>
                <th>Other</th>
                <th>Achievements</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($artsResult)) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['dance']; ?></td>
                    <td><?php echo $row['music']; ?></td>
                    <td><?php echo $row['drama']; ?></td>
                    <td><?php echo $row['acting']; ?></td>
                    <td><?php echo $row['other']; ?></td>
                    <td><?php echo $row['achievements']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Sports Table</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Outdoor</th>
                <th>Indoor</th>
                <th>Athletic</th>
                <th>Throw Events</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($sportsResult)) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['outdoor']; ?></td>
                    <td><?php echo $row['indoor']; ?></td>
                    <td><?php echo $row['athletic']; ?></td>
                    <td><?php echo $row['throw_events']; ?></td>
                </tr>
            <?php } ?>
        </table>

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
