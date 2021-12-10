<?php include_once("partials/header2.php")?>
<?php
if(!empty($_POST["movie"])){
    $song =$_POST["movie"];

    $query = "SELECT * FROM songs WHERE title LIKE '$song%'";

    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
   
    if($count > 0){
        while($row = mysqli_fetch_assoc($result)){
            $m_id = $row['id'];
            $title = $row['title']; 
          ?>
              <div >
                <a href="songdisplay.php?song_id=<?php echo $m_id; ?>& mov_title?title=<?php echo $title; ?>" class="text2"><?php echo $title ?></a>
              </div>
          <?php
        }
    }else{
       echo "song not available";
    }
}else{
    echo "Please input Song to search";
}
?>