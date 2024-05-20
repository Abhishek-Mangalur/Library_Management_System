<?php
    include "connection.php";
    $query = "select * from lending";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    $result = $data;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Lending</title>
    <link rel="stylesheet" href="displaystyle.css">
</head>

<body>
    <table class="tbl" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th scope="col" class="table1">Sl No</th>
                <th scope="col" class="table1">Date Out</th>
                <th scope="col" class="table1">Due Date</th>
                <th scope="col" class="table1">Book Name</th>
                <th scope="col" class="table1">Author Name</th>
            </tr>

            <?php 
            if($result){
                $i=1;
                while($result = mysqli_fetch_assoc($data)){
                    echo "
                    <tr>
                        <td class='c1'>".$i++."</td>
                        <td class='c1'>".$result['dout']."</td>
                        <td class='c1'>".$result['ddate']."</td>
                        <td class='c1'>".$result['title']."</td>
                        <td class='c1'>".$result['aname']."</td>
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
