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

        $sql = "SELECT * FROM users WHERE uname='$uname' AND pass='$pass' ";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['uname'] === "admin" && $row['pass'] === "12345"){
                header("Location: adminhome.php");
                exit();
            }else{
                if($row['uname'] === $uname && $row['pass'] === $pass){
                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['umail'] = $row['umail'];
                    $_SESSION['pass'] = $row['pass'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: userhome.php");
                    exit();
                }
            }
        }else{
            echo "<script>alert('Wrong Username or Password..!')</script>";
            header("Location: index.php");
            exit();
        }
    }
?>