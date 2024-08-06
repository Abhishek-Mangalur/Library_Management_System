<?php
        include "connection.php";
        $query = "select * from book";
        $data = mysqli_query($conn,$query);
        $total = mysqli_num_rows($data);
        $row = $data;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Books</title>
    <link rel="stylesheet" href="displaystyle.css">
    <style>
    </style>
</head>

<body>
<table class="tbl" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" class="table1">Sl No</th>
                <th scope="col" class="table1">Image</th>
                <th scope="col" class="table1">Details</th>
            </tr>

            <?php 
            if($row){
                $i=1;
                while($row = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1' width='5%'>".$i++."</td>
                        <td class='c1' width='15%'><img src='pictures/".$row['img']."' alt='Image' width='100px' height='100px'></td>
                        <td class='c1'>
                        <p style='text-align: left';>
                            Bookid: ".$row['bookid']."<br>
                            Title: ".$row['title']."<br>
                            Published Year: ".$row['pyear']."<br>
                            Publisher Name: ".$row['pname']."<br>
                            Book Category: ".$row['cat']."
                        </p>
                        </td>
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
