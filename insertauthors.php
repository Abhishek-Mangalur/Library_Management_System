<?php
    include "connection.php";
    // session_start();
    // if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    // {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $aname=$_POST['aname'];
        $title=$_POST['title'];

        $check = "SELECT * FROM author WHERE aname = '$aname' ";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0){
            echo "<script>alert('Author Already Exists..!')</script>";
            echo "<script>window.open('insertauthors.php','_self')</script>";
        }else if(mysqli_num_rows($result) == 0){
            $sql="INSERT INTO author (aname, title) VALUES('$aname', '$title')";
            if(mysqli_query($conn, $sql)){
                echo "<script>alert('New Author Added..!')</script>";
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
    <title>Authors</title>
    <link rel="stylesheet" href="insertstyle.css">
</head>

<body>
    <form action="insertauthors.php" method="POST">
        <div class="div1">
            <label for="Name">Author Name</label><br>
            <input type="text" name="aname" required><br>
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
// } else{
//     header("Location: login.php");
//     exit();
// }
?>