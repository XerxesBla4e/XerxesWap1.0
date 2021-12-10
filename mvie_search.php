
<?php include_once("partials/header2.php")?>
<?php

if(isset($_POST["song"])){
    $song =$_POST["song"];
    $option = $_POST["option"];

    if($option=="Director"){
        echo "Director";
    }else if($option=="Genre"){
       echo "Genre";
    }else{
        echo "Title";
    }
}

?>