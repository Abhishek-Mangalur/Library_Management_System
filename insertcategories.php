<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $cat=$_POST['cat'];

        $check = "SELECT * FROM category WHERE cat = '$cat' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('Book Category Already Exists..!')</script>";
            echo "<script>window.open('insertcategories.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO category (cat) VALUES('$cat')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New Category Added..!')</script>";
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
    <title>Categories</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertcategories.php" method="POST">
        <div class="div1">
            <label for="Name">Book Category</label><br>
            <input type="text" name="cat" required><br>

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