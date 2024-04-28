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
    $dance = mysqli_real_escape_string($data, $_POST['dance']);
    $music= mysqli_real_escape_string($data, $_POST['music']);
    $drama= mysqli_real_escape_string($data, $_POST['drama']);
    $acting= mysqli_real_escape_string($data, $_POST['acting']);
    $other = mysqli_real_escape_string($data, $_POST['Other']);
    $achievements = mysqli_real_escape_string($data, $_POST['Achievements']);
 

    // Get the username from session
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    // Check if the username already exists
    $checkQuery = "SELECT * FROM  arts WHERE username = '$username'";
    $checkResult = mysqli_query($data, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already registered
        $message = "Username already registered";
        echo $_SESSION['signMessage'] = $message;
        header("location: arts_activity.php");
        exit();
    }

    // Insert new record if username doesn't exist
    $sql = "INSERT INTO arts (username, dance, music, drama, acting, other, achievments) VALUES ('$username','$dance', '$music', '$drama', '$acting', '$other', '$achievements')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        $message = "Sign up successful";
        $_SESSION['signMessage'] = $message;
        header("location: studenthome.php");
        exit(); // Make sure to exit after header redirect
    } else {
        $message = "Sign up unsuccessful";
        $_SESSION['signMessage'] = $message;
        header("location: arts_activity.php");
        exit(); // Make sure to exit after header redirect
    }
}

mysqli_close($data); //Close database connection
?>
