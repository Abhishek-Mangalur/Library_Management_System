<?php
    $conn = mysqli_connect("localhost", "root", "", "lms");

    if(!$conn){
        echo "connection failed!";
    }
?>