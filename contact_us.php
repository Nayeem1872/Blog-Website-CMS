
<?php require_once("function.php") ?>

<?php require_once("php/functions.php") ?>
<?php require_once("php/DB.php") ?>

<?php
    include 'php/DB.php';
    $success= false;
    $error= false;
    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        
        $email = $_POST["email"];
      
        $message = $_POST["message"];
      
       
            $sql="INSERT INTO contact_us ( name, email,   message) VALUES ( '$name', '$email',  '$message')";
            
            $Execute = mysqli_query($connectingDB, $sql);

            if($Execute){
                //  $_SESSION["SuccesssMessage"]="Category Added ";
                // echo 'added';
                $success= true;

                // -- Redirect_to("categories.php");
            }
            else
            {
                $error=true;
                
            }

            
           
            


        
    }


?>
























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container"> 
        <a href="#" class="navbar-brand">CMS Blog </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto ">
                
                <li class="nav-item">
                    <a href="blog.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about_us.php" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="wblog.php" class="nav-link ">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="contact_us.php" class="nav-link ">Contact Us</a>
                </li>
                
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline d-none d-sm-block" action="blog.php">
                    <div class="form-group">
                        <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
                        <button type="submit" class="btn btn-primary" name="SearchButton">Go</button>
                    </div>

                </form>




            </ul>
            
        
            
        </div>
    </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
    <!--Section: Contact v.2-->
<!-- Default form contact -->
<div class="container">
    <div class="row mt-5">
    <div class="container p-2 mt-4"><h1> CONTACT US: </h1></div>
<section class="container  p-4 mt-5">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
<form class="text-center border border-light p-5 bg-light text-dark" action="" method="POST">

    <p class="h4 mb-4"></p>

    <!-- Name -->
    <input type="text" id="defaultContactFormName" class="form-control mb-4" name="name" placeholder="Name">

    <!-- Email -->
    <input type="email" id="defaultContactFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

    <!-- Subject -->
    

    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" name="message" placeholder="Message"></textarea>
    </div>


    

    <!-- Send button -->
    <button class="btn btn-info btn-block" type="submit" name="submit">Send</button>

</form>
</div>
</div>
</section>
</div>
</div>
<!-- Default form contact -->>
<!--Section: Contact v.2-->
</body>
</html>