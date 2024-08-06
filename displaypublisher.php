<?php
    include "connection.php";
    $query = "select * from publisher";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    $result = $data;
    session_start();
    if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Publisher</title>
    <link rel="stylesheet" href="displaystyle.css">
</head>

<body>
    <table class="tbl" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" class="table1">Sl No</th>
                <th scope="col" class="table1">Publisher Name</th>
                <th scope="col" class="table1">Phone No.</th>
                <th scope="col" class="table1">Address</th>
                <th scope="col" class="table1">Delete</th>
            </tr>

            <?php 
            if($result){
                $i=1;
                while($result = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1'>".$i++."</td>
                        <td class='c1'>".$result['pname']."</td>
                        <td class='c1'>".$result['phone']."</td>
                        <td class='c1'>".$result['addr']."</td>
                        <td class='c1'><a href='deletepublisher.php?rn=$result[pname]' class='btn2' onclick='showPrompt()'>Delete</a></td>
                    </tr>
                    ";
                }
            }else{
                echo "No data found";
            }
            ?>
        </thead>
    </table>

    <script>
        function showPrompt(){
            alert("Publisher Deleted Successfully..!");
        }
    </script>
</body>
</html>

<?php
} else{
    header("Location: login.php");
    exit();
}
?>