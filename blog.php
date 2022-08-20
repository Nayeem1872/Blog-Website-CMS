

<?php require_once("php/sessions.php") ?>
<?php require_once("php/DB.php") ?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blog Page</title>
	<script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> 
        <a href="#" class="navbar-brand">CMS News </a>
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
<!-- header -->
<div class="container">
    <div class="row mt-4">


        <div class="col-sm-8">
            <h1> CMS News </h1>
            <h1 class="lead">using PHP by Hasibul Islam</h1>
        </div>
        <div class="col-sm-4" style="min-height:40px;" background=green></div>

        <?php 
        global $connectingDB;
        if(isset($_GET["SearchButton"])){
            $Search= $_GET["Search"];
            $sql= "SELECT * FROM post WHERE title LIKE '%$Search%'";
            $result = mysqli_query($connectingDB, $sql);
            

        }



        else{    
        $sql = "SELECT * FROM post ORDER BY Id desc";
        $result = mysqli_query($connectingDB, $sql);
        }
        
        while($DataRows = mysqli_fetch_assoc ($result )){
            // $PostId=
            // $DateTime=
            // $Post
            $array[]=$DataRows;

        }
        
        
        if(!empty($array)){
            foreach($array as $i){
        
        
        
        ?>
        <div class="card" style="width:900px">
            <img src="image/<?php echo $i["image"];?>" style="width:900px" class="img-fluid card-img-top" >
            <div class="card-body">
                <h4 class="card-title"><?php echo $i["title"]; ?></h4>
                <small class="text-muted ">Written by<?php echo $i["author"]; ?>On <?php echo $i["datetime"]; ?></small>
                <!-- <span style="float:right;" class="badge badge-dark text-light">Comments 20</span> -->
                <hr>
                <p class="card-text text-truncate">
                    <?php echo $i["post"]; ?> </p>
                <a href="FullPost.php?id=<?php echo $i["Id"] ?>"style="float:right;">
                    <span class="btn btn-info">Read More >> </span>
            </a>

            </div>
        </div>
        




             



        <?php } } ?>
        
    </div>   




</div>
                





</body>
</html>