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
    
    
    
     if(isset($_POST['searchbutton'])){
        
        if(isset($_POST['search'])){
        
            $_SESSION['search']=$_POST['search'];
             header("Location: blog_search.php");
        
         }
        
    }
    
    $query="SELECT * FROM `blog`";
    $result=mysqli_query($link, $query);
    while($row = mysqli_fetch_row($result)){
    
         if(isset($_POST['post'])){
        
            if(isset($_POST['newcomment'])){
            
                $comment_id=$_GET['id'];
                $username=$_SESSION['username'];
                $comment=$_POST['newcomment'];
                $query="INSERT INTO `comment`(`comment_id` , `username` , `comment`) VALUES ('$comment_id' , '$username' , '$comment')";
                $result=mysqli_query($link, $query);
        
         }
        
     }
     
    } 
    
    $status = "savepost";
    $query="SELECT * FROM `newblog` WHERE `status` = '$status' ";
    $result=mysqli_query($link, $query);
    
    
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
    <title>Homepage</title>
    
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
        
        .allblog{
            
            margin-left:240px;
            margin-tp:40px;
            
        }
        
        .eachblog{
            
            padding:10px;
           
            border:solid;
            border-radius:25px;
            width:1500px;
            
        }
        
        
    </style>
    
  </head>
  <body>
      
    <form method="post">
      
    <div class="logout">
        
         <p style="background-color: #8e0000; font-family: 'Pacifico', cursive; font-size: 80px; display: flex;justify-content: center; color: white; "> Shhtories </p>
        
    </div>
      
    <div class="sidenav container">
        <a href="blog_myaccount.php">My Account</a>
        <a href="blog_homepage.php">Homepage</a>
        <a href="blog_newblog.php">New Blog</a>
        <a href="blog_allblogs.php">All Blogs</a>
        <a href="index.php">Log Out</a>
    </div>
    
    <div class="container allblog">
    
    <form method="post" id="search">
  <div class="form-row">
    <div class="col-auto">
      <input type="text" class="form-control" name="search"  placeholder="Search by title">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn mb-2"  style="background-color:#8e0000; color: white;" name="searchbutton">Search</button>
    </div>
  </div>
</form>

    
        <?php 
        
            $status = "savepost";
            $query="SELECT * FROM `newblog` WHERE `status` = '$status' ";
            $result=mysqli_query($link, $query);
            while($row = mysqli_fetch_assoc($result)){
        
        ?>
        <div>
        <div class="eachblog" style="background-color:white;">
            
              <strong> <?php echo $row['username']; ?> </a></strong> <br>
              <h3> <strong> <?php echo $row['title']; ?> </strong></h3> <br>
               <?php echo $row['text']; ?>
            
            
        </div>
        
        <p>
    <!--    <form method="post">
  <div class="form-row">
    <div class="col-auto">
      <input type="text" class="form-control" name="newcomment"  placeholder="Add a comment...">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-link mb-2" name="post">Post</button>
      <a href="blog_homepage.php?id=<?php echo $row['id']; ?>" class="btn btn-success mb-2" name="post"> Post </a>
      <a href="blog_comment.php?id=<?php echo $row['id']; ?>" class="btn btn-link mb-2" name="comments"> View all comments </a>
      
      
    </div>
  </div>
</form>
</p>
        
        </div>
        <br> -->
        
        <?php } ?>
        
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