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

    $sql1 = "INSERT INTO  registration (username, email,password) VALUES ('$username', '$email', '$password')";
    $result1 = mysqli_query($data, $sql1);

    $sql2 = "INSERT INTO user (username, email,usertype,password) VALUES ('$username', '$email', 'student','$password')";
    $result2 = mysqli_query($data, $sql2);

    if ($result1&& $result2)
     {
        $message ="sign up succesfull";
                     echo $_SESSION['signMessage']= $message;

                      header("location:index.php");
    }
     else {
        $message ="sign up unsuccesfull";
       echo $_SESSION['signMessage']= $message;

        header("location:index.php");
    }
}
?>