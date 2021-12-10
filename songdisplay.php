<?php include_once('partials/header.php'); ?>

<?php
if(isset($_GET['song_id'])){
    $id = $_GET['song_id'];

    $sql = "SELECT * FROM songs WHERE id='$id'";
    $res = mysqli_query($con,$sql);
    $cnt = mysqli_num_rows($res);

    if($cnt == 1){
        while($rows=mysqli_fetch_assoc($res)){
            $id = $rows['id'];
            $title = $rows['title'];
            $downloads = $rows['downloads'];
            $filepath = 'music/'.$rows['title'];
            $cover_img = $rows['songcover'];
        }
    }
}

?>
    <div class="portfolio">
            <div class="movie_box">
                <div class="cover">
                  <img src="images/covers/<?= $cover_img;?>" alt="Movie Cover Goes Here" class="cover-responsive cover-edges">
                </div>
                <div class="clearfix"></div>
                <div class="description">
                    <p class="text">Title:<?= $title; ?></p>
                    <p class="text">downloads:<?= $downloads; ?></p>
                    <p class="text">Year:</p>
                </div><br />
                <form action="index.php?id=<?= $id; ?>" method="POST">
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
 