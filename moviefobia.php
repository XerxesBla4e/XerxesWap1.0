<?php
include_once('partials/header.php');?>

<?php
$letter ="";

if(isset($_GET['letter']) && strlen($_GET['letter'])==1){
    $letter = $_GET['letter'];
}else{
    $letter = "";
}

if(isset($_GET['pge'])){
    $page = $_GET['pge'];
}else{
    $page = 1;
}

$page_end = 03;
$page_start = ($page-1)*03;

$sql = "SELECT * FROM movies WHERE title LIKE '$letter%' LIMIT $page_start,$page_end";
$res = mysqli_query($con,$sql) or die(mysqli_error());
?>

<!--movie  section-->
<div class="mov-category">
    <div class="container">
   <?php
            if($count = mysqli_num_rows($res) > 0){
                while($row=mysqli_fetch_assoc($res)){
                    $title = $row['title'];
                    $id = $row['id'];
                    ?>
                    <form action="display.php?mov_id=<?php echo $id; ?>& mov_title?title=<?php echo $title; ?>" method="post">
                         <button class="responsive2"><?php echo $title; ?></button>
                    </form>     
                    <?php
                }
            }else{
                    ?>
                      <div>
                          Movie Not Available On Server
                      </div>
                    <?php
                }
            
   ?>
</div>
</div>
<!--end movie  section-->

<div>
    <?php
            $qry = "SELECT * FROM movies WHERE title LIKE '$letter%'";
            $result = mysqli_query($con,$qry) or die(mysqli_error());
            $total_records = mysqli_num_rows($result);
    
            $pag = ceil($total_records/$page_end);
    
            if($page > 1){
                echo "<a href='moviefobia.php?pge=".($page-1)."' class='lnk lnk-success'>Previous</a>";
            }
    
            for($x=1; $x<$pag; $x++){
            echo "<a href='moviefobia.php?pge=".$x."' class='lnk lnk-primary'>$x</a>";
            }
    
            if($x > $page){
                echo "<a href='moviefobia.php?pge=".($page+1)."' class='lnk lnk-success'>Next</a>";
            }

        ?>
 </div>

 <?php include_once('partials/footer.php');?>

 