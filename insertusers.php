<?php
    include "connection.php";
    // session_start();
    // if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    // {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $uname=$_POST['uname'];
        $umail=$_POST['umail'];
        $usn=$_POST['usn'];
        $branch=$_POST['branch'];
        $pass=$_POST['pass'];

        $check = "SELECT * FROM users WHERE uname = '$uname' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('User Already Exists..!')</script>";
            echo "<script>window.open('insertusers.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO users(uname, umail, usn, branch, pass) VALUES('$uname', '$umail', '$usn', '$branch', '$pass')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New User Added..!')</script>";
                echo "<script>window.open('adminhome.php','_self')</script>";
            }else{
                echo "error".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertusers.php" method="POST">
        <div class="div1">
            <label for="Name">User Name</label><br>
            <input type="text" name="uname" required><br>
            <label for="Name">Email</label><br>
            <input type="email" name="umail" required><br>
            <label for="Name">USN</label><br>
            <input type="text" name="usn" required><br>
            <label for="Name">Branch</label><br>
            <input type="text" name="branch" required><br>
            <label for="Name">Password</label><br>
            <input type="password" name="pass" required><br>

            <button type="submit" name="submit" value="submit" id="i1">Submit</button>
        </div>
    </form>
</body>
</html>

<?php
// } else{
//     header("Location: login.php");
//     exit();
// }
?>