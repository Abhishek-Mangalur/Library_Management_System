<?php
    include "connection.php";
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<?php
    include "connection.php";
    if(isset($_POST['submit'])){
        $dout=$_POST['dout'];
        $ddate=$_POST['ddate'];
        $aname=$_POST['aname'];
        $title=$_POST['title'];

        $sql="INSERT INTO lending(dout, ddate, aname, title) VALUES('$dout', '$ddate', '$aname', '$title')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('New Lending Added..!')</script>";
            echo "<script>window.open('adminhome.php','_self')</script>";
        }else{
            echo "error".mysqli_error($conn);
        }
        mysqli_close($conn);
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
    <form action="insertlending.php" method="POST">
        <div class="div1">
            <label for="Name">Date Out</label><br>
            <input type="date" name="dout" required><br>
            <label for="Name">Due Date</label><br>
            <input type="date" name="ddate" required><br>
            <label for="Name">Author Name</label><br>
            <select name="aname" id="opt">  
                <option>Select Options</option>
                <?php
                    $sql = "SELECT * FROM `author`";
                    $result = mysqli_query($conn ,$sql) or die("Query Failed");
                    while($row = mysqli_fetch_assoc($result)){
                ?>

                    <option value="<?php echo  $row['aname']; ?>" >
                        <?php 
                            echo $row['aname'];
                        ?>
                    </option>

                <?php 
                    } 
                ?>
            </select>
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