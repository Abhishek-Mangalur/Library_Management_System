<?php
    include "connection.php";
    $query = "select * from users";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    $result = $data;
    // session_start();
    // if(isset($_SESSION['uname']) && isset($_SESSION['pass']))
    // {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="displaystyle.css">
</head>

<body>
    <table class="tbl" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" class="table1">Sl No</th>
                <th scope="col" class="table1">User Name</th>
                <th scope="col" class="table1">Email</th>
                <th scope="col" class="table1">USN</th>
                <th scope="col" class="table1">Branch</th>
                <th scope="col" class="table1">Delete</th>
            </tr>

            <?php 
            if($result){
                $i=1;
                while($result = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1'>".$i++."</td>
                        <td class='c1'>".$result['uname']."</td>
                        <td class='c1'>".$result['umail']."</td>
                        <td class='c1'>".$result['usn']."</td>
                        <td class='c1'>".$result['branch']."</td>
                        <td class='c1'><a href='deleteusers.php?rn=$result[uname]' class='btn2' onclick='showPrompt()'>Delete</a></td>
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
            alert("User Deleted Successfully..!");
        }
    </script>
</body>
</html>

<?php
// } else{
//     header("Location: login.php");
//     exit();
// }
?>