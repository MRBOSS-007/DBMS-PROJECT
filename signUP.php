<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "studentInfo";

$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, email, usertype,password) VALUES ('$username', '$email','student', '$password')";
    $result = mysqli_query($data, $sql);
    if ($result)
     {
        $message ="sign up succesfull";
                      $_SESSION['signMessage']= $message;

                      header("location:index.php");
    }
     else {
        $message ="sign up unsuccesfull";
        $_SESSION['signMessage']= $message;

        header("location:index.php");
    }
}
?>