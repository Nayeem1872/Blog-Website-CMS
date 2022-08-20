


<?php require_once("php/DB.php") ?>
 

<?php
    include 'php/DB.php';
     error_reporting(0);
    $success= false;
    if(isset($_POST["submit"]))
    {
        $Name=$_POST["CommenterName"];
        $Email=$_POST["CommenterEmail"];
        $Comment=$_POST["CommenterThoughts"];
        $post_id=$_POST["postId"];

        // $Admin="Nayeem";
        
       

       
        
           
            $sql="INSERT INTO comments ( post_id, name, email, comment) VALUES ( '$post_id', '$Name', '$Email', '$Comment')";
            
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
	<title>Blog Page</title>
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
                    <a href="#" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link ">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="contact_us.php" class="nav-link ">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">Feature</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <form class="form-inline d-none d-sm-block" action="blog.php">
                    <div class="form-group">
                        <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
                        <button type="button" class="btn btn-primary" name="SearchButton">Go</button>
                    </div>

                </form>




            </ul>
            
        
            
        </div>
    </div>
</nav>
<?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
     Comment successfully added!
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>
    <div style="height:10px; background:#27aae1;"></div>
<!-- header -->
<div class="container">
    <div class="row mt-4">


        <div class="col-sm-8">
            <h1>Resposive CMS News </h1>
            <h1 class="lead">using PHP by Hasibul Islam</h1>
        </div>
        <div class="col-sm-4" style="min-height:40px;" background=green></div>

        <?php 
        global $connectingDB;
         $i=$_GET["id"];
         $sql = "SELECT * FROM post WHERE Id=$i";
    
        $result = mysqli_query($connectingDB, $sql);
        while($DataRows = mysqli_fetch_assoc ($result )){
            // $PostId=
            // $DateTime=
            // $Post
            $array[]=$DataRows;

        }
        
        
        foreach($array as $i){
        // $sql = "SELECT * FROM post WHERE $i=['Id']";
        
        
        
        ?>
        <div class="card">
            <img src="image/<?php echo $i["image"];?>" style="max-height:450px;" class="img-fluid card-img-top" >
            <div class="card-body">
                <h4 class="card-title"><?php echo $i["title"]; ?></h4>
                <small class="text-muted ">Written by<?php echo $i["author"]; ?>On <?php echo $i["datetime"]; ?></small>
                <span style="float:right;" class="badge badge-dark text-light">Comments 20</span>
                <hr>
                <p class="card-text">
                    <?php echo $i["post"]; ?> </p>
                

            </div>
        </div>
        
        <?php } ?>
        <div class="">
            <form class="" action="" method="POST">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="FieldInfo">Share Your Thoughts About this Post:</h5>
                </div>
                <div class="card-body ">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                        <input type="text" class="form-control" name="CommenterName" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>

                        <input type="email" class="form-control" name="CommenterEmail" placeholder="Email"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="CommenterThoughts" class="form-control" id="" cols="100" rows="10" required></textarea>
                    </div>
                    <input type="hidden" id="" name="postId" value="<?php echo $_GET['id']?>">
                    <div class="">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>


                    
                </div>
            </div>
            </form>
            <b>Comments:</b>
            <div class="jumbotron">
            <?php
                $post_id=$_GET["id"];
               
                $sql = "SELECT * FROM comments WHERE post_id=$post_id";
                $Execute = mysqli_query($connectingDB, $sql); 
                if(mysqli_num_rows($Execute)>0){
                    while($row = mysqli_fetch_assoc($Execute)){
                        $array[]=$row;
                    }
                    

                    
                    foreach($array as $i){
                ?>
               
                <h4><?php echo $i['name']; ?></h4>
                <a href="" class=""><?php echo $i['email']; ?></a>
                 
                <p><?php echo $i['comment']; ?></p>
                <hr class="my-4">
                <?php
                  }
                
                }
                
               
               ?>
               
            </div>
        </div>
        
    </div>
       




</div>





</body>