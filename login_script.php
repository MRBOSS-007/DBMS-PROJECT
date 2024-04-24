    <?php

session_start();
        $host="localhost";
        $user ="root";
        $password="";
        $db="studentInfo";

        $data =mysqli_connect($host, $user, $password, $db);

        if ($data==false)
        {
            die("connection error");
        }

            if ($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                if (empty($username) || empty($password)) {
                    echo "Please enter both username and password.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "SELECT * FROM user WHERE username='$username'";
                    $result = mysqli_query($data, $sql);

                    $row= mysqli_fetch_array($result);

                    if ($row["usertype"]=="student")
                    {
                        $_SESSION['username']=$username;
                        $_SESSION['usertype']=  "student";

                        header("location:studenthome.php");
                    }
                    else if ($row["usertype"]=="admin")
                    {
                        $_SESSION['username']=$username;
                        $_SESSION['usertype']="admin";
                        header("location:adminhome.php");
                    }
                    else {
                       
                      $message ="username and password does not match";
                      $_SESSION['loginMessage']= $message;

                      header("location:login.php");
                    }
                }
            }
    ?> 