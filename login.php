
<?php include('connection.php'); ?>
<html>
    
    <head>
        <title>XerxesWap</title>
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>
        <div class="log">
           <h1 class="text-center ">Login Page</h1><br \><br \>
           <?php
              if(isset($_SESSION['login'])){
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
              }

              if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
               
           ?>
          <!--login form starts here-->
           <form action="#" method="POST" class="text-center login-des">
             Username:<br \>
             <input type="text" name="username" placeholder="Enter Username"><br \>
             Password:<br \>
             <input type="password" name="password" placeholder="Enter Password"><br \><br \>
             <input type="submit" name="submit" value="Login" class="btn-primary"><br \>
           </form>
           <!--login form ends here-->
           <br \><br \>
           <p class="text-center">Created By-<a href="www.xerxescodes.com">Mugasha Bradley</a></p>
        </div>
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM login WHERE email='$username' AND pass='$password'";
    $res = mysqli_query($con,$sql);
    
    if($res==TRUE){
        $rows = mysqli_num_rows($res);
        if($rows==1){
            $_SESSION['login']="<div class='success text-center'>Login Successful</div>";
            $_SESSION['user']=$username;
            header("location:".HOMEURL.'Musician/Admin.php');
        }else{
            $_SESSION['login']="<div class='error text-center'>Access Denied</div>";
            header("location:".HOMEURL.'login.php');
        }}
}

?>