<?php
include('../connection.php');

 $update = false;

 $key = $_SESSION['user'];
 $s = explode("@",$key);
 
 $id = "";
 $photo="";
 $title ="";
 $price = "";
 $downloads = "";
 $total = "";
 $songn ="";


 if(isset($_POST['add'])){
     $id = $s[0].rand(000,999);
     $title = $_POST['title'];
     $price = $_POST['price'];

     $source = $_FILES['song']['name'];
     $ext = explode('.',$source);
     $real_extension = strtolower(end($ext));
     $name = $title.rand(000,999).".".$real_extension;

     $upload = '../music/'.$name;
    
     
     $source1 = $_FILES['image']['name'];
     $ext1 = explode('.',$source1);
     $real_extension1 = strtolower(end($ext1));
     $name1 = $title.rand(000,999).".".$real_extension1;

     $upload2 = '../images/covers/'.$name1;
    
        $exec = $con->prepare("INSERT INTO songs(id,title,price,songcover,songurl) VALUES(?,?,?,?,?)");
        $exec->bind_param('sssss',$id,$title,$price,$name1,$name);

        if($exec->execute()){
            echo "success";
        }else{
            echo "Fail";
        }

     $success = move_uploaded_file($_FILES['song']['tmp_name'],$upload);
     if($success){
        move_uploaded_file($_FILES['image']['tmp_name'],$upload2);
     }
     
     $to = $success?"Admin.php":"Failed" ;
     header("Location:".$to);

     $_SESSION['response'] = "Successfully inserted Song";
     $_SESSION['res_type'] = "success"; 
 }

 if(isset($_GET['delete'])){
     $id = $_GET['delete'];

     $exec = $con->prepare("SELECT songcover FROM songs WHERE id=?");
     $exec->bind_param('s',$id);
     $exec->execute();
     $res = $exec->get_result();
     $rows = $res->fetch_assoc();

    $image_url = $rows['songcover'];
  
     $path = unlink($image_url);


     $exec1 = $con->prepare("DELETE FROM songs WHERE id=?");
     $exec1->bind_param('s',$id);
     $exec1->execute();
     
     $scs = $exec1?"Admin.php":"Fail.php";
     header("Location:".$scs);
     $_SESSION['response'] = "Successfully Deleted Song";
     $_SESSION['res_type'] = "danger"; 

 }

 if(isset($_GET['edit'])){
     $id = $_GET['edit'];

     $exec = $con->prepare("SELECT * FROM songs WHERE id=?");
     $exec->bind_param('s',$id);
     $exec->execute();
     $res = $exec->get_result();
     
     while($row = $res-> fetch_assoc())
     {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $photo = $row['songcover'];
        $songn = $row['songurl'];


        $update = true;
    }
 }

 if(isset($_POST['update'])){

     $id = $_POST['id'];
     $title = $_POST['title'];
     $price = $_POST['price'];
     $old_image = $_POST['oldimage'];
     $old_song = $_POST['oldsong'];

     if(isset( $_FILES['image']['name'])&&($_FILES['image']['name'])!= ""){
        $new_img ="../images/covers/".$_FILES['image']['name'];
            unlink($old_image);
            move_uploaded_file($_FILES['image']['tmp_name'],$new_img);
     }else{
        $new_img =  $old_image ;
     }

     if(isset($_FILES['song']['name'])&&($_FILES['song']['name'])!= ""){
        $new_song ="../music/".$_FILES['song']['name'];
            unlink($old_song);
            $sour = $_FILES['song']['name'];
            $ex= explode('.',$sour);
            $rea_extension1 = strtolower(end($ex));
            $name = $title.rand(000,999).".".$rea_extension1;
       
            $uploa = '../music/'.$name;
            move_uploaded_file($_FILES['song']['tmp_name'],$uploa);
     }else{
        $new_song =  $old_song ;
     }

     $exec = $con->prepare("UPDATE songs SET title=?, price=?, songcover=?, songurl=? WHERE id=?");
     $exec->bind_param('sssss',$title,$price,$new_img,$new_song,$id);
     $stmt = $exec->execute();
     
     $scs = $stmt?"Admin.php":"Failed" ;
     header("Location:".$scs);
     $_SESSION['response'] = "Successfully Updated Song";
     $_SESSION['res_type'] = "primary";

 }

 if(isset($_GET['details'])){
     $id = $_GET['details'];

     $exec = $con->prepare("SELECT * FROM songs WHERE id=?");
     $exec->bind_param('i',$id);
     $exec->execute();
     $res = $exec->get_result();
     
     while($row = $res-> fetch_assoc())
     {
      
 }
}
?>