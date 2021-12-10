<?php include_once("classes/connection.class.php"); ?>

<?php

$con = new Connection();
$conn = $con->connect();

function transaction(Closure $callback)
{
    global $conn;

    $conn->beginTransaction();
    try{
        $callback();
        $conn->commit();
    }catch(Exception $e)
    {
        $conn->rollBack();
        throw $e;
    }
}

transaction(function(){
  global $conn;
  $image_url;
  $title;

  $id = $_GET['id'];
 
  $sql = "SELECT * FROM movies WHERE id=$id";
  $stmt = $conn->query($sql);
  foreach($stmt as $s){
      $image_url = $s['image_url'];
      $title = $s['title'];
  }

  $path = '../images/covers/'.$image_url;
  $video = '../movie/'.$title;

 $xer5 =  unlink($path);
 $xer6 = unlink($video);

 if(($xer5 && $xer6)==true){
    $sql = "DELETE FROM movies WHERE id=$id";
    $stmt = $conn->query($sql);

    $to = $stmt?"main.php":"Fail.php";
    header("Location:".$to);
 }

});


?>