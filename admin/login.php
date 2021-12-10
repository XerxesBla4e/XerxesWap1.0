<?php include 'includes/autoloader.inc.php'; ?>
<?php include("../config/constants.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/adminstyle.css">
    <script src="../js/seepass.js"> </script>
    <title>Document</title>
    <?php
          if(isset($_SESSION['message'] )){
            echo $_SESSION['message'];
            unset ($_SESSION['message'] );
          }
      ?>
    <main>
    <div id="container">
      <form action="" method="post">
         
          <input type="text" name="Email" id="email" placeholder="Email">
          <input type="password" name="Password" id="password" placeholder="Password">
          
          <span><label for="show" class="text"> Show Password</label>
          <input type="checkbox"  onclick="toggle()"  id="show1">
          <input type="submit" name="submit" value="Login">
          <span><a href="<?php echo HOMEURL;?>admin/password_reset">Forgot Password?</a></span>
      </form>
    </div>
   </main>
   </body>
     
</html>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $error = "";

      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      if(empty($_POST['Email'])){
        $error.='Please enter email';
      }elseif(!filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL)){
        $error.='Please enter valid email';
      }
      
      if(empty($error)){

        $email =    $_POST["Email"];
        $password = md5($_POST["Password"]);
    
        if(!empty($email) && !empty($password)){
          $adminUser = new Usersview();
          $adminUser->retrieveUsers($email,$password);
            }
      }
      }

?>