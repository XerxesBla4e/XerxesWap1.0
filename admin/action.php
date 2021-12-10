<?php
 include 'includes/autoloader.inc.php';

 session_start();
 $insert = new Userscontroller();
 $con = new Connection();
 $conn = $con->connect();
 $update = false;

 $id = "";
 $photo="";
 $name ="";
 $email = "";
 $phone = "";


 if(isset($_POST['add'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
   
     $photo = $_FILES['image']['name'];
     $upload = "admin_profiles/".$photo;

     $insert -> createAdmin($name,$email,$phone,$upload);
     $success = move_uploaded_file($_FILES['image']['tmp_name'],$upload);
     
     $to = $success?"Admin.php":"dashboard.php" ;
     header("Location:".$to);

     $_SESSION['response'] = "Successfully inserted Admin Record";
     $_SESSION['res_type'] = "success"; 
 }

 if(isset($_GET['delete'])){
     $id = $_GET['delete'];
     
     global $conn;
     
     $sql = "SELECT photo FROM Admin WHERE id=$id";
     $stmt1 = $conn->query($sql);
     foreach($stmt1 as $row){
        $image_url = $row['photo'];
    }
     $path = unlink($image_url);


     $query = "DELETE FROM Admin WHERE id=$id";
     $stmt = $conn->query($query);
     $scs = $stmt?"Admin.php":"dashboard.php" ;
     header("Location:".$scs);
     $_SESSION['response'] = "Successfully Deleted Admin Record";
     $_SESSION['res_type'] = "danger"; 

 }

 if(isset($_GET['edit'])){
     global $conn;
     $id = $_GET['edit'];
     $query = "SELECT * FROM Admin WHERE id=$id";
     $stmt1 = $conn->query($query);
     foreach($stmt1 as $row){
        $id = $row['id'];
        $photo = $row['photo'];
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];

        $update = true;
    }
 }

 if(isset($_POST['update'])){
     global $conn;
     $id = $_POST['id'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $old_image = $_POST['oldimage'];

     if(isset( $_FILES['image']['name'])&&($_FILES['image']['name'])!= ""){
        $new_img ="admin_profiles/".$_FILES['image']['name'];
            unlink($old_image);
            move_uploaded_file($_FILES['image']['tmp_name'],$new_img);
     }else{
        $new_img =  $old_image ;
     }

     $query = "UPDATE Admin SET name='$name',email='$email',phone='$phone',photo='$new_img' WHERE id=$id";
     $stmt = $conn->query($query);
     $scs = $stmt?"Admin.php":"dashboard.php" ;
     header("Location:".$scs);
     $_SESSION['response'] = "Successfully Updated Admin Record";
     $_SESSION['res_type'] = "primary";

 }

 if(isset($_GET['details'])){
    global $conn;
     $id = $_GET['details'];

     $query = "SELECT * FROM Admin WHERE id=$id";
     $stmt1 = $conn->query($query);
     foreach($stmt1 as $row){
        $vid = $row['id'];
        $vphoto = $row['photo'];
        $vname = $row['name'];
        $vemail = $row['email'];
        $vphone = $row['phone'];

 }
}
?>