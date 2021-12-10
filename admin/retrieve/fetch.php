<?php include_once("../classes/connection.class.php"); ?>

<?php

    $con = new Connection();
    $sql = "SELECT * FROM movies WHERE title LIKE '%".$_POST['name']."%'";
    $res = $con -> connect()->query($sql);
    $movies = $res->fetchAll();

  
    foreach($movies as $m){
        echo '
        <tr>
           <td>'.$m["id"].'</td>
           <td>'.$m["title"].'</td>
           <td>'.$m["image_url"].'</td>
           <td>'.$m["description"].'</td>
           <td>'.$m["runtme"].'</td>
           <td>'.$m["year"].'</td>
           <td>
               <a href="index2.html?id='.$m['id'].'" class="btn-secondary" >UPDATE</a>
               <a href="index2.html?id='.$m['id'].'" class="btn-danger">DELETE</a>
           </td>
       </tr>
      ';

    }
    ?>
