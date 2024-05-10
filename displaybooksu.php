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
    <title>Books</title>
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
                <th scope="col" class="table1">Published Year</th>
                <th scope="col" class="table1">Category</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if($result){
                $i=1;
                while($row = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1'>".$i++."</td>
                        <td class='c1'><img src='pictures/".$row['img']."' alt='Image' width='100px' height='100px'></td>
                        <td class='c1'>".$row['title']."</td>
                        <td class='c1'>".$row['bookid']."</td>
                        <td class='c1'>".$row['pname']."</td>
                        <td class='c1'>".$row['pyear']."</td>
                        <td class='c1'>".$row['cat']."</td>
                    </tr>
                    ";
                }
            }else{
                echo "<tr><td colspan='7'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
