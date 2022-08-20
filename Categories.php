
<?php require_once("function.php") ?>

<?php
    session_start();
    include 'php/DB.php';
    Confirm_login();
    $success= false;
    if(isset($_POST["submit"]))
    {
        $category=$_POST["CategoryTitle"];
        $Admin=$_SESSION["username"];
        // date_default_timezone_set("Asia/Dhaka");
        //  $currentTime=Time();
        //  $DateTime=strftime("%H-%m-%Y %H:%M:%S",$currentTime);

        // if(empty($category)){
        //     $_SESSION["ErrorMessage"]="All fields must be filled out";
        //     // Redirect_to("Categories.php");
        //     header("location: Categories.php");
        // }
        // elseif(strlen($Category)<2)
        // {
        //     $_SESSION["ErrorMessage"]="Category must be grater than 2 characters";
        //     header("location: Categories.php");
        // }
        // elseif(strlen($Category)>49)
        // {
        //     $_SESSION["ErrorMessage"]="Category must be less than 49 characters";
        //     header("location: Categories.php");
        // }
       

       
        
           
            $sql="INSERT INTO category ( title, author) VALUES ( '$category', '$Admin')";
            
            $Execute = mysqli_query($connectingDB, $sql);

            if($Execute){
                //  $_SESSION["SuccesssMessage"]="Category Added ";
                // echo 'added';
                $success= true;

                // -- Redirect_to("categories.php");
            }
            else
            {
                // $_SESSION["ErrorMessage"]="Something is wrong";
                // Redirect_to("categories.php");
                echo 'fail';
            }


        
    }


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body class= vh-100 gradient-custom>
 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container"> 
        <a href="#" class="navbar-brand">CMS News </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link"><i class="fa-solid fa-user text-light"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="post.php" class="nav-link">DashBoard</a>
                </li>
              
                <li class="nav-item">
                    <a href="cate_list.php" class="nav-link ">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="manage_admin.php" class="nav-link ">Manage Admin</a>
                </li>
                
                <li class="nav-item">
                    <a href="blog.php?page=1" class="nav-link">Live Blog</a>
                </li>
            </ul>
            
        
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger"><i class="fa-solid fa-arrow-right-from-bracket text-light"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--  -->
<?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
     successfully added!
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>
<!-- header -->
<header class="bg-light text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><i class="fa-solid fa-pen-to-square"></i>Categories</h1>
            </div>
        </div>
    </div>
</header>

<!-- main part -->
<section class="container py-2 b-4 ">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            
            <form action="Categories.php"  method="POST">
                <div class="card-bg-secondary text-dark mb-3">
                    <div class="card-header">
                        <h1>Add New Category</h1> 
                    </div>
                    <div class="card-body bg-light">
                        <div class="form-group">
                            <label for="title">
                                <span class="fieldinfo">Category title</span>
                            </label>
                            <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type Title here" minlength="2" maxlength="49" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="post.php" class="btn btn-warning btn block"><i class="fa-solid fa-left"></i>Back to Dashboard</a>
                            </div>
                            <div class="col-lg-7 mb-2">
                                <button type="submit" name="submit" class="btn btn-success btn block"><i class="fa-solid fa-check"></i>Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>



</body>