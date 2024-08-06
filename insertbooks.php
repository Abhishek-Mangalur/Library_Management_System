<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $bookid=$_POST['bookid'];
        $title=$_POST['title'];
        $pyear=$_POST['pyear'];
        $pname=$_POST['pname'];
        $cat=$_POST['cat'];
        $img=$_POST['img'];

        $check = "SELECT * FROM book WHERE title = '$title' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('Book Already Exists..!')</script>";
            echo "<script>window.open('insertbooks.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO book (bookid, title, pyear, pname, cat, img) VALUES('$bookid', '$title', '$pyear', '$pname', '$cat', '$img')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New Book Added..!')</script>";
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
    <title>Books</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertbooks.php" method="POST">
        <div class="div1">
            <label for="Name">Book Id</label><br>
            <input type="text" name="bookid" required><br>
            <label for="Name">Book Title</label><br>
            <input type="text" name="title" required><br>
            <label for="Name">Publisher Name</label><br>
            <select name="pname" id="opt">  
                <option>Select Options</option>
                <?php
                    $sql = "SELECT * FROM `publisher`";
                    $result = mysqli_query($conn ,$sql) or die("Query Failed");
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                    <option value="<?php echo  $row['pname']; ?>" >
                        <?php 
                            echo $row['pname'];
                        ?>
                    </option>

                <?php 
                    } 
                ?>
            </select>

            <label for="Name">Published Year</label><br>
            <input type="number" name="pyear" required><br>
            <label for="Name">Book Category</label><br>
            <select name="cat" id="opt">  
                <option>Select Options</option>
                <?php
                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($conn ,$sql) or die("Query Failed");
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                    <option value="<?php echo  $row['cat']; ?>" >
                        <?php 
                            echo $row['cat'];
                        ?>
                    </option>

                <?php 
                    } 
                ?>
            </select>

            <label for="Name">Select Image</label><br>
            <input type="file" name="img" required><br>

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