<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype']=="student") {
    header("location:login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "studentInfo";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Fetch student details based on search query
if (isset($_POST['search'])) {
    $searchQuery = mysqli_real_escape_string($data, $_POST['search']);
    
    echo $earchQuery;
    // Search in both name and username fields
    $sql = "SELECT * FROM registor WHERE name LIKE '%$searchQuery%' OR username LIKE '%$searchQuery%'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        // Display search results
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Username</th><th>Email</th><th>Phone</th><th>Class</th><th>Year</th><th>Department</th><th>Registration Number</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['class'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['registorID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}

mysqli_close($data);
?>
