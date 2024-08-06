<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $copi=$_POST['copi'];
        $title=$_POST['title'];

        $check = "SELECT * FROM copies WHERE title = '$title' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('This Copies Already Exists..!')</script>";
            echo "<script>window.open('insertcopies.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO copies(copi, title) VALUES('$copi', '$title')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New Book Copies Added..!')</script>";
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
    <title>Copies</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertcopies.php" method="POST">
        <div class="div1">
            <label for="Name">No. of Copies</label><br>
            <input type="number" name="copi" required><br>
            <label for="Name">Book Title</label><br>
            <select name="title" id="opt">  
                <option>Select Options</option>
                <?php
                    $sql = "SELECT * FROM `book`";
                    $result = mysqli_query($conn ,$sql) or die("Query Failed");
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                    <option value="<?php echo  $row['title']; ?>" >
                        <?php 
                            echo $row['title'];
                        ?>
                    </option>

                <?php 
                    } 
                ?>
            </select>

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