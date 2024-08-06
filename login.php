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
            echo "<script>window.open('login.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO users(uname, umail, usn, branch, pass) VALUES('$uname', '$umail', '$usn', '$branch', '$pass')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('Registration Successful You may login now..!')</script>";
                echo "<script>window.open('login.php','_self')</script>";
            }else{
                echo "error".mysqli_error($conn);
            }
            mysqli_close($conn);
        }else{
            echo "<script>alert('Wrong Username or Password..!')</script>";
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Login</title>
    <script src="script.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #f1f1f1;
        }
        .main{
            display: grid;
            place-items: center;
            height: 100%;
            width: 100%;
            position: absolute;
        }
        .form-box{
            width: 380px;
            height: 480px;
            margin: 4% auto;
            position: relative;
            background-color: #e8f0fe;
            padding: 5px;
            overflow: hidden;
            border: 1px solid black;
            border-radius: 10px;
        }
        .button-box{
            width: 220px;
            margin: 35px auto;
            position: relative;
            box-shadow: 0 0 20px 9px;
            border-radius: 30px;
        }
        .toggle-btn{
            padding: 10px 30px;
            cursor: pointer;
            background: transparent;
            border: 0;
            outline: none;
            position: relative;
        }
        #btn{
            top: 0;
            left: 0;
            position: absolute;
            width: 110px;
            height: 100%;
            background-color: #A67B5B;
            border-radius: 30px;
            transition: .5s;
        }
        .input-group{
            top: 100px;
            position: absolute;
            width: 280px;
            transition: .5s;
        }
        .input-field{
            width: 100%;
            padding: 10px 0;
            margin: 5px 0;
            border-top: 0;
            border-right: 0;
            border-left: 0;
            border-bottom: 1px  solid grey;
            outline: none;
            background: transparent;
            color: black;
            font-size: 1.1rem;
            padding-left: 5px;
        }
        .submit-btn{
            width: 100%;
            padding: 10px 30px;
            cursor: pointer;
            display: block;
            margin: auto;
            border: 0;
            outline: none;
            background-color: #A67B5B;
            margin-top: 30px;
            border-radius: 20px;
        }
        #login{
            left: 50px;
        }
        #register{
            left: 450px;
        }
        ::placeholder{
            color: black;
            font-size: 1.1rem;
            background: transparent;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn"  onclick="login()">Login</button>
                <button type="button" class="toggle-btn"  onclick="register()">&nbsp;&nbsp;&nbsp;Register</button>
            </div>
            <form id="login" class="input-group" action="adminlogin.php" method="POST">
                <input type="text" class="input-field" name="uname" placeholder="Username" style="margin-top: 90px;" required>
                <input type="password" class="input-field" name="pass" placeholder="Password" required>
                <button type="submit" class="submit-btn">Login</button>
            </form>
            <form id="register" class="input-group" action="login.php" method="POST">
                <input type="text" class="input-field" name="uname" placeholder="Username" required>
                <input type="email" class="input-field" name="umail" placeholder="Email" required>
                <input type="text" class="input-field" name="usn" placeholder="USN" required>
                <input type="text" class="input-field" name="branch" placeholder="Branch" required>
                <input type="password" class="input-field" name="pass" placeholder="Password" required>

                <button type="submit" name="submit" value="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <script>
        var x  = document.getElementById("login");
        var y  = document.getElementById("register");
        var z  = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
    </script>
</body>
</html>