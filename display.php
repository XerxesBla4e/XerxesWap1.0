<?php include_once('partials/header.php'); ?>

<?php
if(isset($_GET['mov_id'])){
    $id = $_GET['mov_id'];

    $sql = "SELECT * FROM movies WHERE id=$id";
    $res = mysqli_query($con,$sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 1){
        while($rows=mysqli_fetch_assoc($res)){
            $id = $rows['id'];
            $title = $rows['title'];
            $description = $rows['description'];
            $filepath = 'movie/'.$rows['title'];
            $cover_img = $rows['image_url'];
        }
    }
}

?>
    <div class="portfolio">
            <div class="movie_box">
                <div class="cover">
                  <img src="images/covers/<?php echo $cover_img;?>" alt="Movie Cover Goes Here" class="cover-responsive cover-edges">
                </div>
                <div class="clearfix"></div>
                <div class="description">
                    <p class="text">Title:<?php  echo $title; ?></p>
                    <p class="text">Runtime:</p>
                    <p class="text">Genre:</p>
                    <p class="text">description:<?php  echo $description; ?></p>
                    <p class="text">Year:</p>
                </div><br />
                <form action="download.php?id=<?php echo $id; ?>" method="POST">
                   <center><button type="submit" name="download" class="btn1">Download</button></center>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
   
  <div class="container">
  <div class="preview" id="video">
      <video width="640" height="500"  controls>
        <source src="<?php echo $filepath; ?>" type="video/mp4">
      </video>
      </div>
  </div>
     
  
 <?php include_once('partials/footer.php');  ?>
 