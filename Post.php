<?php require_once("function.php") ?>
<?php require_once("php/functions.php") ?>
<?php require_once("php/DB.php") ?>
<?php
 session_start();
 Confirm_login();
 $success= false;
 $Username = $_SESSION['username'];
    
        $success= true;
    

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DashBoard</title>
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
<?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
     Welcome!<?php echo $_SESSION["username"]; ?>
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>
<header class="bg-light text-dark py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-2">
                <h1><i class="fas fa-blog"></i>Blog News</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="AddNewPost.php" class="btn btn-primary btn-block">
                    <i class="fas fa-edit"></i>Add New Post
                </a>    

            </div>
            <div class="col-lg-3 mb-2">
                <a href="Categories.php" class="btn btn-info btn-block">
                    <i class="fas fa-folder-plus"></i>Add New Category
                </a>    

            </div>
            <div class="col-lg-3 mb-2">
                <a href="Admin.php" class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus"></i>Add New Admin
                </a>    

            </div>
            
        </div>
    </div>
</header>
<!-- main area -->
<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date&Time</th>
                    <th scope="col">Author</th>
                    <!-- <th scope="col">Comments</th> -->
                    <th scope="col">Action</th>
                    <th scope="col">Live Preview</th>
                </tr>
                </thead>
                <?php
                global $connectingDB;
 
                $sql = "SELECT p.Id,DATE(p.datetime) as datetime ,p.title,p.category,p.author,p.image,c.title AS catname FROM post p INNER JOIN category c ON p.category=c.id";
                $result = mysqli_query($connectingDB, $sql);
                while($DataRows = mysqli_fetch_assoc ($result ))
                {


                    $array[]=$DataRows;
                   
                }
                if(!empty($array)){
                foreach($array as $i){
                ?>
                <tbody>
                
                <tr>
                    
                    <td><?php echo $i["Id"]; ?></td>

                    <td class="table-primary"><?php echo $i["title"]; ?></td>
                    <td><?php echo $i["catname"]; ?></td>
                    <td><?php echo $i["datetime"]; ?></td>
                    <td><?php echo $i["author"]; ?></td>
                    
                  
                    <!-- <td><Comment</td> -->
                    <td><a href="EditPost.php?id=<?php echo $i["Id"] ?>"><span class="btn btn-warning">Edit</span></a>
                    <!-- <form action="DeletePost.php" method="post">
                    <input type="hidden" name="id" value=">"> -->
                   <!-- <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                    </form> --> 
                    <a href="DeletePost.php?id=<?php echo $i["Id"] ?>"><span class="btn btn-danger">delete</span></a>
                </td>
                    <td><a href="FullPost.php?id=<?php echo $i["Id"] ?>"><span class="btn btn-primary">Preview</span></a></td>
                    

                </tr>
                </tbody>
            <?php } } ?>
            

            </table>
        </div>

    </div>


</section>

</body>