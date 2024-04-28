<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Start the session to access session variables

$host = "localhost";
$user = "root";
$password = "";
$db = "studentInfo";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['reg'])) {
    $name = mysqli_real_escape_string($data, $_POST['name']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $class = mysqli_real_escape_string($data, $_POST['class']);
    $year = mysqli_real_escape_string($data, $_POST['year']);
    $department = mysqli_real_escape_string($data, $_POST['department']);
    $regno = mysqli_real_escape_string($data, $_POST['regno']);

    // Get the username from session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Check if the username already exists
    $checkQuery = "SELECT * FROM registor WHERE username = '$username'";
    $checkResult = mysqli_query($data, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already registered
        $message = "Username already registered";
        echo $_SESSION['signMessage'] = $message;
        header("location: registor_studen.php");
        exit();
    }

    // Insert new record if username doesn't exist
    $sql = "INSERT INTO registor (name, email, phone, class, year, department, registorID, username) 
            VALUES ('$name', '$email', '$phone', '$class', '$year', '$department', '$regno', '$username')";
            
    $result = mysqli_query($data, $sql);

    if ($result) {
        $message = "Sign up successful";
        $_SESSION['signMessage'] = $message;
        header("location: studenthome.php");
        exit(); // Make sure to exit after header redirect
    } else {
        $message = "Sign up unsuccessful";
        $_SESSION['signMessage'] = $message;
        header("location: registor_studen.php");
        exit(); // Make sure to exit after header redirect
    }
}

mysqli_close($data); //Close database connection
?>
