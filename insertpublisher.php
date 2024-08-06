<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $pname=$_POST['pname'];
        $phone=$_POST['phone'];
        $addr=$_POST['addr'];

        $check = "SELECT * FROM publisher WHERE pname = '$pname' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('Publisher Already Exists..!')</script>";
            echo "<script>window.open('insertpublisher.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO publisher(pname, phone, addr) VALUES('$pname', '$phone', '$addr')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New Publisher Added..!')</script>";
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
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Publisher</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertpublisher.php" method="POST">
        <div class="div1">
            <label for="Name">Publisher Name</label><br>
            <input type="text" name="pname" required><br>
            <label for="Name">Phone No.</label><br>
            <input type="number" name="phone" required><br>
            <label for="Name">Address</label><br>
            <input type="text" name="addr" required><br>

            <button type="submit" name="submit" value="submit" id="i1">Submit</button>
        </div>
    </form>
</body>
</html>

<?php
} else{
    header("Location: login.php");
    exit();
}
?>