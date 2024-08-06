<?php
include "connection.php";
session_start();

// Define session timeout (in seconds)
$session_timeout = 180; // 3 minutes

// Check if session has expired
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_timeout) {
    session_unset();     // Unset all session variables
    session_destroy();   // Destroy the session
    header("Location: login.php"); // Redirect to login page
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time(); 

// Regenerate session ID to prevent session fixation
if (!isset($_SESSION['session_regenerated']) || $_SESSION['session_regenerated'] !== true) {
    session_regenerate_id(true);
    $_SESSION['session_regenerated'] = true;
}

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: login.php"); // Redirect to login page if not authenticated
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="website icon" type="png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2N49mgVGM4hkBJclxFJaWrHTLokFcbPCqOQ&s">
    <title>Admin Home</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Times New Roman', Times, serif;
            font-weight: 500;
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
        #logout{
            border: 2px solid black;
            padding: 4px 10px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin: 10px;
            height: 40px;
            color: whitesmoke;
            background-color: black;
        }
        #logout:hover{
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
        .button{
            font-size: 1.3rem;
            border: 1px solid black;
            border-radius: 5px;
            align-items: end;
            width: 80px;
            height: 35px;
            margin: auto;
            background-color: #93C6E7;
        }
        footer{
            background-color: #f1f1f1;
            text-align: center;
            padding: 10px;
        }
        .dropdown-menu{
            background-color: #333;
        }
        .dropdown-item{
            color: whitesmoke;
        }
    </style>
</head>
<body class="m-0 border-0 m-0 border-0">

    <!-- Example Code -->
    <div class="top">
        <h2 class="wc">Admin Page</h2>
        <a href="logout.php" id="logout">Logout</a>
    </div><hr style="color: #fff; margin: 0">
        
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 0;">
        <div class="container-fluid" style="padding: 0;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #333; height: 3.5rem;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="font-size: 1.4rem; color: whitesmoke;">Home</a>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Users
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertusers.php">Add User</a></li>
                            <li><a class="dropdown-item" href="displayusers.php">Delete User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Category
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertcategories.php">Add Category</a></li>
                            <li><a class="dropdown-item" href="displaycategories.php">Delete Category</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Publisher
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertpublisher.php">Add Publisher</a></li>
                            <li><a class="dropdown-item" href="displaypublisher.php">Delete Publisher</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Author
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertauthors.php">Add Author</a></li>
                            <li><a class="dropdown-item" href="displayauthors.php">Delete Author</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Book
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertbooks.php">Add Book</a></li>
                            <li><a class="dropdown-item" href="displaybooks.php">Delete Book</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Copies
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertcopies.php">Add Copies</a></li>
                            <li><a class="dropdown-item" href="displaycopies.php">Delete Copies</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" style="font-size: 1.4rem;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" style="color: whitesmoke;">
                            Lending
                        </a>
                        <ul class="dropdown-menu" data-bs-popper="static">
                            <li><a class="dropdown-item" href="insertlending.php">Add Lending</a></li>
                            <li><a class="dropdown-item" href="displaylending.php">Delete Lending</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <hr style="margin: 0;"><marquee behavior="" direction="" style="font-size: 1.3rem; padding: 10px 0 5px;"><i>Library Opens at Morning 10:00 AM and closes at 8:00 PM | Facilities: E-books, Soft copies | NOTE: A Student can take Maximum 3 Books</i></marquee><hr style="margin: 0;">

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
                    <a href="displayusersu.php" class="button">view</a>
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
                    <a href="displaycategoriesu.php" class="button">view</a>
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
                    <a href="displayauthorsu.php" class="button">view</a>
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
                    <a href="displaybooksu.php" class="button">view</a>
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
                    <a href="displaycopiesu.php" class="button">view</a>
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
                    <a href="displaylendingu.php" class="button">view</a>
                </div>
            </div>
        </div>
    </div><br><br><hr style="margin: 0;">

    <footer style="text-align: center; font-size: 1.3rem;">
        Copyright &copy; Reserved by Digital Library <br> 
        Developed By: Abhishek
    </footer>

</body>
</html>