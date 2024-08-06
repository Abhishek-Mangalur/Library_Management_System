<?php
    session_start();
    include "connection.php";

    if(isset($_POST['uname']) && isset($_POST['pass'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['pass']);

        $sql = "SELECT * FROM admins WHERE uname='$uname' AND pass='$pass' ";
        $sql2 = "SELECT * FROM users WHERE uname='$uname' AND pass='$pass' ";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $username = strtolower($uname);

            if($row['uname'] === $username && $row['pass'] === $pass){
                $_SESSION['uname'] = $row['uname'];
                $_SESSION['pass'] = $row['pass'];
                header("Location: adminhome.php");
            }
        }elseif(mysqli_num_rows($result2) === 1){
            $row2 = mysqli_fetch_assoc($result2);
            $username = strtolower($uname);
            $lower = $row2['uname'];
            $username2 = strtolower($lower);

            if($username2 === $username && $row2['pass'] === $pass){
                $_SESSION['uname'] = $row2['uname'];
                $_SESSION['pass'] = $row2['pass'];
                header("Location: userhome.php");
            }
        }else{
            echo "<script>alert('Wrong Username or Password..!')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
?>