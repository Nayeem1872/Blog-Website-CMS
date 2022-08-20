


<?php require_once("php/DB.php") ?>

<?php
// Session::checkLogin();
session_start();
 $success= false;
if (isset($_POST["submit"])){
    global $ConnectingDB;
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $sql="SELECT * FROM admin WHERE username LIKE '$Username' AND password LIKE '$Password'";
    $Execute = mysqli_query($connectingDB, $sql);
    if(mysqli_num_rows($Execute)>0)
    {
        $success=true;

        $_SESSION['username']= $Username;
        header('Location:post.php');
   
        
    }
}else{
//   $faculty = new Faculty();


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 	$Username = $_POST['Username'];
// 	$Password = md5($_POST['password']);
 
// 	  $message = $faculty->facultyLogin($Username, $Password);

// // echo "HELLO";
// }

}




?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script src="https://kit.fontawesome.com/7ccd1e194b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
	<!--navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
		<div class="container">
			<a href="#" class="navbar-brand text-light">CMS Blog </a>
			
		</div>
	</nav>
  <?php
    if($success)
    {
       
       ?>
       <div class="alert alert-success" role="alert">
     successfully added!<?php echo $_SESSION["username"]; ?>
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>
	<div style="height=10px; background=27aae1;"></div>

    <section class="vh-100 gradient-custom">
      <form action="" method="POST">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typeEmailX">Username</label>
                <input type="text" id="username" name="Username" class="form-control form-control-lg" required />
               
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="password" name="Password" class="form-control form-control-lg"required />
               
              </div>

              

              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>

              

            </div>

            

          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</section>



























	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>
</html>

