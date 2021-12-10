
<?php include_once('connection.php'); ?>

<?php

if(isset($_GET['id'])){
   $id = $_GET['id'];


   $sql = "SELECT * FROM movies WHERE id='$id'";

   $result = mysqli_query($con,$sql)or die(mysqli_error($con));

   $file = mysqli_fetch_assoc($result);
   
   $filepath = 'music/'.$file['title'];
  
if(file_exists($filepath)){
 $mime = 'application/force-download';

      header('Content-Type: '.$mime);
      header('Content-Description: File Transfer');
      header('Content-Disposition: attachment; filename='.$file['title']);
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($filepath));
      ob_clean();
      flush();
      readfile($filepath);
     
      $newCount = $file['downloads']+1;
      $sql3 =  "Update songs SET downloads = $newCount WHERE id=$id";
  
      if(mysqli_query($con, $sql3))
      {
      echo "Successfully Downloaded";
      }else
      {
      echo "error: ".mysqli_error($mysqli);
      }

      exit;
   }
}
?>

<?php include_once('partials/footer.php'); ?>