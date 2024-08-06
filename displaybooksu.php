<?php
    include "connection.php";
    $query = "select * from book";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    $result = $data;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Users</title>
    <link rel="stylesheet" href="displaystyle.css">
</head>

<body>
    <table class="tbl" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" class="table1">Sl No</th>
                <th scope="col" class="table1">Image</th>
                <th scope="col" class="table1">Title</th>
                <th scope="col" class="table1">Book Id</th>
                <th scope="col" class="table1">Publisher Name</th>
                <th scope="col" class="table1">Publisher Year</th>
                <th scope="col" class="table1">Category</th>
            </tr>

            <?php 
            if($result){
                $i=1;
                while($result = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1'>".$i++."</td>
                        <td class='c1'><img src='pictures/".$result['img']."' alt='Image' width='100px' height='100px'></td>
                        <td class='c1'>".$result['title']."</td>
                        <td class='c1'>".$result['bookid']."</td>
                        <td class='c1'>".$result['pname']."</td>
                        <td class='c1'>".$result['pyear']."</td>
                        <td class='c1'>".$result['cat']."</td>
                    </tr>
                    ";
                }
            }else{
                echo "No data found";
            }
            ?>
        </thead>
    </table>
</body>
</html>
