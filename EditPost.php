
<?php require_once("function.php") ?>

<?php require_once("php/DB.php") ?>

<?php
    
    session_start();
    include 'php/DB.php';
    Confirm_login();
    $success= false;
    if(isset($_POST["submit"]))
    {
        global $connectingDB;
        $id=$_POST["id"];
        $PostTitle = $_POST["PostTitle"];
        $Category = $_POST["Category"];
        $Image    = $_FILES["Image"]["name"];
        $Target   = "image/".basename($_FILES["Image"]["name"]);
        $PostText = $_POST["PostDescription"];
        $Admin="Nayeem";
        
        $sql  = "UPDATE post SET title  ='$PostTitle', category='$Category', image='$Image',post='$PostText' WHERE Id=$id";
        $Execute1 = mysqli_query($connectingDB, $sql);
            move_uploaded_file($_FILES["Image"] ["tmp_name"],$Target);

            if($Execute1){
                //   $_SESSION["SuccesssMessage"]="Category Added ";
                // echo 'added';
                $success= true;
                // header(location:Post.php);

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
	<title>Edit Post</title>
	<script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container"> 
        <a href="#" class="navbar-brand">CMS News </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapseCMS">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item">
                    <a href="My profile.php" class="nav-link"><i class="fa-solid fa-user text-light"></i> My Profile</a>
                </li>
                <li class="nav-item">
                    <a href="post.php" class="nav-link">DashBoard</a>
                </li>
                <li class="nav-item">
                    <a href="posts.php" class="nav-link">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="catagories.php" class="nav-link ">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="manage_admin.php" class="nav-link ">Manage Admin</a>
                </li>
                <li class="nav-item">
                    <a href="comments.php" class="nav-link">Comments</a>
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
<?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
     Edited successfully!
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
                <h1><i class="fa-solid fa-pen-to-square"></i>EDIT POST</h1>
            </div>
        </div>
    </div>
</header>

<!-- main part -->
<section class="container py-2 b-4">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <?php

            
            global $connectingDB;
            $id=$_GET["id"];
            $sql= "SELECT * FROM post WHERE Id=$id";
            $Execute = mysqli_query($connectingDB, $sql);
            while($DataRows = mysqli_fetch_assoc ($Execute )){
                // $PostId=
                // $DateTime=
                // $Post
                $array[]=$DataRows;
    
           }
           foreach($array as $i){

            ?>
            <form class="" action=""  method="POST" enctype="multipart/form-data">
                <div class="card-bg-secondary text-dark mb-3">
                    
                    <div class="card-body bg-light">
                        <div class="form-group">
                            <label for="title">
                                <span class="fieldinfo">Post title:</span>
                            </label>
                            <input class="form-control" type="text" name="PostTitle" id="title" placeholder="Type Title here" minlength="2" maxlength="49" value="<?php echo $i["title"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <span class="FieldInfo">Existing Category:<br></span>
                            <?php echo $i["category"]; ?>
                            <label for="CategoryTitle">
                                
                            <span class="fieldinfo">
                                    Choose Categories:</span>
                            </label>
                           <select class="form-control" id="categoryTitle" name="Category">
                               <?php
                               include 'php/DB.php';
                               global $connectingDB;
                               $sql = "SELECT  p.Id,DATE(p.datetime) as datetime ,p.title,p.category,p.author,p.image,c.title AS catname FROM post p INNER JOIN category c ON p.category=c.id";
                                $sqlRun = mysqli_query($connectingDB,$sql);
                                 while ($row = mysqli_fetch_assoc($sqlRun)) {
                                    $id_no = $row['id'];
                                    $title_name = $row['title'];

                            //    $sql = "SELECT * FROM 'category'" ;
                            //    $stmt = $ConnectingDB->query($sql);
                            //    while ($DateRows = $stmt->fetch())
                            //    {
                            //        $Id=$DateRows["id"];
                            //        $CategoryName=$DateRows["title"];
                                    
                            //  
                                
                                ?>

                                <option value='<?php echo $id_no ?>' ><?php echo $title_name; ?></option>
                                <?php
                                }
                                ?>


                            </select>
                        </div>
                            <div class="form-group">
                            <span class="FieldInfo">Existing Image:</span>
                            <img class="mb-1" src="image/<?php echo $i["image"]; ?>" width="170px"; height="70px"; >
                            
                                <div class="custom-file">
                                    <input class="custom-file-input" type="File" name=Image id="imageSelect" value="">
                                    <label for="imageSelect" class="custom-file-label">Select Image</label>
                                </div>
                            </div> 
                            
    
                            <div class="form-group">
                            <label for="post">
                                <span class="fieldinfo">Post:</span>
                            </label>
                            <textarea class="form-control" id="post" name="PostDescription" rows="8" cols="80">
                                <?php echo $i["post"]; ?>
                            </textarea>       

                            </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="post.php" class="btn btn-warning btn block"><i class="fa-solid fa-left"></i>Back to Dashboard</a>
                            </div>
                            <div class="col-lg-7 mb-2">
                                <input type="hidden" name="id" value="<?php echo $i["Id"]; ?> ">
                                <button type="submit" name="submit" class="btn btn-success btn block"><i class="fa-solid fa-check"></i>Publish</button>
                            </div>
                            <div class="col-lg-7 mb-2">
                            <a href="FullPost.php?id=<?php echo $i["Id"] ?>"><span class="btn btn-primary">Preview</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>


</section>



</body>