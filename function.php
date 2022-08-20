<?php 
 $success= false;
function Confirm_login(){
    if(isset($_SESSION["username"])){
        return true;
    }
    else
    $success= true;
    header("location:login.php");
}
?>
<?php
    if($success)
    {
       
       ?>
       <div class="alert alert-danger" role="alert">
     Login Required; ?>
    </div>
       <?php
       
        
    }
    else{
        echo '';
    }
?>
