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
    // Escape and validate input
    $outdoor = isset($_POST['outdoor']) ? mysqli_real_escape_string($data, $_POST['outdoor']) : '';
    $indoor = isset($_POST['indoor']) ? mysqli_real_escape_string($data, $_POST['indoor']) : '';
    $atheletic = isset($_POST['Atheletic']) ? mysqli_real_escape_string($data, $_POST['Atheletic']) : '';
    $throw = isset($_POST['throw']) ? mysqli_real_escape_string($data, $_POST['throw']) : '';

    // Get the username from session
    $username = isset($_SESSION['username']) ? mysqli_real_escape_string($data, $_SESSION['username']) : '';

    // Check if the username already exists
    $checkQuery = "SELECT * FROM sports WHERE username = '$username'";
    $checkResult = mysqli_query($data, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already registered
        $message = "Username already registered";
        $_SESSION['signM    essage'] = $message;
        header("location: sports_activity.php");
        exit();
    }

    // Insert new record if username doesn't exist
    $sql = "INSERT INTO sports (username, outdoor, indoor, atheletic, throw_events) 
            VALUES ('$username', '$outdoor', '$indoor', '$atheletic', '$throw')";
            
    $result = mysqli_query($data, $sql);

    if ($result) {
        $message = "Sign up successful";
        $_SESSION['signMessage'] = $message;
        header("location: studenthome.php");
        exit(); // Make sure to exit after header redirect
    } else {
        $message = "Sign up unsuccessful";
        $_SESSION['signMessage'] = $message;
        header("location: sports_activity.php");
        exit(); // Make sure to exit after header redirect
    }
}
