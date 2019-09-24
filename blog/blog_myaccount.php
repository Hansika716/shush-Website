<?php
session_start();

if(!isset($_SESSION['username'])){
    
     header("Location: index.php");
    
}

     $link = mysqli_connect("localhost","id8383301_login","login","id8383301_login");
        
         if(mysqli_connect_error()){
           
             die("Database connection error");
             
         }
         
        


    if(isset($_POST['logout'])){
        
        header("Location: index.php");
        
    }
    
    $username = $_SESSION['username'];
    //echo $username;
    
    $query = "SELECT * FROM `blog` WHERE username = '$username'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
   
    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet"> 
    <title>My Account</title>
    
    <style>
    html{
        background-color:#c62828;
    }
    
    body{
        
        background:none;
    }
        
        .logout{
            
            margin-top:0px;
            background-color:brown;
            
            
        }
        
        .sidenav {
              margin-top:120px;
              height: 100%; /* Full-height: remove this if you want "auto" height */
              width: 220px; /* Set the width of the sidebar */
              position: fixed; /* Fixed Sidebar (stay in place on scroll) */
              z-index: 1; /* Stay on top */
              top: 0; /* Stay at the top */
              left: 0;
              background-color: #111; /* Black */
              overflow-x: hidden; /* Disable horizontal scroll */
              padding-top: 20px;
}

/* The navigation menu links */
        .sidenav a {
              padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
        }

/* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
              color: #f1f1f1;
        }
        
        .mainpage{
            
            margin-left:230px;
            
        }
        
        p{
            
            font-size:20px;
            
        }
        
        
    </style>
    
  </head>
  <body>
      
    <form method="post">
      
    <div class="logout">
        
         <p style="background-color: #8e0000; font-family: 'Pacifico', cursive; font-size: 80px; display: flex;justify-content: center; color: white;"> Shush </p>
        
    </div>
      
    <div class="sidenav container">
        <a href="blog_myaccount.php">My Account</a>
        <a href="blog_homepage.php">Homepage</a>
        <a href="blog_newblog.php">New Blog</a>
        <a href="blog_allblogs.php">All Blogs</a>
        <a href="index.php">Log Out</a>
    </div>
    
    <div class="mainpage">
        
        <h1>MY ACCOUNT</h1>
        <br>
        <p><strong>Username:</strong> <?php echo $row['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>
       
        
        <a href="blog_edit.php" class="btn "  style="background-color:#8e0000; color: white;">Edit Profile</a>
        
        
    </div>
    
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>