<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="TLb0IXaJWk8C4xntucB6FtLuW-7g0FhM5o_sMMQOeYw" />
    <meta name="keywords" content="LMSAIT,lmsait,lms ait,LMS AIT">
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Digital Library</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            margin: 0;
            font-weight: lighter;
        }

        body {
            display: flex;
            flex-direction: column;
        }
        .top{
            display: flex;
            justify-content: space-between;
            background-color: #333;
        }
        .down{
            padding-top: 20px;
            font-size: 1.3rem;
            font-weight: lighter;
        }
        .wc{
            font-size: 2rem;
            margin: 10px;
            color: #fff;
        }
        .wrapper {
            flex: 1;
        }
        a{
            text-decoration: none;
            color: black;
        }
        #login{
            border: 2px solid black;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin: 10px;
            height: 40px;
        }
        #login:hover{
            text-decoration: underline;
        }
        .rect{
            display: flex;
            align-items: center;
            /* width: 3000px; */
            /* height: 400px; */
            background-color: white;
            /* box-shadow: inset -2px -2px 6px rgba(0,0,0,.5); */
            border-radius: 8%;
            justify-content: space-around;
            margin-top: 30px;
        }
        .sqr{
            border: 1px solid black;
            width: 300px;
            height: 180px;
            margin: 10px;
            text-align: center;
            border-radius: 10px;
            display: grid;
            background-color: #DADADA;
        }
        .up{
            padding-top: 15px;
            border-bottom: 1px solid black;
            font-size: 1.3rem;
        }
        .btn{
            font-size: 1.3rem;
            border: 1px solid black;
            border-radius: 5px;
            align-items: end;
            width: 80px;
            height: 35px;
            margin: auto;
            background-color: #93C6E7;
            padding-top: 4px;
        } 

        /* Navbar Container */
        .navbar-container {
            overflow-x: auto;
            white-space: nowrap;
            background-color: #333;
            font-size: 1.4rem;
        }

        /* Scrollable Navbar */
        .scrollable-navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .scrollable-navbar li {
            display: inline-block;
        }

        .scrollable-navbar li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .scrollable-navbar li a:hover {
            background-color: #333;
            color: #fff;
            text-decoration: underline;
        }

        /* Content */
        .content {
            padding: 20px;
            text-align: center;
        }
        /* ul li{
            display: inline-block;
            position: relative;
        } */

        ul li a{
            display: block;
            color: black;
            text-decoration: none;
            text-align: left;
        }
        ul li ul.dropdown li{
            display: block;
        }

        ul li ul.dropdown{
            position: absolute;
            display: none;
            z-index: 999;
        }

        ul li:hover ul.dropdown{
            display: block;
            border: 1px solid black;
            border-radius: 5px;
            background-color: #333;
            align-items: center;
            align-content: center;
            text-align: center;
        }

        footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        } 
    </style>
</head>
<body>
    <div class="top">
        <h2 class="wc">Welcome to Digital Library</h2>
        <a href="login.php" id="login" style="
        color: #fff; background-color: black;">Login</a>
    </div><hr style="color: #fff;">

    <div class="wrapper">
        <div class="navbar-container">
            <nav class="scrollable-navbar">
                <ul>
                    <li><a href="">Home</a></li>
                    <li>
                        <a href="displayusersu.php">Users</a>
                    </li>
                    <li>
                        <a href="displaycategoriesu.php">Category</a>
                    </li>
                    <li>
                        <a href="displaypublisheru.php">Publisher</a>
                    </li>
                </ul>
            </nav>
        </div><hr><br>
        
        <marquee behavior="" direction="" style="font-size: 1.3rem;"><i>Library Opnes at Morning 10:00 AM and closes at 8:00 PM | Facilities: E-books, Soft copies | NOTE: A Student can take Maximum 3 Books</i></marquee><br><br><hr>

        <!-- Content -->
        <div class="middle">
            <div class="rect">
                <div class="sqr">
                    <div class="up">Users</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from users";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displayusersu.php" class="btn">view</a>
                </div>

                <div class="sqr">
                    <div class="up">Categories</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from category";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaycategoriesu.php" class="btn">view</a>
                </div>
                
                <div class="sqr">
                    <div class="up">Authors</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from author";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displayauthorsu.php" class="btn">view</a>
                </div>
            </div>

            <div class="rect">
                <div class="sqr">
                    <div class="up">Books</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from book";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaybooksu.php" class="btn">view</a>
                </div>

                <div class="sqr">
                    <div class="up">Copies</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from copies";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaycopiesu.php" class="btn">view</a>
                </div>

                <div class="sqr">
                    <div class="up">Lending</div>
                    <div class="down">
                    <?php 
                        $query = "SELECT * from lending";
                        $query_run = mysqli_query($conn, $query);
                        
                        if($dept_total = mysqli_num_rows($query_run))
                        {
                            echo '<h4 class="mb-0">'.$dept_total.'</h4>';
                        }
                        else
                        {
                            echo '<h4 class="mb-0"> No Data </h4>';
                        }
                    ?>
                    </div>
                    <a href="displaylendingu.php" class="btn">view</a>
                </div>
            </div>
        </div>
    </div><br><br><hr>
    
    <footer style="text-align: center; font-size: 1.3rem;">
        Copyright &copy; Reserved by Digital Library <br> 
        Developed By: Abhishek
    </footer>
</body>
</html>
