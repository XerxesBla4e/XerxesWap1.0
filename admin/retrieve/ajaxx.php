
<?php include_once("../classes/connection.class.php"); ?>
<?php


    $con = new Connection();

    $sql = "SELECT * FROM movies";
    $res = $con -> connect()->query($sql);
    $movies = $res->fetchAll();

  
    foreach($movies as $m){
      $id = $m['id'];
      $title = $m['title'];
      $image_url = $m['image_url'];
      $description = $m['description'];
      $runtme = $m['runtme'];
      $year = $m['year'];

      $return_arr[] = array(
            "id" =>   $id,
            "title"=> $title,
            "image_url" => $image_url,
            "description"=>$description,
            "runtme"=>$runtme,
            "year"=>$year
      );
    }

    echo json_encode($return_arr);
    exit;
      