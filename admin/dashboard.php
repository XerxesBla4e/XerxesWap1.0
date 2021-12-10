<?php  include("partials/menu.php"); ?>

<?php
if(isset($_SESSION['user']))
{
    $user =  $_SESSION['user'];
    $s = explode("@",$user);
    echo "Welcome"." ".$s[0];
   
 
}
?>

 <div class="dashboard">
   <div class="container">
   <div class="dash1">
               0
            <h1>Movies</h1>
        </div>

        <div class="dash1">
               0
            <h1>Movies</h1>
        </div>

        <div class="dash1">
               0
            <h1>Movies</h1>
        </div>

        <div class="dash1">
               0
            <h1>Movies</h1>
        </div>
   </div>
   <div class="clearfix"></div>
</div>
   
       
       
  