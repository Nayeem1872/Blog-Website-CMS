

<?php
    include 'php/DB.php';
    $success= false;
    
       global $connectingDB;
       $id=$_GET['id'];
       $sql= "DELETE FROM category WHERE id='$id'";
       $Execute = mysqli_query($connectingDB, $sql);
           

            if($Execute){
                //   $_SESSION["SuccesssMessage"]="Category Added ";
                // echo 'added';
                $success= true;
                header("location:cate_list.php");
                

                // -- Redirect_to("categories.php");
            }
            else
            {
                // $_SESSION["ErrorMessage"]="Something is wrong";
                // Redirect_to("categories.php");
                echo 'fail';
            }


        
    


?>

